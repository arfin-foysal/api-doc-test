<?php

namespace Tests\Feature;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_all_todo(): void
    {   $user = User::factory()->create();
        $todo =Todo::factory()->create();


        $response = $this->actingAs($user)->getJson('/api/all-todo');
        $response->assertStatus(200);
        $response->assertJson([
            'data' => [
                [
                    'id' => $todo->id,
                    'title' => $todo->title,
                    'description' => $todo->description,
                ],
            ],
        ]);

    }

    public function test_single_todo():void
    {
        $user = User::factory()->create();
        $todo =Todo::factory()->create();
        $response = $this->actingAs($user)->getJson('/api/todo/'.$todo->id);
        $response->assertStatus(200);
        $response->assertJson([
            'data' => [
                'id' => $todo->id,
                'title' => $todo->title,
                'description' => $todo->description,
            ],
            'message' => 'single todo',
        ]);

    }
public function test_create_todo ():void
{
    $user = User::factory()->create();
    $todo =Todo::factory()->make();

    $response = $this->actingAs($user)->postJson('/api/create-todo',[
        'title' => $todo->title,
        'description' => $todo->description,
    ]);
    $response->assertStatus(201);
    $response->assertJson([
        'data' => [
            'id' => 1,
            'title' => $todo->title,
            'description' => $todo->description,
        ],
        'message' => 'Todo created successfully',
    ]);
}

public function test_create_todo_validation_error():void
{
    $user = User::factory()->create();
    $response =$this->actingAs($user)->postJson('/api/create-todo',[]);
    $response->assertStatus(422);

}



public function test_delete_todo():void
{
    $user = User::factory()->create();
    $todo =Todo::factory()->create();
    $response =$this->actingAs($user)->deleteJson('/api/delete-todo/'.$todo->id);
    $response->assertStatus(200);
    $response->assertSeeText($todo->title);
    $response->assertJson([
        'data' => [
            'id' => $todo->id,
            'title' => $todo->title,
            'description' => $todo->description,
        ],
        'message' => 'Todo deleted successfully',
    ]);
}



}
