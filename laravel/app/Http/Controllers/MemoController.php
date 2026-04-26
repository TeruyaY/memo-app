<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;
class MemoController extends Controller
{
    public function store(Request $request){

        $validated = $request->validate([
            'content' => 'required|string|max:10000',
            'tag_id' => 'required|integer|exists:tags,id',
        ]);

        $memo = Memo::create($validated);

        return response()->json($memo, 201);
    }

    public function index(){
        $memos = Memo::with('tag')->get();

        return response()->json($memos, 200);
    }

    public function destroy($id){
        $memo = Memo::findOrFail($id);
        $memo->delete();
        return response()->json(null, 204);
    }
}
