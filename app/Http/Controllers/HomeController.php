<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Correios;
use App\Models\Study;

class HomeController extends Controller
{
    /**
     * @var \App\Models\Study
     */
    protected $study;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Study $study)
    {
        $this->middleware('auth');
        $this->study = $study;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $delayedStudies    = $this->study->delayedStudies();
        $progressStudies   = $this->study->progressStudies();
        $completedStudies  = $this->study->completedStudies();
        return view('home', compact('delayedStudies', 'progressStudies', 'completedStudies'));
    }
}
