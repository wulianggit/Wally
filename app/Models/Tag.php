<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Tag
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Article[] $belongsToManyArticle
 * @mixin \Eloquent
 */
class Tag extends Model
{
    protected $table = 'tags';
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
