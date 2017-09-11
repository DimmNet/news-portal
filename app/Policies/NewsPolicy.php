<?php

namespace App\Policies;

use App\News;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NewsPolicy
{
    use HandlesAuthorization;

    /**
     * Проверяем доступ на редактирование новости.
     *
     * @param User $user
     * @param News $news
     * @return bool
     */
    public function update(User $user, News $news)
    {
        return $user->id === $news->user_id;
    }

    /**
     * Проверяем доступ на удаление новости.
     *
     * @param User $user
     * @param News $news
     * @return bool
     */
    public function delete(User $user, News $news)
    {
        return $user->id === $news->user_id;
    }
}
