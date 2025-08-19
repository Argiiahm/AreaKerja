<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TalentHunterController extends Controller
{
    public function index() {
        return view('talentHunter');
    }
}
