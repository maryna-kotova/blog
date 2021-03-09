<?php
namespace App\Traits;

trait NoImage{

   public function getImgAttribute($value)
      {
         return $value ? $value : '/images/noimage.png'; 
      }
}