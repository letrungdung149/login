<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class TodoListController extends Controller
{
    public function index(){
        return view('todo.index');
    }
}
