<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3'
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // $c = User::where('email', $request->email)->get();

        // $requestPw = bcrypt($request->password);

        // dd($requestPw);

        if (Auth::attempt($data)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login')->with('failed', 'Email Password Atau Salah');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Berhasil Logout');
    }

    public function registerProses(Request $request)
    {
        $request->validate([
            'name' => 'required|',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        User::create($data);

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3|max:12|'
        ]);

        $login = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($login)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login')->with('failed', 'Email Password Atau Salah');
        }
    }
}
