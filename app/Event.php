<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Event extends Model
{
    public static function getEvent()
    {
        $events = DB::table('events')
        ->leftJoin('albums', 'albums.id', '=', 'events.albums_id')
        ->select('events.id','events.name','events.photo','events.detail','albums.name as album_name')
        ->orderBy('events.id', 'asc')
        ->get();
        return $events;
    }

    public static function getEventRandom()
    {
        $events = DB::table('events')
                ->select('id','name','photo')
                ->inRandomOrder()
                ->limit(7)
                ->get();
        return $events;
    }
}
