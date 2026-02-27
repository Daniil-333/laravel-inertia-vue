<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        return Inertia::render('Home', [
            'title' => 'Home page'
        ]);
    }

    public function video()
    {
        $videos = Video::all();
        return Inertia::render('Video', [
            'title' => 'Video page',
            'videos' => $videos
        ]);
    }
}
