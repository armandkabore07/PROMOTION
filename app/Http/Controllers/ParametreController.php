<?php

namespace App\Http\Controllers;

use App\Models\Parametre;
use Illuminate\Http\Request;

class ParametreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $params = Parametre::findorfail(1);
        //return dd($params->id);
        return view('parametres.listeParametres',compact('params'));
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
     * @param  \App\Models\Parametre  $parametre
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $param = Parametre::findorfail($id);
        return view('parametres.show',compact('param'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parametre  $parametre
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $param = Parametre::findorfail($id);
        return view('parametres.edit',compact('param'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parametre  $parametre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
        
            'montantAdhesion' => 'required|integer',
            'montantCotisation' => 'required|integer',
        ]);

        $param = Parametre::findorfail($id);
        $param->update($request->all());

        return redirect()->route('parametres.index')->with('success','Parametres modifiés avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parametre  $parametre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parametre $parametre)
    {
        //
    }
}
