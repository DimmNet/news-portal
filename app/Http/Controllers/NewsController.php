<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsForm;
use App\News;
use App\Notifications\News\DeletedNotification;
use App\Notifications\News\EditedNotification;

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
        $news = News::latest()->filter(request(['month', 'year']))->paginate();

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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(NewsForm $form)
    {
        $news = auth()->user()->news()->save(
            new News(request()->all())
        );

        session()->flash('message', 'Ваша новость опубликована!');

        return redirect()->route('news.show', [$news->id, $news->clearTitle]);
    }

    /**
     * Отображение формы редактирования новости.
     *
     * @param News $news
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    /**
     * Обновляем новость.
     *
     * @param News $news
     * @param NewsForm $form
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(News $news, NewsForm $form)
    {
        $news->update(request()->all());

        $news->user->notify(new EditedNotification($news));

        session()->flash('message', 'Ваша новость изменена!');

        return redirect()->route('news.show', [$news->id, $news->clearTitle]);
    }

    /**
     * Удаление новости
     *
     * @param News $news
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(News $news)
    {
        $news->user->notify(new DeletedNotification($news));

        $news->delete();

        session()->flash('message', 'Ваша новость удалена!');

        return redirect()->home();
    }
}
