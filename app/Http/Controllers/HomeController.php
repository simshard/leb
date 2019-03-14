<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Project;

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
     * Show the application dashboard with logged in user projects
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project)
    {
        $projects=auth()->user()->projects;
        //  $projects= Project::where('owner_id', '=', Auth::user()->id)->get();
        return view('home', compact('projects'));
    }
}
