<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientSaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function cart()
    {
        $userId = Auth::id();
        $carts = Cart::with('product')->where('user_id', $userId)->get();
        return view('client.cart', compact('carts'));
    }

    public function addToCart(Request $request, $productId)
    {
        $userId = Auth::id();
        $product = Product::findOrFail($productId);

        // Hitung total berdasarkan harga produk dan kuantitas
        $total = $product->price_discount * 1; // Default quantity is 1

        // Simpan data ke dalam keranjang
        $cartItem = new Cart([
            'user_id' => $userId,
            'product_id' => $productId,
            'quantity' => 1, // Default quantity
            'total' => $total,
        ]);
        $cartItem->save();

        // Redirect kembali ke halaman produk dengan pesan sukses
        return redirect()->route('client.product.cart')->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect()->route('client.product.cart')->with('success', 'Produk berhasil dikurangi dari keranjang.');
    }

    public function checkout(Request $request)
    {
        // Ambil data keranjang sesuai dengan user yang sedang login
        $carts = Cart::where('user_id', Auth::id())->get();

        // Simpan data keranjang ke dalam tabel sales
        foreach ($carts as $cart) {
            Sale::create([
                'user_id' => Auth::id(),
                'product_id' => $cart->product_id,
                'status' => 'Pending',
            ]);
        }

        // Hapus semua data keranjang setelah checkout
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('client.checkout.pembayaran')->with('success', 'Checkout berhasil.');
    }

    public function pembayaran()
    {
        return "Selamat";
    }
}
