<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    protected $table = 'labels';
    protected $fillable = ['name'];

    /**
     * 文章和标签多对多关系
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     * @author wuliang
     */
    public function belongsToManyArticle()
    {
        return $this->belongsToMany('App\Models\Article', 'article_tag', 'tag_id', 'article_id')->withTimestamps();
    }
}
