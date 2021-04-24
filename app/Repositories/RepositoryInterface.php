<?php
namespace App\Repositories;

interface RepositoryInterface {
    public function all($columns = array('*'));
    public function find($id, $columns = array('*'));
    public function create(array $attributes);
    public function update($id, array $attributes);
    public function destroy($ids);
}
