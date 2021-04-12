<?php

namespace App\Http\Controllers;
use App\Models\Address;

use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = Address::all();
        return view('contacts.show', compact('address'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('/contacts/{$contact->id}')->with('success', 'Contact saved!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'contact_id'=>'required',
            'street_address'=>'required',
            'city'=>'required',
            'country'=>'required'
        ]);
        echo $request->get('contact_id');
        
        $address = new Address([
            'contact_id'=> $request->get('contact_id'),
            'street_address' => $request->get('street_address'),
            'city' => $request->get('city'),
            'country' => $request->get('country')
        ]);
        $address->save();
        return redirect('/contacts')->with('success', 'Contact saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $address = Address::find($id);
        return view('address.edit', compact('address'));  
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
        $request->validate([
            'street_address'=>'required',
            'city'=>'required',
            'country'=>'required'
        ]);

        $address = Address::find($id);
        $address->street_address =  $request->get('street_address');
        $address->city = $request->get('city');
        $address->country = $request->get('country');
        $address->save();

        return redirect('/contacts/addresses')->with('success', 'Contact updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address = Address::find($id);
        $address->delete();

        return redirect('/contacts')->with('success', 'Contact deleted!');
    }
}
