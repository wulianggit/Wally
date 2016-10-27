<?php

namespace App\Repositories\Eloquent\Admin;


use App\Models\Article;
use App\Repositories\Eloquent\Repository;
use Illuminate\Support\Facades\Storage;

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
     * @return array
     * @author wuliang
     */
    public function createArticle ($request)
    {
        $article = new Article();
        $data = $request->all();
        // 如果上传了封面图片,先处理图片上传
        if ($request->hasFile('cover'))
        {
            $image = $this->uploadImages($request->file('cover'));
            if ($image['status'] != 0) {
                return ['status'=>0,'msg'=>$image['msg']];
            }
            $data['img_path'] = $image['path'];
        }
        $data['content_html'] = $data['editor-html-code'];
        $data['content_mark'] = $data['editor-markdown-doc'];

        if ($article->fill($data)->save())
        {
            if ($data['label'])
            {
                $article->belongsToManyTag()->sync($data['label']);
            }
            return ['status'=>0,'msg'=>'文章添加成功'];
        }
        return ['status'=>1,'msg'=>'文章添加失败'];
    }

    /**
     * 上传图片处理
     * @param $image
     *
     * @return array
     * @author wuliang
     */
    public function uploadImages ($image)
    {
        $extension = $image->getClientOriginalExtension();
        $realPath  = $image->getRealPath();
        $fileName  = date('Y-m-d').uniqid('-').'.'.$extension;

        $result = Storage::disk('upload')->put($fileName, file_get_contents($realPath));

        if (!$result) {
            return ['status'=>1, '上传失败'];
        }

        return ['status'=>0, 'path'=>$fileName];
    }
}
