<?php

namespace Jingeryu;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';//默认是模型名的复数形式
    protected $fillable = ['id','content','abstract','title'];//可写入的字段


    /**
     * 多篇文章只有一个作者
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
