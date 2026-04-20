<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;
class MemoController extends Controller
{
    public function store(Request $request){

        $validated = $request->validate([
            'content' => 'required|string|max:10000',
        ]);

        $memo = Memo::create($validated);

        return response()->json($memo, 201);
    }
}
