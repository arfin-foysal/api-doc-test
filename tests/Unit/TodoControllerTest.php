<?php

namespace Tests\Unit;

use App\Models\Todo;
use App\Services\TodoService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase;

class TodoControllerTest extends TestCase
{
use RefreshDatabase;
//    public function testAllTodo()
//    {
//        Todo::factory()->count(3)->create(); // Create 3 sample Todo records in the database.
//        // Arrange
//        $todoService = new TodoService();
//
//
//        // Act
//        $todos = $todoService->allTodo();
//
//
//        // Assert
//        $this->assertCount(3, $todos); // Ensure that the returned collection has 3 items.
//    }
//
//    public function test_create_todo ()
//    {
//
//          // Arrange
//          $todoService = new TodoService();
//          $requestData = [
//              'title' => 'Sample Title',
//              'description' => 'Sample Description',
//          ];
//          $request = new Request($requestData);
//
//          // Act
//          $todo = $todoService->createTodo($request);
//
//          // Assert
//          $this->assertDatabaseHas('todos', $requestData); // Ensure that the database contains the expected data.
//          $this->assertInstanceOf(Todo::class, $todo); // Ensure that the method returns a Todo model instance.
//      }
//
//      public function testUpdateTodo()
//      {
//          // Arrange
//          $todoService = new TodoService();
//          $todo = Todo::factory()->create();
//          $requestData = [
//              'id' => $todo->id,
//              'title' => 'Updated Title',
//              'description' => 'Updated Description',
//          ];
//          $request = new Request($requestData);
//
//          // Act
//          $updatedTodo = $todoService->updateTodo($request);
//
//          // Assert
//          $this->assertDatabaseHas('todos', $requestData); // Ensure that the database contains the expected updated data.
//          $this->assertEquals('Updated Title', $updatedTodo->title); // Ensure that the updated title matches the expected value.
//          $this->assertEquals('Updated Description', $updatedTodo->description); // Ensure that the updated description matches the expected value.
//      }



}
