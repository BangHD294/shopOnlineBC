<?php
namespace App\Traits;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait StorageImageTrait{
    public function storageTraitUpload($request, $fieldName, $foderName)
    {
        if ($request->hasFile($fieldName)){
            $file = $request->$fieldName;
            $fileNameOrigin = $request->feature_image_path->getClientOriginalName();
            $fileNameHash = str::random(20). '.' . $file->getClientOriginalExtension();
            $filePath = $request->file($fieldName)->storeAs('public/'.$foderName.'/'.auth()->id(),$fileNameHash); //key = name input the image
            $dataUploadTrait = [
                'file_name' => $fileNameOrigin,
                'file_path' =>  Storage::url($filePath)

            ];
            return $dataUploadTrait;
        }
        return null;


    }

}
