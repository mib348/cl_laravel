<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FilmsModel as FilmsModel;

class FilmsController extends Controller
{
    public function index()
    {
        return view('manageFilms');
    }
    
    public function save(Request $request)
    {
        $FilmsModel = new FilmsModel();
        return $FilmsModel->AddData($request);
    }
}
