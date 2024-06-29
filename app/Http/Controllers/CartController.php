<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\SparePart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function store($id_spare_part)
    {
        $sparePart = SparePart::findOrFail($id_spare_part);

        if ($sparePart->stock_spare_part <= 0) {
            return redirect()->back()->with('error', 'No Stock')->withInput();
        }

        $user_id = auth()->user()->id;
        $cartItem = Cart::where('user_id', $user_id)
                        ->where('spare_part_id', $id_spare_part)
                        ->first();

        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
            $sparePart->decrement('stock_spare_part');
        } else {
            $cartItem = new Cart();
            $cartItem->user_id = $user_id;
            $cartItem->spare_part_id = $id_spare_part;
            $cartItem->quantity = 1;
            $cartItem->save();
            $sparePart->decrement('stock_spare_part');
        }

        Order::create([
            'spare_part_id' => $id_spare_part,
            'quantity' => 1,  
            'amount' => $sparePart->harga,  
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
            $sparePart->decrement('stock_spare_part');
        } elseif ($request->action === 'decrease') {
            if ($cart->quantity > 1) {
                $cart->quantity -= 1;
                $sparePart->increment('stock_spare_part');
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

        $sparePart->increment('stock_spare_part', $cart->quantity);
        $cart->delete();

        return redirect()->back()->with('success', 'Cart item removed successfully.');
    }
}
