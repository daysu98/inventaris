<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the items.
     */
    public function welcome()
    {
        $data = [
            'items' => Item::paginate(30),
        ];

        return view('welcome', $data);
    }
}
