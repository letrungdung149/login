<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class TodoList extends Model
{
    use HasFactory;
    public $table = "todo";

    protected $fillable = [
        'name',
        'description',
        'user_id'
    ];

    public function checkTodo(){
        $this->status = $this->status ? false : true;
        $this->save();
    }
    public function scopeSearch($query){
        if ($key = request()->check){
            $query = $query->where('status','like','%'.$key.'%');
        }
        return $query;
    }
    public function scopeChange($query){
        if ($key = request()->change){
            $query = $query->where('name','like','%'.$key.'%');
        }
        return $query;
    }
}
