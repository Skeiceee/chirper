<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource. 
     */
    public function index(): view
    {
        return view('chirps', [
            //
        ]);
    }
}
