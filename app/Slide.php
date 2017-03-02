<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Slide extends Model
{
    public static function getSlide()
	{
        $slides = DB::table('slides')
        ->leftJoin('active_status', 'active_status.id', '=', 'slides.active_status_id')
        ->select('slides.id','slides.name','slides.photo','active_status.name as status')
        ->get();
        return $slides;
	}
}
