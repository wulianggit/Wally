<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $fillable = ['title', 'keyword', 'cate_id', 'introduce', 'img_path', 'content_html', 'content_mark'];

    /**
     * 文章和标签多对多关联
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     * @author wuliang
     */
    public function belongsToManyTag ()
    {
        return $this->belongsToMany('App\Models\Label', 'article_tag', 'article_id', 'tag_id')->withTimestamps();
    }

    /**
     * 文章和分类一对一关联
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     * @author wuliang
     */
    public function category ()
    {
        return $this->hasOne('App\Models\Category', 'id', 'cate_id');
    }
}
