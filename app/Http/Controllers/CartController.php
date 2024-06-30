<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\SparePart;
use Illuminate\Http\Request;
use App\Models\Order;

class CartController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;
        $carts = Cart::where('user_id', $user_id)->get();

        return view('cart.index', compact('carts'));
    }

    public function create(SparePart $sparePart)
    {
        return view('cart.create', compact('sparePart'));
    }

    public function store($spare_part_id)
    {
        $sparePart = SparePart::findOrFail($spare_part_id);

        if ($sparePart->stock <= 0) {
            return redirect()->back()->with('error', 'No Stock')->withInput();
        }

        $user_id = auth()->user()->id;
        $cartItem = Cart::where('user_id', $user_id)
                        ->where('spare_part_id', $spare_part_id)
                        ->first();

        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
            $sparePart->decrement('stock');
        } else {
            $cartItem = new Cart();
            $cartItem->user_id = $user_id;
            $cartItem->spare_part_id = $spare_part_id;
            $cartItem->quantity = 1;
            $cartItem->save();
            $sparePart->decrement('stock');
        }

        Order::create([
            'spare_part_id' => $spare_part_id,
            'quantity' => 1,  
            'amount' => $sparePart->price,  
            'user_id' => $user_id,
        ]);
        

        return redirect()->route('dashboard')->with('success', 'Item added to cart successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'action' => 'required|in:increase,decrease',
        ]);

        $cart = Cart::findOrFail($id);
        $sparePart = SparePart::findOrFail($cart->spare_part_id);

        if ($request->action === 'increase') {
            $cart->quantity += 1;
            $sparePart->decrement('stock');
        } elseif ($request->action === 'decrease') {
            if ($cart->quantity > 1) {
                $cart->quantity -= 1;
                $sparePart->increment('stock');
            }
        }

        $cart->save();
        $sparePart->save();

        return redirect()->back()->with('success', 'Cart item updated successfully.');
    }

    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);
        $sparePart = SparePart::findOrFail($cart->spare_part_id);

        $sparePart->increment('stock', $cart->quantity);
        $cart->delete();

        return redirect()->back()->with('success', 'Cart item removed successfully.');
    }
}
