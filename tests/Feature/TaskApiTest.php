<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_filter_tasks_by_query_parameters()
    {
        Task::factory()->create(['title' => 'Task 1', 'status' => 'pending']);
        Task::factory()->create(['title' => 'Task 2', 'status' => 'completed']);

        $response = $this->getJson('/api/tasks?status=pending');

        $response->assertStatus(200)
                 ->assertJsonFragment(['title' => 'Task 1'])
                 ->assertJsonMissing(['title' => 'Task 2']);
    }

    /** @test */
    public function it_can_update_a_task()
    {
        $task = Task::factory()->create(['title' => 'Original Title']);
    
        $response = $this->put('/api/tasks?id=' . $task->id . '&title=Updated+Title');

    
        $response->assertStatus(200)
                 ->assertJsonFragment(['title' => 'Updated Title']);
    
        $this->assertDatabaseHas('tasks', ['id' => $task->id, 'title' => 'Updated Title']);
    }
    
    
    

    /** @test */
    public function it_can_delete_a_task()
    {
        $task = Task::factory()->create();

        $response = $this->deleteJson('/api/tasks?id=' . $task->id);

        $response->assertStatus(200);
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }

}

