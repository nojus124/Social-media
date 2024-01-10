<?php

namespace App\Livewire;

use App\Models\Community;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowCommunities extends Component
{
    public $OwnedCommunities;

    public function mount()
    {
        $userId = Auth::id(); // Get the ID of the currently authenticated user

        $communities = Community::where('ownedByUserID', $userId)
            ->withCount('users')
            ->get();

        $this->OwnedCommunities = $communities;
    }
    public function render()
    {
        return view('livewire.show-communities');
    }
}
