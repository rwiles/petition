<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Petition;
use App\User;

class PetitionController extends Controller
{
    /**
     * Display all public petitions.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publicPetitions = Petition::where('private', false)->get();

        return view('petition.index', [
          'petitions' => $publicPetitions
        ]);
    }

    /**
     * Display all petitions belonging to the specified user.
     *
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function userIndex($user)
    {
        $user = User::findOrFail($user);

        return view('petition.index', [
          'user' => $user,
          'petitions' => $user->petitions
        ]);
    }


    /**
     * Show the form for creating a petition.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('petition.create');
    }

    /**
     * Store a newly created petition in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'summary' => 'required',
            'body' => 'required'
        ]);

        $petition = Petition::create([
            'title' => $request->title,
            'summary' => $request->summary,
            'body' => $request->body
        ]);

        return redirect('/petition/'.$petition->id);
    }


    /**
     * Display the specified petition.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $petition = Petition::findOrFail($id);

        if (!$petition->private || $petition->user_id == Auth::user()->id) {
            return view('petition.view', [
                'petition' => $petition
            ]);
        }
        else {
            App::abort(404);
        }
    }

    /**
     * Show the form for editing the specified petition.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified petition in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified petition from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
