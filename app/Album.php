<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Album extends Model
{
	public static function getAlbum()
	{
        $albums = DB::table('albums')->get();
        return $albums;
	}

    public static function getAlbumActive()
    {
        $albums = DB::table('albums')->select('id','name')->where('status','active')->get();
        return $albums;
    }

    public static function getAlbumLatest()
    {
        $albums = DB::table('albums')
                    ->select('id','name','photo')
                    ->where('status','active')
                    ->orderBy('created_at', 'desc')
                    ->take(3)
                    ->get();
        return $albums;   
    }

    
}
