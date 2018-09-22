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
    
    public function home()
    {
        return view('films');
    }
    
    public function save(Request $request)
    {
        $FilmsModel = new FilmsModel();
        return $FilmsModel->AddData($request);
    }
    
    public function saveComment(Request $request)
    {
        $FilmsModel = new FilmsModel();
        return $FilmsModel->saveComment($request);
    }
    
    public function GetData(Request $request){
        $FilmsModel = new FilmsModel();
        return $FilmsModel->GetData($request);
    }
    
    public function GetDetail(Request $request){
        $FilmsModel = new FilmsModel();
        $arrData = $FilmsModel->GetDetail($request);
        $request->f_id = $arrData['f_id'];
        $arrComment['comments'] = $FilmsModel->GetComment($request);
        return view('films_detail', array_merge($arrData,$arrComment));
    }
}
