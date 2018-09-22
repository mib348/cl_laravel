<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\UploadFileModel as UploadFileModel;

class FilmsModel extends Model
{
    public function AddData($request) {
        $data = [];
        $data['f_name'] = $request->strName;
        $data['f_desc'] = $request->strDesc;
        
        if (!empty($request->file))
            $data['f_photo'] = $request->file->getClientOriginalName();
        if (!empty($request->strReleaseDate))
            $data['f_release_date'] = date("Y-m-d", strtotime($request->strReleaseDate));
        
        $data['f_ticket_price'] = $request->strTicketPrice;
        $data['f_country'] = $request->strCountry;
        $data['f_rating'] = $request->nRating;
        $data['f_genre'] = $request->strGenre;
        
        if (!empty($request->nId)){
            DB::table("tblFilms")->where('f_id', $request->nId)->update($data);
            $nRef = $request->nId;
        }
        else
            $nRef = DB::table("tblFilms")->insertGetId($data);
        
        if (!empty($request->strImage)){
            $request->id = $nRef;
            $UploadFileModel = new UploadFileModel();
            $UploadFileModel->UploadFile($request);
        }
        
        return $nRef;
    }
    
    public function GetDataDetail($request) {
        return (array) DB::table("tblFilms")->find($request->nId);
    }
    
    public function DeleteData($request) {
        return DB::table("tblFilms")->where('f_id', "=", $request->nId)
        ->delete();
    }
    
    
}
