<?php

namespace App\Repositories\Eloquent\Admin;


use App\Models\Article;
use App\Repositories\Eloquent\Repository;
use Storage;

class ArticleRepository extends Repository
{

    public function model()
    {
        return Article::class;
    }

    /**
     *  获取文章列表
     * @return mixed
     * @author wuliang
     */
    public function getArticleList ()
    {
        return $this->model->with('category')->where('status', 1)
            ->get(['id', 'cate_id', 'title', 'created_at', 'updated_at'])->toArray();
    }

    /**
     * 添加文章
     * @param $request
     *
     * @return boolean
     * @author wuliang
     */
    public function createArticle ($request)
    {
        $article = new Article();
        $data = $request->all();
        // 如果上传了封面图片,先处理图片上传
        if ($request->hasFile('cover'))
        {
            $imagePath = $this->uploadImages($request->file('cover'));
            if (!$imagePath) {
                return false;
            }
            $data['img_path'] = $imagePath;
        }
        $data['content_html'] = $data['editor-html-code'];
        $data['content_mark'] = $data['editor-markdown-doc'];

        if ($article->fill($data)->save())
        {
            if ($data['label'])
            {
                $article->belongsToManyTag()->sync($data['label']);
            }
            return true;
        }
        return false;
    }

    /**
     * 上传图片处理
     * @param $image
     *
     * @return string
     * @author wuliang
     */
    public function uploadImages ($image)
    {
        $extension = $image->getClientOriginalExtension();
        $realPath  = $image->getRealPath();
        $fileName  = date('Y-m-d').uniqid('-').'.'.$extension;

        $result = Storage::disk('upload')->put($fileName, file_get_contents($realPath));
        if (!$result) {
            return '';
        }

        return $fileName;
    }

    /**
     * 编辑器中图片上传
     * @param $request
     *
     * @return string
     * @author wuliang
     */
    public function upload ($request)
    {
        if ($request->hasFile('editormd-image-file')) {
            $path = $this->uploadImages($request->file('editormd-image-file'));
            $path = $path ? asset('/uploads').'/'.$path : '';
        }

        return $path;
    }
}
