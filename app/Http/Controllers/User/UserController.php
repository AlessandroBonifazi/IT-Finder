<?php

namespace App\Http\Controllers\User;
use App\User;
use App\Promo;
use App\Contact;
use App\Message;
use Carbon\Carbon;
use Braintree\Gateway;
use App\Specialization;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        // return view('auth.dashboard');
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        $contact = Contact::where("user_id", /*$user->id*/ 1)->first();
        dd($contact);
        return $user->contactInfo();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
        // if (!$user) {
        //     abort(404);
        // }
        $user = Auth::user();
        $specializations = Specialization::all();
        $contacts = $user->contactInfo;

        return view(
            "auth.edit",
            compact("user", "specializations", "contacts")
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */

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

        return redirect()->route("user.profile");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function dashboard()
    {
        $user = Auth::user();
        $contacts = $user->contactInfo;
        $specializations = $user->specializations;
        $messages = $user->messages->take(3);
        return view(
            "auth.dashboard",
            compact("user", "specializations", "messages", "contacts")
        );
    }

    public function profile()
    {
        $user = Auth::user();
        $contacts = $user->contactInfo;
        $specializations = $user->specializations;
        return view(
            "auth.profile",
            compact("user", "contacts", "specializations")
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
    public function logout()
    {
        Auth::logout();
        return redirect("/");
    }

    public function promos(){
        $promos=Promo::all();
        return view('auth.checkin', compact('promos'));

    }
    public function checkOut(Gateway $gateway, $id){
        return view('auth.checkout', [
            "id" => $id,
            "token" => $gateway->clientToken()->generate(),
            "promo" => Promo::find($id)
          ]);

    }

}
