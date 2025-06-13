<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function register (Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('login.form')->with('success', 'Registrasi berhasil! Silakan login.');
    }
    public function login (Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/home');
        } else {
            return back()->withInput()->with('error', 'Email atau password salah.');
        }
    }
public function logout(Request $request)
{
    Auth::logout(); 
    $request->session()->invalidate(); 
    $request->session()->regenerateToken(); 

    return redirect('/login'); 
}
public function edit()
{
    $user = Auth::user(); // Auth::user() harus mengembalikan instance User
    return view('edit', compact('user'));
}

public function update(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
        
    ]);

    // Tambahkan pengecekan apakah user login
    if (!Auth::check()) {
        return redirect()->route('login');
    }
    $user = User::find(Auth::id());
    
    // Jika user tidak ditemukan di database
    if (!$user) {
        return redirect()->back()->with('error', 'User tidak ditemukan');
    }
    $user->name = $request->name;
    $user->email = $request->email;

    $user->save();

    return redirect()->route('profile.edit')->with('success', 'Profil berhasil diperbarui.');
}
public function destroy(Request $request)
{
    $user = Auth::user();
    Auth::logout();
    $user->delete();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/')->with('success', 'Akun Anda berhasil dihapus.');
}
public function checkEmail(Request $request)
{
    $email = $request->input('email');
    $exists = User::where('email', $email)->exists();
    return response()->json(['exists' => $exists]);
}
}