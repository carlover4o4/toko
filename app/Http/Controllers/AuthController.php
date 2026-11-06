<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login() {
        return view('welcome');
    }

    public function postlogin(Request $request) {
        $cek = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($cek)) {
            $user = Auth::user();

            if($user->role == 'admin') {
                return redirect()->route('admin');
            } else {
                return redirect()->route('menu');
            }
        }

        return back()->with('Email atau pw salah!');
    }

    public function register() {
        return view('register');
    }

    public function postregister(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'customer'
        ]);
        return redirect()->route('login');
    }

    public function admin() {
        $produk = Produk::all();

        return view('admin', compact('produk'));
    }

    public function menu() {
        $produk = Produk::all();

        return view('menu', compact('produk'));
    }

    public function logout(Request $request) {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function tambah() {
        $kategori = Kategori::all();

        return view('tambah', compact('kategori'));
    }

    public function posttambah(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required',
            'foto' => 'required|image',
            'name' => 'required',
            'price' => 'required|integer',
            'description' => 'required',
            'qty' => 'required|integer'
        ]);

        Produk::create([
            'kategori_id' => $request->kategori_id,
            'foto' => $request->file('foto')->store('img', 'public'),
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'qty' => $request->qty
        ]);
        return redirect()->route('admin');
    }

    public function hapus(Produk $produk)
        {
            $produk->delete();
            return redirect()->route('admin');
        }
}
