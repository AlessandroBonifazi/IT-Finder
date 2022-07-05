<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Contact;
use App\Specialization;
use App\Tecnology;
use App\Message;

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
        $techExample = [
            "HTML5",
            "CSS3",
            "JavaScript",
            "PHP",
            "Bootstrap",
            "Laravel",
            "Vue JS",
            "MySQL",
        ];

        $user = Auth::user();
        $specializations = Specialization::all();
        $contacts = $user->contactInfo;

        return view(
            "auth.edit",
            compact("user", "specializations", "contacts", "techExample")
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
        foreach ($request->techName as $techName) {
            $user->technologies()->create([
                // "user_id" => $user->id,
                "name" => ($techName),
                "logo" => $request->logo,
            ]);
        }

        $user->save();
        return redirect()->route("user.dashboard");
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
        // if ($user->promos()->exists()) {
        //     $user->promos()->sync([]);
        // }
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
        return view(
            "auth.dashboard",
            compact("user", "specializations", "messages", "contacts", "reviews")
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
        // $contact = Contact::where("user_id", /*$user->id*/ 1)->first();
        // dd($contact);
        // return $user->contactInfo();
    }


}
