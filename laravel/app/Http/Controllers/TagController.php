<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\User;

class TagController extends Controller
{
    private function getTestUser() {
        return User::first(); // 常に最初の一人を取得
    }
    public function index(){

        $user = $this->getTestUser();

        $tags = $user->tags()->get();

        return response()->json($tags, 200);
    }
}
