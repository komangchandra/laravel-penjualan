<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function index()
    {
        $deliveries = Delivery::all();
        return view('dashboard.deliveries.index', compact('deliveries'));
    }

    public function create()
    {
        return view('dashboard.deliveries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'delivery_name' => 'required',
        ]);

        Delivery::create([
            'delivery_name' => $request->delivery_name,
        ]);

        return redirect()->route('deliveries.index')->with('success', 'Data berhasil tambah');
    }

    public function edit(Delivery $delivery)
    {
        return view('dashboard.deliveries.edit', compact('delivery'));
    }

    public function update(Request $request, Delivery $delivery)
    {
        $request->validate([
            'delivery_name' => 'required',
        ]);

        $delivery->update([
            'delivery_name' => $request->delivery_name,
        ]);

        return redirect()->route('deliveries.index')->with('success', 'Data berhasil diupdate');
    }
    
    public function destroy(Delivery $delivery)
    {
        $delivery->delete();
        
        return redirect()->route('deliveries.index')->with('success', 'Data berhasil dihapus');
    }

}
