<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;
use App\Models\User;
class MemoController extends Controller
{
    private function getTestUser() {
        return User::first(); // 常に最初の一人を取得
    }
    public function store(Request $request){

        $user = $this->getTestUser();

        $validated = $request->validate([
            'content' => 'required|string|max:10000',
            'tag_ids' => 'required|array',
            'tag_ids.*' => 'integer|exists:tags,id',
        ]);

        $memo = $user->memos()->create([
            'content' => $validated['content']
        ]);

        $memo->tags()->sync($validated['tag_ids']);

        return response()->json($memo->load('tags'), 201);
    }

    public function index(){

        $user = $this->getTestUser();

        $memos = $user->memos()->with('tags')->latest()->get();


        return response()->json($memos, 200);
    }

    public function destroy($id){
        $user = $this->getTestUser();
        $memo = $user->memos()->findOrFail($id);
        $memo->delete();
        return response()->json(null, 204);
    }
}
