<?php

namespace App\Http\Controllers;

use App\Models\Adhesion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdhesionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $members = DB::table('users')
                        ->join('adhesions','users.id','=','adhesions.userID')
                        ->select('users.*', 'adhesions.id as idAdhesion','adhesions.montantAdhesion')
                        ->orderBy('users.created_at', 'DESC')
                        ->paginate(10)
                       ;

        //return dd($members);
        return view('adhesions.listeAdhesions',compact('members'))->with('i',(request()->input('page', 1) - 1) * 10);
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
     * @param  \App\Models\Adhesion  $adhesion
     * @return \Illuminate\Http\Response
     */
    public function show(Adhesion $adhesion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Adhesion  $adhesion
     * @return \Illuminate\Http\Response
     */
    public function edit(Adhesion $adhesion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Adhesion  $adhesion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Adhesion $adhesion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Adhesion  $adhesion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Adhesion $adhesion)
    {
        //
    }
}
