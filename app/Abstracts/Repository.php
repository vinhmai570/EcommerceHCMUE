<?php
namespace App\Abstracts;

use App\Repositories\RepositoryInterface;

abstract class Repository implements RepositoryInterface
{
    protected $modelClassName;

    public function create(array $attributes)
	{
		return call_user_func_array("{$this->modelClassName}::create", array($attributes));
	}

	public function all($columns = array('*'))
	{
		return call_user_func_array("{$this->modelClassName}::all", array($columns));
	}

	public function find($id, $columns = array('*'))
	{
		return call_user_func_array("{$this->modelClassName}::find", array($id, $columns));
	}

    public function update($id, array $attributes)
	{
		return call_user_func_array("{$this->modelClassName}::update", array($id, $attributes));
	}

	public function destroy($ids)
	{
		return call_user_func_array("{$this->modelClassName}::destroy", array($ids));
	}
}
