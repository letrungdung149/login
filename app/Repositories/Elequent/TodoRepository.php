<?php

namespace App\Repositories\Elequent;

use App\Models\TodoList;
use App\Repositories\TodoRepositoryInterface;

class TodoRepository extends BaseRepository implements TodoRepositoryInterface
{
    public function store(array $data)
    {
        $todoCreate = TodoList::create([
            'name' => data_get($data, 'name'),
            'description' => data_get($data, 'description'),
            'user_id' => data_get($data, 'user_id'),
        ]);
        return response()->json([
            'code' => 200,
            'data' => $todoCreate,
            'message' => 'success'
        ], 200);
    }

    public function updated(TodoList $todoList, array $data)
    {
        $todoList->where('id', $todoList->id)->update([
            'name' => data_get($data, 'name'),
            'description' => data_get($data, 'description'),
        ]);
        return response()->json([
            'code' => 200,
            'message' => 'update success',
        ]);
    }

    public function destroy(TodoList $todoList){
        $todo = TodoList::findOrFail($todoList->id);

        $todo->delete();
        return \response()->json([
            'code'=> 200,
            'message' => 'success'
        ]);
    }
}
