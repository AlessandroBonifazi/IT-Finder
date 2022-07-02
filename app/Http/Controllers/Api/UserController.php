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

        $user->contacts = $user->contactInfo();
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
        return view('auth.dashboard', compact('user', 'contacts'));
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
        $reviews = $request->reviews;
        $reviewsNum = $request->reviewsNum;

        $query = $user->newQuery();
        // Filter: name, surname, spec
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
                    });
            });
        }
        // Filter: spec
        if (!empty($specializationIdArray)) {
            $query->whereHas("specializations", function ($q) use (
                $specializationIdArray
            ) {
                $q->whereIn("id", $specializationIdArray);
            });
        }
        // Filter: valutation avg
        if (!empty($reviews)) {
            $query->join('reviews', 'users.id', '=', 'reviews.user_id')
            ->select('users.*')
            ->groupBy('reviews.user_id')
            ->havingRaw('AVG(reviews.valutation) >= ?', [$reviews]);
        }
        // Filter: reviews number
        // if (!empty($reviewsNum)) {
        //     $query->

        // }

        $users = $query->paginate(12);

        foreach ($users as $user) {
            $user->specializations;
            $user->technologies;
            $user->reviews;
            $user->reviewsNum;
        }

        return response()->json($users);
    }
}
