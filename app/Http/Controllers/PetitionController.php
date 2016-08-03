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
        //
    }

    /**
     * Store a newly created petition in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Display the specified petition.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
