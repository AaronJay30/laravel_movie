<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

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
            
            if (auth()->user()->role === 'Admin') {
                return redirect('/admin')->with('message', 'Welcome back admin!');
            }

            return redirect('/')->with('message', 'Welcome back!');
        }

        return redirect('/users')->withErrors(['email' => "Login failed"])->onlyInput('email');
    }

    public function about()
    {
        return view('Users.about');
    }

    public function contact()
    {
        return view('Users.contact');
    }

    public function profile()
    {
        return view('Users.profile');
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
        $dt = new Carbon();
        $before = $dt->subYears(12)->format('Y-m-d');

        $validatedData = $request->validate([
            "username" => [
                "required",
                "min:6",
                Rule::unique('users')->ignore(Auth::user()->userID, 'userID'),
            ],
            "birthday" => "required|date|before: " . $before,
            "email" => [
                "required",
                "email",
                Rule::unique('users')->ignore(Auth::user()->userID, 'userID'),
            ],
        ], [
            "birthday.before" => "You must be above 12 years old to register",
        ]);

        $user = User::findOrFail($id);

        $user->update([
            "username" => $validatedData['username'],
            "birthday" => $validatedData['birthday'],
            "email" => $validatedData['email'],
        ]);

        $filename = "";
        if ($request->hasFile('file')) {
            // Delete old image
            $oldImagePath = public_path('/img/profile/') . $user->username;
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }

            // Upload new image
            $filename = $validatedData['username'] . '.' . $request->file->extension();
            $user->profile_picture = $filename;
            $request->file->move(public_path('/img/profile/'), $filename);
        }

        // Save the user model
        $user->save();

        // dd($user);
        if (Auth::user()->role == 'Admin') {
            return redirect('/admin')->with(['message' => "You've successfully updated your profile!"]);
        } else {
            return redirect()->back()->with(['message' => "You've successfully updated your profile!"]);
        }
    }

    public function logout(Request $request)
    {
        $email = null;
        if ($request->session()->has('login_email') && $request->session()->pull('remember')) {
            $email = $request->session()->pull('login_email');
        }

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with(['message' => 'Logout successful']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
