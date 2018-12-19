<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use QCod\ImageUp\HasImageUploads;

class profile extends Model
{
    //
    use HasImageUploads;
    
    // assuming `profile` table has 'cover', 'avatar' columns
    // mark all the columns as image fields 

    protected $table = 'profile_table';
    
    protected $guarded = [];

    // which disk to use for upload, can be override by field options 
    protected $imagesUploadDisk = 'public';
    
    // path in disk to use for upload, can be override by field options 
    protected $imagesUploadPath = 'uploads';
    
    // auto upload allowed 
    protected $autoUploadImages = true;
    
    // all the images fields for modelf
    protected static $imageFields = [
        'cover_img' => [
           
            
            // what disk you want to upload, default config('imageup.upload_disk')
            'disk' => 'public',
            
            
            // placeholder image if image field is empty
            'placeholder' => '/images/avatar-placeholder.svg',
            
            // validation rules when uploading image
            'rules' => 'image|max:2000',
            
            // override global auto upload setting coming from config('imageup.auto_upload_images')
            'auto_upload' => false,
            
            // if request file is don't have same name, default will be the field name
            'file_input' => 'cover_img',
            
        ],
        'profile_img' => [
            //...
            // what disk you want to upload, default config('imageup.upload_disk')
            'disk' => 'public',
            
            
            // placeholder image if image field is empty
            'placeholder' => '/images/avatar-placeholder.svg',
            
            // validation rules when uploading image
            'rules' => 'image|max:2000',
            
            // override global auto upload setting coming from config('imageup.auto_upload_images')
            'auto_upload' => false,
            
            // if request file is don't have same name, default will be the field name
            'file_input' => 'cover_img',
               
        ]
        
    ];
    
    public function users()
    {
        return $this->hasOne(\App\User, 'user_id', 'id');
    }
}
