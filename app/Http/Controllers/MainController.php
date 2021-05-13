<?php

namespace App\Http\Controllers;

use App\Models\Information;

class MainController extends Controller
{
    public function acceuil()
    {
        $informations = Information::orderByDesc('id')->take(6)->get();

        return view('welcome', ['informations' => $informations]);
    }
}
