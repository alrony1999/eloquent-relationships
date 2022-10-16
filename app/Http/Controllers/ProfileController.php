<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show($profile)
    {
        $profile=Profile::where('user_id', $profile)->first();
        return view('profiles.show', ['profile'=>$profile]);
    }
}
