<?php 
namespace App\Transform;

abstract class Transform 
{
	/**
	 * 数据映射
	 * @date   2016-09-24
	 * @author Wally
	 * @param  [type]     $items [description]
	 * @return [type]           [description]
	 */
	public function transformCollection ($items)
	{
	    return array_map([$this, 'transform'], $items);
	}

	/**
	 * 抽象方法，具体实现字段的映射关系
	 * @date   2016-09-24
	 * @author Wally
	 * @param  [type]     $item [description]
	 * @return [type]           [description]
	 */
	public abstract function transform($item);
}