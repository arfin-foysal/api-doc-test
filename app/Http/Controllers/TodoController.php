<?php

namespace App\Http\Controllers;
use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use App\Services\TodoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TodoController extends Controller
{

    protected $todoService;

    public function __construct(TodoService $todoService)
    {
        $this->todoService = $todoService;
    }



    public function allTodo(): JsonResponse
    {
        $todo = $this->todoService->allTodo();
        return response()->json(['data' => $todo, 'message' => 'All Todo']);
    }

    public function singleTodo(Request $request): JsonResponse
    {
        $todo = Todo::find($request->id);
        return response()->json(['data' => $todo, 'message' => 'single todo']);
    }

    public function createTodo(TodoRequest $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
            ]);
            $todo = $this->todoService->createTodo($request);

            return response()->json(['data' => $todo, 'message' => 'Todo created successfully'], 201);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message' => 'something went wrong'], 422);
        }
    }

    public function updateTodo(TodoRequest $request): JsonResponse
    {

        try {

           $todo = $this->todoService->updateTodo ($request);

      return response()->json(['data' => $todo, 'message' => 'Todo updated successfully'], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message' => 'something went wrong'], 422);
        }



    }

    public function deleteTodo(Request $request): JsonResponse
    {
        $todo = Todo::find($request->id);
        $todo->delete();
        return response()->json(['data' => $todo, 'message' => 'Todo deleted successfully'], 200);
    }
}
