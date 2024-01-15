<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserFriendship extends Controller
{
    public function showPeopleMayKnow(){
        $userId = auth()->id();

        // Decode the JSON list of friend IDs
        $friendIds = json_decode(auth()->user()->friends, true) ?? [];

        // Exclude the user's own ID
        $friendIds[] = $userId;

        $peoples = User::where('id', '!=', $userId)
            ->whereNotIn('id', $friendIds)
            ->take(5)
            ->get();

        return view('dashboard', ['peoples' => $peoples]);
    }
}
