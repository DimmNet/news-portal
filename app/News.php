<?php

namespace App;

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
     * Обрезает текст из body до 40 слов.
     *
     * @return string
     */
    public function getShortBodyAttribute()
    {
        $string = strip_tags($this->body);
        return Str::words($string, 40);
    }
}
