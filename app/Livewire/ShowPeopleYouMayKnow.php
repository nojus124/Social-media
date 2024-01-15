<?php

namespace App\Livewire;

use App\Http\Controllers\UserFriendship;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowPeopleYouMayKnow extends Component
{
    public $Peoples;

    // Use the mount method to receive the $Peoples parameter
    public function mount($peoples)
    {
        $this->Peoples = $peoples;
    }
    public function addFriend($id)
    {
        $user = Auth::user();
        // Get the user you want to add as a friend
        $friend = User::find($id);

        if ($friend) {
            // Get the current friends array or initialize an empty array
            $currentFriends = json_decode($user->friends, true) ?? [];

            // Check if the friend is not already in the list
            if (!in_array($friend->id, $currentFriends)) {
                // Add the friend to the array
                $currentFriends[] = $friend->id;

                // Update the user's friends column
                $user->friends = json_encode($currentFriends);
                $user->save();  // Save the user instance
                $this->skipRender();
            }
        }
    }

    public function render()
    {
        return view('livewire.show-people-you-may-know');
    }
}
