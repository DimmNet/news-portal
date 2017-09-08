<?php

namespace App\Policies;

use App\News;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NewsPolicy
{
    use HandlesAuthorization;

    public function delete(User $user, News $news)
    {
        return $user->id === $news->user_id;
    }
}
