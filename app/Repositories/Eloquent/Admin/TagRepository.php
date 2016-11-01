<?php

namespace App\Repositories\Eloquent\Admin;


use App\Models\Tag;
use App\Repositories\Eloquent\Repository;

class TagRepository extends Repository
{
    /**
     * 返回标签model类名称
     * @return mixed
     * @author wuliang
     */
    public function model()
    {
        return Tag::class;
    }

    /**
     * 获取啊标签列表
     * @return mixed
     * @author wuliang
     */
    public function getTagList ()
    {
        return $this->model->where('status', 1)->get(['id', 'name'])->toArray();
    }

    /**
     * 获取修改标签数据
     * @param $id
     *
     * @return array
     * @author wuliang
     */
    public function editTag ($id)
    {
        $label = $this->model->find($id, ['id', 'name']);

        if ($label)
        {
            $label['status'] = 'success';
            $label['update'] = url('admin/tag/'.$id);

            return $label;
        }

        return ['status' => 'error', 'msg' => trans('alert.loading.error')];
    }

    /**
     * 修改标签表单数据处理
     * @param $request
     *
     * @return bool
     * @author wuliang
     */
    public function updateTag ($request)
    {
        $label = $this->model->find($request->id);

        if ($label)
        {
            $result = $label->update($request->all());
            if ($result) {
                return true;
            } else {
                return false;
            }
        }

        abort(trans('alert.tag.not_exists'));
    }

    /**
     * 删除标签
     * @param $id
     *
     * @return bool
     * @author wuliang
     */
    public function destoryTag ($id)
    {
        $label = $this->model->find($id);

        if ($label)
        {
            $result = $this->model->where('id', $id)->update(['status'=>0]);
            if ($result) {
                return true;
            } else {
                return false;
            }
        }

        abort(trans('alert.tag.not_exists'));
    }
}
