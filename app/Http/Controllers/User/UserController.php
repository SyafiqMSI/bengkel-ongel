<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SparePart;

class UserController extends Controller
{
    public function index(){
        $spareParts = SparePart::all(); 
        return view('dashboard', compact('spareParts'));
    }
    public function createCart($id)
    {
        $sparePart = SparePart::findOrFail($id);
        return redirect()->back()->with('success', 'Item added to cart successfully.');
    }
}
