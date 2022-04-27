<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UpdateController extends Controller
{
    public function index()
    {
        return view('auth.update');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $user = Auth::user();
        $user->name = $request->input('name');

        if ( !is_null($request->input('email')) ) {
            $user->email = $request->input('email');
        }
        $user->save();

        return view('auth.update');
    }
}
