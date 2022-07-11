<?php

namespace App\Http\Controllers\User;
use App\User;
use App\Promo;
use App\Contact;
use App\Specialization;
use App\Technology;
use App\Message;
use Carbon\Carbon;
use Braintree\Gateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
        $user = Auth::user();
        $specializations = Specialization::all();
        $contacts = $user->contactInfo;
        $techs = Technology::all();

        return view(
            "auth.edit",
            compact("user", "specializations", "contacts", "techs")
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    // Function used by registratio and dev update
    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            "name" => "max:30",
            "surname" => "max:50",
            "img_path" => "mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        $user = User::find($id);
        $user->name = $request->name ?? "/";
        $user->surname = $request->surname ?? "/";
        // ! comment lines creates a bug and we cant update the password like this
        // $user->email = $request->email;
        // $user->password = $request->password;
        $user->job_experience = $request->job_experience ?? 0;
        $user->location = $request->location ?? "/";
        $user->cv = $request->cv ?? "/";
        if ($request->specializations) {
            $user->specializations()->sync($request->specializations);
        }
        if ($request->spec) {
            $user->specializations()->sync($request->spec);
        }
        if ($user->contactInfo()->exists()) {
            $user->contactInfo()->update([
                "user_id" => $user->id ?? "/",
                "contact_email" => $user->email ?? "/",
                "phone" => $request->phone ?? "/",
                "linkedin" => $request->linkedin ?? "/",
                "github" => $request->github ?? "/",
                "site" => $request->site ?? "/",
            ]);
        } else {
            $user->contactInfo()->create([
                "user_id" => $user->id ?? "/",
                "contact_email" => $user->email ?? "/",
                "phone" => $request->phone ?? "/",
                "linkedin" => $request->linkedin ?? "/",
                "github" => $request->github ?? "/",
                "site" => $request->site ?? "/",
            ]);
        }
        if ($request->hasFile("img_path")) {
            $user->img_path = $request->img_path->store("img_path", "public");
        }
        $user->save();
        return redirect()->route("user.dashboard");
    }

    // Add Technologies
    public function updateTech(Request $request, $id)
    {
        //
        $user = User::find($id);
        if ($request->techId) {
            $user->technologies()->sync($request->techId);
        } elseif ($request->techName) {
            $user->technologies()->create([
                "name" => $request->techName,
                "logo" => $request->logo,
            ]);
        }
        $user->save();
        return redirect()->route("user.dashboard");
    }
    //Image Storage
    // ?------------------------------- Is this function used?
    // public function storage()
    // {
    //     $img = Storage::put("uploads", $data["image"]);
    //     $data["image"] = $img;
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::findOrFail($id);
        if ($user->specializations()->exists()) {
            $user->specializations()->sync([]);
        }
        if ($user->technologies()->exists()) {
            $user->technologies()->sync([]);
        }
        if ($user->messages()->exists()) {
            $user->messages()->delete();
        }
        if ($user->reviews()->exists()) {
            $user->reviews()->delete();
        }
        if ($user->promos()->exists()) {
            $user->promos()->sync([]);
        }
        if ($user->contactInfo()->exists()) {
            $user->contactInfo()->delete();
        }
        $user->delete();
        return view("auth.delete");
    }

    public function dashboard()
    {
        $user = Auth::user();
        $contacts = $user->contactInfo;
        $specializations = $user->specializations;
        $messages = $user->messages;
        $messages = $messages->sortByDesc("created_at")->take(3);
        $reviews = $user->reviews;
        $reviews = $reviews->sortByDesc("created_at")->take(3);
        $promos = $user->promos;
        // Activity
        $avg_rating = $user->reviews()->avg("valutation");
        // $avg_rating = (int)$avg_rating;
        $totalReviews = $user->reviews()->count();
        $totalMessages = $user->messages()->count();
        if ($user->promos()->exists()) {
            $promoQuery = $user
                ->promos()
                ->wherePivot("endDate", ">", Carbon::now())
                ->select("*")
                ->get();
            $user->promo =
                $promoQuery->count() > 0 ? $promoQuery->last() : null;
            $user->promo->timeToEnd = Carbon::parse(
                $user->promo->endDate
            )->diffForHumans();
        }
        $is_premium = $user->promos()->exists();

        // $promo->timeToEnd = $promo->endDate->diffForHumans();
        // ! I don't know why but this is not working
        // $avg_rating = $user->reviews->avg("valutation");
        // $totalReviews = $user->reviews->count();
        // $totalMessages = $user->messages->count();
        // $avg_rating = Review::where("user_id", $user->id)->avg("valutation");

        return view(
            "auth.dashboard",
            compact(
                "user",
                "specializations",
                "messages",
                "contacts",
                "reviews",
                "avg_rating",
                "totalReviews",
                "totalMessages",
                "is_premium"
            )
        );
    }

    public function profile()
    {
        $user = Auth::user();
        $contacts = $user->contactInfo;
        $specializations = $user->specializations;
        $techs = $user->technologies;
        return view(
            "auth.profile",
            compact("user", "contacts", "specializations", "techs")
        );
    }

    public function completeRegistration()
    {
        $user = Auth::user();
        $specializations = Specialization::all();
        return view(
            "auth.complete-registration",
            compact("user", "specializations")
        );
    }

    public function getMessages()
    {
        $user = Auth::user();
        $messages = $user->messages;
        $messages = $messages->sortByDesc("created_at");
        $messages->total_messages = $messages->count();
        $is_premium = $user->promos()->exists();
        // dd($messages);
        return view("auth.messages", compact("user", "messages", "is_premium"));
    }

    public function getReviews()
    {
        $user = Auth::user();
        $reviews = $user->reviews;
        $reviews = $reviews->sortByDesc("created_at");
        $reviews->total_reviews = $reviews->count();
        $is_premium = $user->promos()->exists();
        return view("auth.reviews", compact("user", "reviews", "is_premium"));
    }

    public function logout()
    {
        Auth::logout();
        return redirect("/");
    }
}
