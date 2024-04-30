<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $sales = Sale::with(['user', 'product'])->get();
        return view('dashboard.sales.index', compact('sales'));
    }

    public function store(Request $request, $product)
    {
        // Ambil data keranjang yang sesuai dengan user yang sedang login
        $cart = Cart::where('user_id', auth()->user()->id)
                    ->where('product_id', $product)
                    ->first();

        // Validasi jika data keranjang tidak ditemukan atau sudah tidak ada
        if (!$cart) {
            return redirect()->back()->with('error', 'Keranjang tidak ditemukan');
        }

        // Simpan data penjualan (checkout) ke dalam tabel sales
        Sale::create([
            'user_id' => auth()->user()->id,
            'product_id' => $product,
            'status' => 'pending', // Atur status menjadi pending
        ]);

        // Hapus data keranjang setelah checkout
        $cart->delete();

        return redirect()->route('client.product.cart')->with('success', 'Checkout berhasil');
    }

    public function edit(Sale $sale)
    {
        $status = [
            ['name' => "Pending"],
            ['name' => "Selesai"]
        ];

        // dd($status);
        return view('dashboard.sales.edit', compact('sale','status'));
    }

    public function update(Request $request, Sale $sale)
    {
        $request->validate([
            'status' => 'required'
        ]);

        $sale->update([
            'status' => $request->status,
        ]);

        // dd($update);

        return redirect()->route('sales.index')->with('success', 'Berhasil update');
    }
}
