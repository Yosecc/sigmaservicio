<?php 

# Ubicacion app\Helpers\Helper.php

namespace App\Helpers;
use Illuminate\Support\Facades\Storage;

class Helper
{
    public static function videoValidateS3($archivo)
    {
    	if (Storage::disk('s3')->exists($archivo) == true) {
    		$archivo = Storage::disk('s3')->url($archivo);
    	}else{
    		$archivo = 400;
    	}
    	
    	
	    return $archivo;
    }

     public static function imgValidateS3($archivo)
    {
    	if (Storage::disk('s3')->exists($archivo) == true) {
    		$archivo = Storage::disk('s3')->url($archivo);
    	}else{
    		$archivo = asset('images/avatar.png');
    	}
    	
    	
	    return $archivo;
    }
    public static function videoValidate($archivo)
    {
        if (Storage::exists($archivo) == true) {
            $archivo = asset(Storage::url($archivo));
        }else{
            $archivo = 400;
        }
        
        
        return $archivo;
    }

     public static function imgValidate($archivo)
    {
        if (Storage::exists($archivo) == true) {
            $archivo = asset(Storage::url($archivo));
        }else{
            $archivo = asset('images/avatar.png');
        }
        
        
        return $archivo;
    }
  
}