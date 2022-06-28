<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

use App\User;
use App\Contact;
use App\Message;
use App\Review;
use App\Tecnology;
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
        $contacts = Contact::where('user_id', $id)->get();
        $messages = Message::where('user_id', $id)->get();
        $reviews = Review::where('user_id', $id)->get();
        $specs = Specialization::where('user_id', $id)->get();
        return response()->json([$user, $contacts, $messages, $reviews, $specs]);
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
        $contacts = Contact::where('user_id', $id)->get();
        $tecnologies = Tecnology::all();
        $specs = Specialization::all();
        return response()->json([$user, $contacts, $tecnologies, $specs]);
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
        $user->tecnologies()->sync([]);
        $user->specializations()->sync([]);
        $user->promos()->sync([]);
        $user->delete();
        // ! this is for testing in the final version we will add the redirect to somewhere else
        return response()->json($user);

    }

    public function completeRegistration(Request $request, $id)
    {
        $user = User::find($id);
        $user->job_experience = $request->job_experience;
        $user->position = $request->position;
        $user->location = $request->location;
        $user->cv = $request->cv;
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

        // ! this is for testing in the final version we will add the redirect to somewhere else
        return response()->json([
            "success" => true,
        ]);
    }

    public function search(Request $request, User $user){
        $search = $request->input('search');

        // Search by name spec and valutation
        $users = User::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhereHas('specializations', function ($q) use ($search){
                $q->where('specialization', 'LIKE', "%{$search}%");
            }) ->orWhereHas('reviews', function ($q) use ($search){
                $q->where('valutation', 'LIKE', "%{$search}%");
            })
            ->get();

        // Return the search view with the results compacted
        return view('guest.home', compact('users'));
    }

    // public function loggedUser()
    // {
    //     $user = Auth::user();

    //     return response()->json([
    //         "success" => true,
    //         "user" => $user,
    //     ]);
    // }
}
