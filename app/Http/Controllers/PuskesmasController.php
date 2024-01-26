<?php

namespace App\Http\Controllers;

use App\Models\profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PuskesmasController extends Controller
{
    public function index()
    {
        // $id = Auth::user()->id;
        // $data = profile::findOrFail($id)->profil;
        return Inertia::render('detailProfil');
    }

    public function mamang()
    {
    }
}
