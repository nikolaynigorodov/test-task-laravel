<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $users = User::orderBy('id', 'desc')->paginate(6);
        $page = ($request->get('page') ? $request->get('page') : 1);

        if ($request->ajax()) {
            $view = view('users-ajax', compact('users'))->render();
            return response()->json(['html'=>$view], 200);
        }

        return view('users', compact('users', 'page'));
    }
}
