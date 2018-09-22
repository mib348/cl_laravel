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
    
    public function GetData(Request $request){
        $FilmsModel = new FilmsModel();
        return $FilmsModel->GetData($request);
    }
    
    public function GetDetail(Request $request){
        $FilmsModel = new FilmsModel();
        $arrData = $FilmsModel->GetDetail($request);
//         print_r($arrData);exit;
        return view('films_detail', $arrData);
    }
}
