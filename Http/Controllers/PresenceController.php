<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PresenceController extends Controller
{
    public function camera()
    {
        return view('presence.camera'); // Nama view sesuai dengan file Blade yang akan Anda buat
    }
}
