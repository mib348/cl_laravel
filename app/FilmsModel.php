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
        $data['f_slug'] = strtolower(str_replace(" ", "-", $request->strSlug));
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
        
        if (!empty($request->file)){
            $request->id = $nRef;
            $UploadFileModel = new UploadFileModel();
            $UploadFileModel->UploadFile($request);
        }
        
        return $nRef;
    }
    
    public function saveComment($request) {
        $data = [];
        $data['c_film_id'] = $request->nId;
        $data['c_name'] = $request->strName;
        $data['c_comment'] = $request->strDesc;
        
        $nRef = DB::table("tblComments")->insertGetId($data);
        return $nRef;
    }
    
    public function GetDetail($request) {
        return (array) DB::table("tblFilms")->where('f_slug', $request->slug)->get()->toArray()[0];
    }
    
    public function GetComment($request) {
        return (array) DB::table("tblComments")->where('c_film_id', $request->f_id)->get()->toArray();
    }
    
    public function DeleteData($request) {
        return DB::table("tblFilms")->where('f_id', "=", $request->nId)
        ->delete();
    }
    
    
    public function GetData($request){
        $html = "";
        if ($request->stepType == "back")
            $arrRec = DB::table("tblFilms")->where('f_id', "<", $request->nFilmId)->orderByRaw('f_id DESC')->get();
        else if ($request->stepType == "next")
            $arrRec = DB::table("tblFilms")->where('f_id', ">", $request->nFilmId)->orderByRaw('f_id ASC')->get();
        else
            $arrRec = DB::table("tblFilms")->orderByRaw('f_id DESC')->get();
            
        $arrData = $arrRec[0];
//         foreach ($arrRec as $arrData){
            $html .= '<tr id="' . $arrData->f_id . '" slug="' . $arrData->f_slug . '">
                            <td><a href="' . url('/films/' . $arrData->f_slug) . '" class="text-info">' . $arrData->f_name . '</a></td>
                            <td>' . $arrData->f_ticket_price . '</td>
                            <td>' . date("d F, Y", strtotime($arrData->f_release_date)) . '</td>
                        </tr>';
//         }
        
        $html .= '<tr>';
            $html .= '<td colspan="4" class="text-right">';
            if (DB::table("tblFilms")->where('f_id', "<", $arrData->f_id)->count())
                $html .= '<a class="back_btn btn btn-secondary" data-id="' . $arrData->f_id . '">Back</a>';
            if (DB::table("tblFilms")->where('f_id', ">", $arrData->f_id)->count())
                $html .= '<a class="btn btn-secondary next_btn" data-id="' . $arrData->f_id . '">Next</a>';
            $html .= '</td>';
        $html .= '</tr>';
        
        return $html;
    }
}
