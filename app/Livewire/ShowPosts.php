<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowPosts extends Component
{
    public $posts;
    public $message;
    public function mount()
    {

        $userId = Auth::id();

        $this->posts = Post::whereHas('community', function ($query) use ($userId) {
            $query->whereHas('users', function ($userQuery) use ($userId) {
                $userQuery->where('users.id', $userId);
            });
        })
            ->latest()
            ->get();
    }
    public function CommentPost($postId)
    {
        // Validate the comment input, you can add more validation rules as needed
        $this->validate([
            'message' => 'required|string|max:255',
        ]);

        // Create a new comment for the post
        Comment::create([
            'post_id' => $postId,
            'user_id' => auth()->id(),
            'text' => $this->message,
        ]);

        // Clear the comment input after successful comment creation
        $this->message = '';

        // Refresh the posts data after commenting
        $this->posts = Post::latest()->get();
    }


    public function likePost($id)
    {
        // Find the like record for the user and post
        $existingLike = Like::where('user_id', Auth::id())
            ->where('post_id', $id)
            ->first();

        // Toggle like/unlike
        if ($existingLike) {
            // If the user has already liked the post, unlike it
            $existingLike->delete();
        } else {
            // If the user hasn't liked the post, like it
            Like::create([
                'user_id' => Auth::id(),
                'post_id' => $id,
            ]);
        }

        // Refresh the posts data after the like/unlike action
        $this->posts = Post::latest()->get();
    }
    public function isPostLiked($postId)
    {
        // Check if the current user has liked the post
        return Like::where('user_id', Auth::id())
            ->where('post_id', $postId)
            ->exists();
    }
    public function render()
    {
        return view('livewire.show-posts');
    }
}
