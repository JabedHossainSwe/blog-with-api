<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        // Check if the user has the specified role or is the post owner
        if ($user && (in_array($user->role, $roles) || $this->isPostOwner($request))) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }

    private function isPostOwner($request)
    {
        $postId = $request->route('post'); // Assuming your route parameter is named 'post'
        $user = Auth::user();

        if ($postId && $user) {
            // Check if the authenticated user is the owner of the post
            return $user->posts()->where('id', $postId)->exists();
        }

        return false;
    }
}
