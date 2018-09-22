<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class UploadFileModel extends Model
{
    public function UploadFile($request) {
        //         Storage::put('public', $arrFile);
        return Storage::putFileAs(
            'public', $request->file, $request->id . "-" . $request->file->getClientOriginalName()
            );
    }
}
