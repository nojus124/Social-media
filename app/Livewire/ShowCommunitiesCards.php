<?php

namespace App\Livewire;

use App\Models\Community;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowCommunitiesCards extends Component
{
    public $search;
    public $communities;
    public $communityID;
    public $confirmingUserLeaving = false;
    public function refreshCommunities()
    {
        // Refresh the communities data
        $this->communities = Community::all();
    }
    public function searchCommunities()
    {
        // Query communities directly using the Community model
        $results = Community::when($this->search, function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%');
        })->get();
        $this->search = "";
        $this->communities = $results;
    }
    public function toggleCommunity($communityID){
        $this->communityID = $communityID;
        $this->confirmingUserLeaving = !$this->confirmingUserLeaving;
    }
    public function joinCommunity($communityID){
        $user = Auth::user();

        $community = Community::find($communityID);

        if ($community && !$user->communities->contains($community)) {
            // Attach the user to the community if they are not already joined
            $user->communities()->attach($community);
        }
        return redirect()->route('communities.community');
    }
    public function leaveCommunity(){
        $user = Auth::user();
        $this->confirmingUserLeaving = !$this->confirmingUserLeaving;
        $community = $user->communities()->find($this->communityID);

        if ($community) {
            $user->communities()->detach($community);

        }
    }
    public function mount()
    {
        $this->communities = Community::all();
    }

    public function render()
    {
        return view('livewire.show-communities-cards');
    }
}
