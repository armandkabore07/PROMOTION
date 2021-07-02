<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MonCompteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $member = User::findorfail($id);
       return view('moncompte.show',compact('member'));
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
        $member = User::findorfail($id);
        return view('moncompte.edit',compact('member'));
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
        //
        $request->validate([
            //'telephone' => 'required|min:8',
            //'matricule' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'service' => 'required|string|max:255',
           // 'email' => 'required|string|email|max:255|unique:users',
           // 'password' => 'required|string|confirmed|min:8',
            //'montant' => 'required|integer',
        ]);

        $member= User::findorfail($id);
        $member->update($request->all());
        //$member->assignRole('user');
        // $member->assignRole('admin');
         return redirect()->route('moncompte.show',$member->id)->with('success','Membre modifié avec succès!');
    }


    public function editpassword($id)
    {
      
        return view('moncompte.changepassword',compact('id'));

    }


    public function updatepassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|string|confirmed|min:8',
        ]);

        $member= User::findorfail($id);
        $member->update(['password' => Hash::make($request->password)] );
      
        return redirect()->route('mdp.edit',$id)->with('success','Mot de passe modifié avec succès!');

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
    }
}
