<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Users.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Users.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dt = new Carbon();
        $before = $dt->subYears(12)->format('Y-m-d');

        $validatedData = $request->validate(
            [
                "username" => "required|min:6|unique:users",
                "birthday" => "required|date|before: " . $before,
                "email" => "required|email|unique:users",
                "password" => "required|min:8|alpha_num:ascii|confirmed",

            ],
            [
                "birthday.before" => "You must be above 12 years old to register",
            ]
        );

        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['role'] = "User";


        if (!$user = User::create($validatedData)) {
            return redirect('/users/create')->with('message', "Something went wrong!");
        }

        // DB::table('users')->insert($validatedData);
        return redirect('/users')->with('message', "You've succesfully registered account");
    }

    public function process(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            "email" => "required | email",
            'password' => 'required'
        ]);

        if (auth()->attempt($validated)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'Welcome back!');
        }

        return redirect('/users')->withErrors(['email' => "Login failed"])->onlyInput('email');
    }

    public function about()
    {
        return view('Users.about');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
