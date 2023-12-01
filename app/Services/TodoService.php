<?php
namespace App\Services;

use App\Models\Todo;

class TodoService
{
    public function allTodo()
    {
        $todo=Todo::get();
        return $todo;

    }
  
    public function createTodo ($request)
    {
        $todo=Todo::create([
            'title'=>$request->title,
            'description'=>$request->description,
    
        ]);
       
        return $todo;
    }

    public function updateTodo ($request)
    {
        $todo=Todo::find($request->id);
        $todo->update([
            'title'=>$request->title,
            'description'=>$request->description,
    
        ]);
       
        return $todo;
    }
   
}

