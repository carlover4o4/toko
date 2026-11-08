<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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

    public function detailmenu(Request $request, Produk $produk)
    {
        return view('detailmenu', compact('produk'));
    }

    public function tambah() {
        $kategori = Kategori::all();

        return view('tambah', compact('kategori'));
    }

    public function keranjang(Request $request)
    {
        $detailtransaksi = DetailTransaksi::where('status', 'cart')->with('produk')->get();

        return view('keranjang', compact('detailtransaksi'));
    }

    public function postkeranjang(Request $request, Produk $produk)
    {
        $request->validate([
            'banyak' => 'required|integer|min:1',
        ]);

        DetailTransaksi::create([
            'qty' => $request->banyak,
            'user_id' => Auth::id(),
            'produk_id' => $produk->id,
            'kategori_id' => $produk->kategori_id,
            'status' => 'cart',
            'totalprice' => $produk->price * $request->banyak,
        ]);

        return redirect()->route('keranjang')->with('status', 'Added to the cart!');
    }

    public function checkout(Request $request, DetailTransaksi $detailtransaksi)
    {
        $produk = $detailtransaksi->produk;

        return view('checkout', compact('produk', 'detailtransaksi'));
    }

    public function postcheckout(Request $request, DetailTransaksi $detailtransaksi)
    {
        $request->validate([
            'bukti_transaksi' => 'required|file',
        ]);

        $transaksi = Transaksi::create([
            'user_id' => Auth::id(),
            'totalprice' => $detailtransaksi->totalprice,
            'code' => 'INV'.Str::random(8),
        ]);

        $detailtransaksi->update([
            'transaksi_id' => $transaksi->id,
            'status' => 'checkout',
            'bukti_transaksi' => $request->bukti_transaksi->store('images'),
        ]);

        return redirect()->route('keranjang')->with('status', 'Upload Success!');
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

    public function edit(Produk $produk)
    {
        $kategori = Kategori::all();

        return view('edit', compact('produk', 'kategori'));
    }

    public function postedit(Request $request, Produk $produk)
    {
        $data = $request->validate([
            'kategori_id' => 'required',
            'foto' => 'nullable|file|image',
            'name' => 'required',
            'price' => 'required|integer',
            'description' => 'required',
            'qty' => 'required|integer'
        ]);

        if($request->hasFile('foto')) {
            $data['foto'] = $request->foto->store('img', 'public');
        } else {
            unset($data['foto']);
        }
        $produk->update($data);

        return redirect()->route('admin');
    }

    public function hapus(Produk $produk)
    {
        $produk->delete();
        return redirect()->route('admin');
    }

    public function logout(Request $request) {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
