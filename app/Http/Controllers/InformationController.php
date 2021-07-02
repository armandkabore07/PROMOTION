<?php

namespace App\Http\Controllers;

use App\Models\Information;
use App\Models\Type;
use Illuminate\Http\Request;
use Carbon\Carbon;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todayDate = Carbon::now();
        $informations = Information::latest()->paginate(7);
        return view('informations.listeInformations',compact('informations','todayDate'))->with('i',(request()->input('page', 1) - 1) * 7);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        return view('informations.create',compact('types'));
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
            'title' => 'required|string',
            'body' => 'required|string',
            'montant_depense' => 'required|integer|gte:0',
            'type_id' => 'required|integer',
        ]);

      $information =  Information::create([
            'title' => $request->title,
            'body' => $request->body,
            'type_id' => $request->type_id,
            'montant_depense' => $request->montant_depense,
        ]);

        return redirect()->route('informations.index')->with('success','Publication créee avec succès!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $information = Information::findorfail($id);
       return view('informations.show',compact('information'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $types = Type::all();
        $information = Information::findorfail($id);
        return view('informations.edit',compact('information','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

         $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'montant_depense' => 'required|integer|gte:0',
            'type_id' => 'required|integer',
        ]);

        $information = Information::findorfail($id);
        $information->update($request->all());
        return redirect()->route('informations.index')->with('success','Publication modifiée avec succèss!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
        $information= Information::findorfail($id);
        $information->delete();
        return redirect()->route('informations.index')->with('success','Publication supprimée avec succèss!');
    }
}
