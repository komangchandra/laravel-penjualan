<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Delivery;
use App\Models\Payment;
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
                'payment_id' => null,
                'delivery_id' => null,
                'status' => 'Pending',
                'image' => null,
            ]);
        }

        // Hapus semua data keranjang setelah checkout
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('client.checkout.pembayaran')->with('success', 'Checkout berhasil.');
    }

    public function pembayaran()
    {
        $userId = Auth::id();
        $sales = Sale::with('product.category')
                    ->where('user_id', $userId)
                    ->where('status', 'Pending')
                    ->get();

        $totalPrice = $sales->sum(function ($sale) 
        {
            return $sale->product->price;
        });

        $payments = Payment::all();
        $deliveries = Delivery::all();

        return view('client.checkout', compact('sales', 'totalPrice', 'payments', 'deliveries'));
    }

    // update pembayaran
    public function updateSales(Request $request)
    {
        // Ambil data sales yang ingin diperbarui
        $sales = Sale::where('user_id', Auth::id())->where('status', 'Pending')->get();

        // Validasi data yang diterima dari form
        $request->validate([
            'payment_id' => 'required|exists:payments,id',
            'delivery_id' => 'required|exists:deliveries,id',
            'image_payment' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Simpan file gambar jika ada
        if ($request->hasFile('image_payment')) {
            $imagePath = $request->file('image_payment')->store('public/payment');
            $imageName = basename($imagePath);
        }

        // Perbarui data sales
        foreach ($sales as $sale) {
            $sale->update([
                'payment_id' => $request->payment_id ?? $sale->payment_id,
                'delivery_id' => $request->delivery_id ?? $sale->delivery_id,
                'status' => 'Sudah Bayar', 
                'image' => $imageName ?? $sale->image,
            ]);
        }

        return redirect()->route('client.checkout.pembayaran')->with('success', 'Berhasil bayar.');
    }

    // Hapus produk di pembayaran
    public function hapus(Sale $sale)
    {
        $sale->delete();
        return redirect()->route('client.checkout.pembayaran')->with('success', 'Produk berhasil dikurangi.');
    }
}
