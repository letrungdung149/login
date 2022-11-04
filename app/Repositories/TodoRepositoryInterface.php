<?php

namespace App\Repositories;

use App\Models\TodoList;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\Request;

interface TodoRepositoryInterface extends BaseRepositoryInterface
{
    public function store(array $data);

    public function updated(TodoList $todoList, array $data);

    public function destroy(TodoList $todoList);
}
