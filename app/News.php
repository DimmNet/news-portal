<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body', 'image',
    ];

    /**
     * Получить создателя новости.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Получить комментарии к новости.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Фильтрация записей по месяцу и году.
     *
     * @param $query
     * @param $filters
     * @return mixed
     */
    public function scopeFilter($query, $filters)
    {
        if ($filters['month']) {
            $query->whereMonth('created_at', Carbon::parse($filters['month'])->month);
        }

        if ($filters['year']) {
            $query->whereYear('created_at', $filters['year']);
        }

        return $query;
    }

    /**
     * Архив новостей, для вывода в layouts/sidebar.blade.php
     *
     * @return array
     */
    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }

    /**
     * Обрезает текст из body до 40 слов.
     *
     * @return string
     */
    public function getShortBodyAttribute()
    {
        $string = strip_tags($this->body);
        return Str::words($string, 40);
    }

    /**
     * Заменяет пробелы на нижнее подчеркивание в заголовке.
     *
     * @return string
     */
    public function getClearTitleAttribute()
    {
        return str_replace(' ', '_', $this->title);
    }
}
