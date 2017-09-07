<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsForm;
use App\News;

class NewsController extends Controller
{
    /**
     * NewsController constructor - ограничиваем доступ для неавторизованных пользователей.
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Список новостей для главной страницы.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $news = News::latest()->paginate();

        return view('news.index', compact('news'));
    }

    /**
     * Отображение новости по её ID.
     *
     * @param News $news
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    /**
     * Отображение формы создания новости.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Сохраняем новость.
     *
     * @param NewsForm $form
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(NewsForm $form)
    {
        $news = auth()->user()->news()->save(
            new News(request()->all())
        );

        session()->flash('message', 'Ваша новость опубликована!');

        return redirect('/news/'.$news->id.'/'.str_replace(' ', '_', $news->title));
    }
}
