<?php

namespace App\Http\Controllers\Api;

use App\Models\TodoList;
use App\Models\User;
use App\Repositories\TodoRepositoryInterface;
use Illuminate\Http\Request;

class TodoListController
{
    protected $todoRepository;

    public function __construct(TodoRepositoryInterface $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    /**
     * @OA\Get(
     *     path="/api/todo-list",
     *     tags={"todo-list"},
     *     summary="Get all todo-list for REST API",
     *     description="Multiple status values can be provided with comma separated string",
     *     operationId="index",
     *     @OA\Parameter(
     *         name="perPage",
     *         in="query",
     *         description="Per page count",
     *         required=false,
     *         explode=true,
     *         @OA\Schema(
     *             default="10",
     *             type="integer",
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid status value"
     *     )
     * )
     */
    public function index(Request $request)
    {
        $todoLists = $request->user()->todoLists;
        return response()->json([
            'code' => 200,
            'data' => $todoLists,
            'message' => 'success'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * @OA\Post(
     *     path="/api/todo-list",
     *     tags={"todo-list"},
     *     summary="test",
     *     description="Multiple status values can be provided with comma separated string",
     *     operationId="store",
     *     @OA\Parameter(
     *         name="perPage",
     *         in="query",
     *         description="Per page count",
     *         required=false,
     *         explode=true,
     *         @OA\Schema(
     *             default="10",
     *             type="integer",
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid status value"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $todoLists = $request->user();
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $this->todoRepository->store($request->only([
            'name',
            'description',
            'user_id' => $todoLists->id,
        ]));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(TodoList $todoList,Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $this->todoRepository->updated($todoList, $request->only([
            'name',
            'description',
        ]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(TodoList $todoList)
    {
        $this->todoRepository->destroy($todoList);
    }

    public function markTodoCompleted($id, Request $request){
        $todoList = TodoList::findOrFail($id);
        if ($todoList->user_id === $request->user()->id){
            $todoList->checkTodo();
            if ($todoList->status === true){
                return \response()->json([
                    'notification' => 'check todo success'
                ]);
            }else{
                return \response()->json([
                    'notification' => 'success'
                ]);
            }
        }
    }

    public function filter(){
        $todoList = TodoList::latest()->search()->paginate();
        return response()->json([
            'code' => 200,
            'todoList' => $todoList,
            'message' => 'success'
        ]);
    }

    public function change(){
        $todoList = TodoList::latest()->change()->paginate();
        return response()->json([
            'code' => 200,
            'todoList' => $todoList,
            'message' => 'success'
        ]);
    }
}
