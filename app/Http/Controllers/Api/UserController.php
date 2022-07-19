<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
// Import QueryBuilder
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

use App\User;
use App\Contact;
use App\Message;
use App\Review;
use App\Technology;
use App\Specialization;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // $user = User::find($id);
        // return response()->json($user);
    }
    public function getUser($id)
    {
        $user = User::find($id);

        $user->contacts = $user->contactInfo;
        $user->messages = $user->messages;
        $user->reviews = Review::orderBy("created_at", "desc")
            ->where("user_id", $id)
            ->get();

        foreach ($user->reviews as $review) {
            $review->diff_time = $review->created_at->diffForHumans();
        }
        $user->review_number = $user->reviews->count();

        $user->valutation = $user->reviews->avg("valutation");
        $user->technologies = $user->technologies;
        $user->specializations = $user->specializations;
        return response()->json($user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        //
        $user = User::findOrFail($id);
        $contacts = Contact::where("user_id", $id)->get();
        $messages = Message::where("user_id", $id)->get();
        $reviews = Review::where("user_id", $id)->get();
        $specs = Specialization::where("user_id", $id)->get();
        // return response()->json([
        //     $user,
        //     $contacts,
        //     $messages,
        //     $reviews,
        //     $specs,
        // ]);
        return view("auth.dashboard", compact("user", "contacts"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail($id);
        $contacts = Contact::where("user_id", $id)->get();
        $technologies = Technology::all();
        $specs = Specialization::all();
        return response()->json([$user, $contacts, $technologies, $specs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        // promo
        $user->promos()->update([
            //
        ]);
        // add specs
        $user->specializations()->create([
            "specialization" => $request->specialization,
        ]);

        $user->save();
        // ! this is for testing in the final version we will add the redirect to somewhere else
        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::findOrFail($id);
        $user->contactInfo()->sync([]);
        $user->messages()->sync([]);
        $user->reviews()->sync([]);
        $user->technologies()->sync([]);
        $user->specializations()->sync([]);
        $user->promos()->sync([]);
        $user->delete();
        // ! this is for testing in the final version we will add the redirect to somewhere else
        return response()->json($user);
    }

    public function completeRegistration(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->job_experience = $request->job_experience;
        // $user->position = $request->position;
        $user->location = $request->location;
        $user->cv = $request->cv;
        if ($request->specialization) {
            $specialization = Specialization::find($request->specialization);
            $user->specializations()->attach($specialization);
        }
        if ($user->contactInfo()->exists()) {
            $user->contactInfo()->update([
                "contact_email" => $user->email,
                "phone" => $request->phone,
                "linkedin" => $request->linkedin,
                "github" => $request->github,
                "site" => $request->site,
            ]);
        } else {
            $user->contactInfo()->create([
                "contact_email" => $user->email,
                "phone" => $request->phone,
                "linkedin" => $request->linkedin,
                "github" => $request->github,
                "site" => $request->site,
            ]);
        }
        $user->save();

        return response()->json([
            "success" => true,
        ]);
    }

    public function search(Request $request, User $user)
    {
        $search = $request->value;
        $specializationIdArray = $request->specializations;
        $technologiesIdArray = $request->technologies;
        $reviews = $request->reviews;
        $reviewsNum = $request->reviewsNum;

        $query = $user->newQuery();

        // remove user with promo
        $query->whereDoesntHave("promos");

        if (!empty($request->value) && $request->value != "AllUsers") {
            $query->where(function (EloquentBuilder $query) use ($search) {
                $query
                    ->where("name", "like", "%" . $search . "%")
                    ->orWhere("surname", "like", "%" . $search . "%")
                    ->orWhereHas("specializations", function ($q) use (
                        $search
                    ) {
                        $q->where(
                            "specialization",
                            "like",
                            "%" . $search . "%"
                        );
                    })
                    ->orWhereHas("technologies", function ($q) use ($search) {
                        $q->where("name", "like", "%" . $search . "%");
                    });
            });
        }
        // Filter: spec
        if (!empty($specializationIdArray)) {
            $query->whereHas("specializations", function ($q) use (
                $specializationIdArray
            ) {
                $q->whereIn("id", $specializationIdArray);
                // $q->where("id", $specializationIdArray)->a
            });
        }
        // Filter: Technologies
        if (!empty($technologiesIdArray)) {
            $query->whereHas("technologies", function ($q) use (
                $technologiesIdArray
            ) {
                $q->whereIn("id", $technologiesIdArray);
            });
        }
        // Filter: valutation avg
        $query->join("reviews", "users.id", "=", "reviews.user_id");
        if (!empty($reviews)) {
            $query
                // ->join("reviews", "users.id", "=", "reviews.user_id")
                ->selectRaw("users.*, AVG(reviews.valutation) as avg_rating")
                ->groupBy("reviews.user_id")
                ->orderBy("avg_rating", "desc")
                ->havingRaw("avg_rating >= ?", [$reviews]);
        } else {
            $query
                // ->join("reviews", "users.id", "=", "reviews.user_id")
                ->selectRaw("users.*, AVG(reviews.valutation) as avg_rating")
                ->groupBy("reviews.user_id")
                ->orderBy("avg_rating", "desc");
        }
        // Filter: reviews number
        if (!empty($reviewsNum)) {
            $query
                // ->join("reviews", "users.id", "=", "reviews.user_id")
                ->selectRaw("COUNT(reviews.user_id) as reviews_number")
                ->groupBy("reviews.user_id")
                ->orderBy("reviews_number", "desc")
                ->havingRaw("reviews_number >= ?", [$reviewsNum]);
        } else {
            $query
                // ->join("reviews", "users.id", "=", "reviews.user_id")
                ->selectRaw("COUNT(reviews.user_id) as reviews_number")
                ->groupBy("reviews.user_id")
                ->orderBy("reviews_number", "desc");
        }

        // ->groupBy("promo_id");

        $users = $query->paginate(12);

        foreach ($users as $user) {
            $user->specializations;
            $user->technologies;
            $user->reviews;
            $user->rating = $user->reviews->avg("valutation");
            $user->reviewsNum;
            $user->promos;
        }

        return response()->json($users);
    }

    public function bestUsers(User $user)
    {
        $query = $user->newQuery();
        $query
            ->join("promo_user", "users.id", "=", "promo_user.user_id")
            ->select("users.*");
        $users = $query->get();

        // take only random
        $users = $users->random(6);
        $users->each(function ($user) {
            $user->specializations;
            $user->technologies;
            $user->promos;
        });
        return response()->json($users);
    }
    public function searchPremiumUsers(Request $request, User $user)
    {
        $search = $request->value;
        $specializationIdArray = $request->specializations;
        $technologiesIdArray = $request->technologies;
        $reviews = $request->reviews;
        $reviewsNum = $request->reviewsNum;

        $query = $user->newQuery();
        // $sponsoredQuery = $user->newQuery();
        // Filter: name, surname, spec
        $query
            ->join("promo_user", "users.id", "=", "promo_user.user_id")
            ->select("users.*");

        if (!empty($request->value) && $request->value != "AllUsers") {
            $query->where(function (EloquentBuilder $query) use ($search) {
                $query
                    ->where("name", "like", "%" . $search . "%")
                    ->orWhere("surname", "like", "%" . $search . "%")
                    ->orWhereHas("specializations", function ($q) use (
                        $search
                    ) {
                        $q->where(
                            "specialization",
                            "like",
                            "%" . $search . "%"
                        );
                    })
                    ->orWhereHas("technologies", function ($q) use ($search) {
                        $q->where("name", "like", "%" . $search . "%");
                    });
            });
        }
        // Filter: spec
        if (!empty($specializationIdArray)) {
            $query->whereHas("specializations", function ($q) use (
                $specializationIdArray
            ) {
                $q->whereIn("id", $specializationIdArray);
                // $q->where("id", $specializationIdArray)->a
            });
        }
        // Filter: Technologies
        if (!empty($technologiesIdArray)) {
            $query->whereHas("technologies", function ($q) use (
                $technologiesIdArray
            ) {
                $q->whereIn("id", $technologiesIdArray);
            });
        }
        // Filter: valutation avg
        if (!empty($reviews)) {
            $query
                ->join("reviews", "users.id", "=", "reviews.user_id")
                ->selectRaw("users.*, AVG(reviews.valutation) as avg_rating")
                ->groupBy("reviews.user_id")
                ->havingRaw("avg_rating >= ?", [$reviews]);

            if (!empty($reviewsNum)) {
                $query->havingRaw("reviews_number >= ?", [$reviewsNum]);
            }
        }
        // Filter: reviews number
        if (!empty($reviewsNum) && empty($reviews)) {
            $query
                ->join("reviews", "users.id", "=", "reviews.user_id")
                ->selectRaw("COUNT(reviews.user_id) as reviews_number")
                ->groupBy("reviews.user_id")
                ->havingRaw("reviews_number >= ?", [$reviewsNum]);
        }

        // ->groupBy("promo_id");

        $users = $query->get();
        $users = $users->random($users->count(),6);
        // $users = $users->random(max(count($users), 6));

        foreach ($users as $user) {
            $user->specializations;
            $user->technologies;
            $user->reviews;
            $user->rating = $user->reviews->avg("valutation");
            $user->reviewsNum;
            $user->promos;
        }

        return response()->json($users);
    }
}
