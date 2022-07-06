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

        $user = User::find($id);
        $user->name = $request->name;
        $user->surname = $request->surname;
        // ! comment lines creates a bug and we cant update the password like this
        // $user->email = $request->email;
        // $user->password = $request->password;
        $user->job_experience = $request->job_experience;
        $user->location = $request->location;
        $user->cv = $request->cv;
        if ($request->specializations) {
            $user->specializations()->sync($request->specializations);
        }
        if ($request->spec) {
            $user->specializations()->sync($request->spec);
        }
        if ($user->contactInfo()->exists()) {
            $user->contactInfo()->update([
                "user_id" => $user->id,
                "contact_email" => $user->email,
                "phone" => $request->phone,
                "linkedin" => $request->linkedin,
                "github" => $request->github,
                "site" => $request->site,
            ]);
        } else {
            $user->contactInfo()->create([
                "user_id" => $user->id,
                "contact_email" => $user->email,
                "phone" => $request->phone,
                "linkedin" => $request->linkedin,
                "github" => $request->github,
                "site" => $request->site,
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
                foreach ($request->techId as $techId) {
                    $user->technologies()->sync([
                        ['technology_id' => $techId],
                    ], false);
                }
            } elseif ($request->techName) {
                foreach ($request->techName as $techName) {
                    $user->technologies()->create([
                        // "user_id" => $user->id,
                        "name" => $techName,
                        "logo" => $request->logo,
                    ]);
                }
            }
        $user->save();
        return redirect()->route("user.dashboard");
    }
    //Image Storage
    public function storage(){
        $img = Storage::put('uploads', $data['image']);
        $data['image'] = $img;
    }

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
        return view('auth.delete');
    }

    public function dashboard()
    {
        $user = Auth::user();
        $contacts = $user->contactInfo;
        $specializations = $user->specializations;
        $messages = $user->messages->take(3);
        $reviews = $user->reviews->take(3);
        $promos = $user->promos;
        return view(
            "auth.dashboard",
            compact("user", "specializations", "messages", "contacts", "reviews", "promos")
        );
    }

    public function profile()
    {
        $user = Auth::user();
        $contacts = $user->contactInfo;
        $specializations = $user->specializations;
        $techs = $user->technologies;
        return view( "auth.profile",
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
        return view("auth.messages", compact("user", "messages"));
    }

    public function getReviews()
    {
        $user = Auth::user();
        $reviews = $user->reviews;
        return view("auth.reviews", compact("user", "reviews"));
    }

    public function logout()
    {
        Auth::logout();
        return redirect("/");
    }



}
