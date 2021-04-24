<?php
namespace App\Abstracts;

use App\Repositories\RepositoryInterface;

abstract class Repository implements RepositoryInterface
{
    protected $model_class_name;

    public function create(array $attributes)
	{
		return call_user_func_array("{$this->model_class_name}::create", array($attributes));
	}

	public function all($columns = array('*'))
	{
		return call_user_func_array("{$this->model_class_name}::all", array($columns));
	}

	public function find($id, $columns = array('*'))
	{
		return call_user_func_array("{$this->model_class_name}::find", array($id, $columns));
	}

    public function update($id, array $attributes)
	{
		return call_user_func_array("{$this->model_class_name}::update", array($id, $attributes));
	}

	public function destroy($ids)
	{
		return call_user_func_array("{$this->model_class_name}::destroy", array($ids));
	}
}
