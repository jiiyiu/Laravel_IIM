<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
        public  function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $contacts = auth()->user()->contacts;
        return view('contacts.index', ['contacts' => $contacts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validatedContact = $this->validateContact ( $request );
        $contact         = new Contact( $validatedContact );
        $contact->user_id = auth()->user()->id;
        $contact->save();

        return redirect()->route( 'contacts.index', $contact );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
          return view( 'contacts.index', [ 'contact' => $contact] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('contacts.edit', ['contact' =>$contact]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $validatedContact = $this->validateContact( $request );
        $contact->fill( $validatedContact );
        $contact->save();

        return redirect()->route( 'contacts.index', $contact );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
     public function destroy( Contact $contact ) {
        $contact->delete();

        return redirect()->route('contacts.index');
    }


    /**
     * @param Request $request
     */
    private function validateContact( Request $request ) {
        return $request->validate( [
           'name'   => 'required|max:255',
            'tel' => 'required|max:255',
            'email' => 'required|max:255'
        ] );
    }
}