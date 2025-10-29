<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // ======== REGISTER ADMIN ========
    public function showAdminRegister()
    {
        return view('auth.register_admin');
    }

    public function registerAdmin(Request $request)
    {
        if (Admin::count() >= 5) {
            return back()->with('error', 'Maksimal hanya 5 admin yang dapat terdaftar.');
        }

        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6|confirmed',
        ]);

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.login')->with('success', 'Registrasi admin berhasil! Silakan login.');
    }

    // ======== REGISTER USER ========
    public function showUserRegister()
    {
        return view('auth.register_user');
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user.login')->with('success', 'Registrasi user berhasil! Silakan login.');
    }

    // ======== LOGIN ADMIN ========
    public function showAdminLogin()
    {
        return view('auth.login_admin');
    }

    public function loginAdmin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $admin = Admin::where('email', $credentials['email'])->first();

        if ($admin && Hash::check($credentials['password'], $admin->password)) {
            session(['admin_id' => $admin->id]);
            return redirect()->route('dashboard.admin');
        }

        return back()->with('error', 'Email atau password salah.');
    }

    // ======== LOGIN USER ========
    public function showUserLogin()
    {
        return view('auth.login_user');
    }

    public function loginUser(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            session(['user_id' => $user->id]);
            return redirect()->route('home');
        }

        return back()->with('error', 'Email atau password salah.');
    }

    // ======== LOGOUT ========
    public function logout()
    {
        session()->flush();
        return redirect()->route('home')->with('success', 'Berhasil logout.');
    }
}
