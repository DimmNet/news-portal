<?php

namespace App\Http\Controllers;

use App\News;
use App\Comment;

class CommentsController extends Controller
{
    /**
     * Сохранение комментария
     *
     * @param News $news
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(News $news)
    {
        $this->validate(request(), [
            'comment' => 'required|min:5'
        ]);

        $news->comments()->save(
            new Comment([
                'body' => request('comment'),
                'user_id' => auth()->id()
            ])
        );

        session()->flash('message', 'Ваш комментарий опубликован!');

        return back();
    }
}
