<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Petition;
use App\Signature;
use App\User;
use Auth;

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
        return view('petition.create', [
            'petition' => new Petition
        ]);
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
            'body' => $request->body,
            'private' => $request->private,

            'thankyou_title' => $request->thankyou_title,
            'thankyou_body' => $request->thankyou_body,
            'thankyou_email_subject' => $request->thankyou_email_subject,
            'thankyou_email_body' => $request->thankyou_email_body
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

        if (!$petition->private || (Auth::user() && $petition->user_id == Auth::user()->id)) {
            return view('petition.view', [
                'petition' => $petition
            ]);
        }
        else {
            abort(404);
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
        $petition = Petition::findOrFail($id);

        if (Auth::user() && $petition->user_id == Auth::user()->id) {
            return view('petition.create', [
                'petition' => $petition
            ]);
        }
        else {
            abort(404);
        }
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
        $this->validate($request, [
            'title' => 'required',
            'summary' => 'required',
            'body' => 'required'
        ]);

        $petition = Petition::findOrFail($id);

        if (Auth::user() && $petition->user_id == Auth::user()->id) {
            $petition->update([
                'title' => $request->title,
                'summary' => $request->summary,
                'body' => $request->body,
                'private' => (bool) $request->private,

                'thankyou_title' => $request->thankyou_title,
                'thankyou_body' => $request->thankyou_body,
                'thankyou_email_subject' => $request->thankyou_email_subject,
                'thankyou_email_body' => $request->thankyou_email_body
            ]);

            return redirect('/petition/'.$petition->id);
        }
        else {
            abort(404);
        }
    }

    /**
     * Remove the specified petition from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $petition = Petition::findOrFail($id);

        if (Auth::user() && $petition->user_id == Auth::user()->id) {
            $petition->delete();

            return redirect(Auth::user()->id.'/petitions');
        }
        else {
            abort(404);
        }
    }


    /**
     * Post a signature on the specified petition.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sign(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required'
        ]);

        $petition = Petition::findOrFail($id);

        if (!$petition->private || (Auth::user() && $petition->user_id == Auth::user()->id)) {
            $signature = Signature::create([
                'petition_id' => $petition->id,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone
            ]);

            return view('petition.thankyou', [
                'signature' => $signature,
                'petition' => $petition
            ]);
        }
        else {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified petition.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function signatures($id)
    {
        $petition = Petition::findOrFail($id);

        if (Auth::user() && $petition->user_id == Auth::user()->id) {
            return view('petition.signatures', [
                'petition' => $petition
            ]);
        }
        else {
            abort(404);
        }
    }
}
