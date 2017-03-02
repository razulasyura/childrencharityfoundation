<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Gallery extends Model
{
    public static function getGallery()
	{
        $galleries = DB::table('galleries')
        ->leftJoin('albums', 'albums.id', '=', 'galleries.album_id')
        ->select('galleries.id','galleries.name','galleries.photo','albums.name as album_name')
        ->orderBy('albums.id', 'asc')
        ->get();
        return $galleries;
	}

	public static function getFrontGallery($id=null)
    {
        $galleries = DB::table('galleries')
                ->select('id','name','photo')
                ->inRandomOrder()
                ->take(9)
                ->get();
        return $galleries;
    }

    public function getGalleryPaginate()
    {
    	$galleries = DB::table('galleries')
                ->select('id','name','photo')
                ->inRandomOrder()
                ->paginate(9)
                ->get();
        return $galleries;
    }

    public static function getGalleryByAlbum($id)
    {
        $galleries = DB::table('galleries')
                ->select('id','name','photo','album_id')
                ->where('album_id', $id)
                ->get();
        return $galleries;
    }
}
