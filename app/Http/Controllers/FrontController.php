<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination;
use App\Slide;
use App\Team;
use App\Gallery;
use App\Program;
use App\Album;
use App\Event;
use App\Contact;
use App\Content;
// use App\Volunteer;
// use App\Veterinarian;
// use App\Adoption;

class FrontController extends Controller
{
    public function index()
    {
        $data = array(
			'page_header'=> title_case('Home'),
			'page_description'=> title_case('Homepage'),
			'slides'=> Slide::where('active_status_id', 1)->take(3)->get(),
			'albums'=> Album::getAlbumLatest(),
            'contact' => Contact::whereId(1)->firstOrFail(),
			'programs'=> Program::all(),
			'galleries' => Gallery::getFrontGallery()
            );
        // dd($data);
        return view('index',$data);
    }

    public function about()
    {
        $data = array(
            'page_header'=> title_case('About'),
            'page_description'=> title_case('About'),
            'content' => Content::findOrFail(1),
            'albums'=> Album::getAlbumLatest(),
            'contact' => Contact::whereId(1)->firstOrFail(),
            );
        return view('about',$data);
    }

    public function donate()
    {
        $data = array(
            'page_header'=> title_case('donate'),
            'page_description'=> title_case('donate'),
            'content' => Content::findOrFail(2),
            'albums'=> Album::getAlbumLatest(),
            'contact' => Contact::whereId(1)->firstOrFail(),
            );
        return view('content_full',$data);
    }

    public function profil()
    {
        $data = array(
            'page_header'=> title_case('profil'),
            'page_description'=> title_case('profil'),
            'content' => Content::findOrFail(3),
            'albums'=> Album::getAlbumLatest(),
            'teams' => Team::All(),
            'contact' => Contact::whereId(1)->firstOrFail(),
            );
        return view('content_full_with_team',$data);
    }

    public function kitabisa()
    {
        $data = array(
            'page_header'=> title_case('Campaign'),
            'page_description'=> title_case('Campaign'),
            'albums'=> Album::getAlbumLatest(),
            'contact' => Contact::whereId(1)->firstOrFail(),
            );
        return view('kitabisa',$data);
    }

    public function contact()
    {
        $data = array(
            'page_header'=> title_case('Contact'),
            'page_description'=> title_case('Contact'),
            'contacts' => Contact::whereId(1)->firstOrFail(),
            'albums'=> Album::getAlbumLatest(),
            'contact' => Contact::whereId(1)->firstOrFail(),
            );
        return view('contact',$data);
    }

    public function gallery()
    {
        $data = array(
			'page_header'=> title_case('Gallery'),
			'page_description'=> title_case('Gallery'),
			'galleries' => Gallery::paginate(12),
            'albums'=> Album::getAlbumLatest(),
            'contact' => Contact::whereId(1)->firstOrFail(),
            );
        // dd($data);
        return view('gallery',$data);
    }

    public function album($id)
    {
        $data = array(
            'album' => Album::whereId($id)->firstOrFail(),
            'galleries' => Gallery::getGalleryByAlbum($id),
            'page_header'=> title_case('Album'),
            'page_description'=> title_case('Album'),
            'albums'=> Album::getAlbumLatest(),
            'contact' => Contact::whereId(1)->firstOrFail(),
            );
        // dd($data);
        return view('album',$data);
    }

    public function program()
    {
        $data = array(
            'page_header'=> title_case('program'),
            'page_description'=> title_case('program'),
            'programs' => Program::All(),
            'albums'=> Album::getAlbumLatest(),
            'contact' => Contact::whereId(1)->firstOrFail(),
            );
        // dd($data);
        return view('program',$data);
    }

    public function program_detail($id)
    {
        $data = array(
            'program' => Program::whereId($id)->firstOrFail(),
            'page_header'=> title_case('Program'),
            'page_description'=> title_case('Detail Program'),
            'albums'=> Album::getAlbumLatest(),
            'contact' => Contact::whereId(1)->firstOrFail(),
            );
        // dd($data);
        return view('program_detail',$data);
    }

    public function adoption()
    {
        $data = array(
            'page_header'=> title_case('adoption'),
            'page_description'=> title_case('adoption'),
            'adoptions' => Adoption::where('adoptions_status_id', 2)->paginate(6),
            'albums'=> Album::getAlbumLatest(),
            'contact' => Contact::whereId(1)->firstOrFail(),
            );
        // dd($data);
        return view('adoption',$data);
    }

    public function adoption_detail($id)
    {
        $data = array(
            'adoptions' => Adoption::getAdoptionById($id),
            'page_header'=> title_case('adoption'),
            'page_description'=> title_case('detail adoption'),
            'albums'=> Album::getAlbumLatest(),
            'contact' => Contact::whereId(1)->firstOrFail(),
            );
        // dd($data);
        return view('adoption_detail',$data);
    }

    public function volunteer()
    {
        $data = array(
            'page_header'=> title_case('general volunteers'),
            'page_description'=> title_case('general volunteers'),
            'volunteers'=> Volunteer::all(),
            'albums'=> Album::getAlbumLatest(),
            'contact' => Contact::whereId(1)->firstOrFail(),
            );
        // dd($data);
        return view('volunteer',$data);
    }

    public function veterinarian()
    {
        $data = array(
            'page_header'=> title_case('vet volunteers'),
            'page_description'=> title_case('vet volunteers'),
            'volunteers'=> Veterinarian::all(),
            'albums'=> Album::getAlbumLatest(),
            'contact' => Contact::whereId(1)->firstOrFail(),
            );
        // dd($data);
        return view('volunteer',$data);
    }

    public function blog()
    {
        $data = array(
            'page_header'=> title_case('blog'),
            'page_description'=> title_case('blog'),
            'albums'=> Album::getAlbumLatest(),
            'events' => Event::paginate(6),
            'contact' => Contact::whereId(1)->firstOrFail(),
            );
        // dd($data);
        return view('blog',$data);
    }

    public function blog_detail($id)
    {
        $data = array(
            'page_header'=> title_case('blog'),
            'page_description'=> title_case('detail blog'),
            'albums'=> Album::getAlbumLatest(),
            'contact' => Contact::whereId(1)->firstOrFail(),
            'event' => Event::whereId($id)->firstOrFail(),
            'events' => Event::getEventRandom()
            );
        $galleries = Gallery::getGalleryByAlbum($data['event']->albums_id);
        // dd($galleries);
        return view('blog_detail',$data)->withGalleries($galleries);
    }

}
