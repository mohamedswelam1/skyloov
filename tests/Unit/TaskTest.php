<?php
namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_task()
    {
        $task = Task::factory()->create([
            'title' => 'Test Task',
            'status' => 'pending',
        ]);

        $this->assertDatabaseHas('tasks', [
            'title' => 'Test Task',
            'status' => 'pending',
        ]);
    }

    /** @test */
    public function it_can_update_a_task()
    {
        $task = Task::factory()->create();
        $task->update(['title' => 'Updated Title']);

        $this->assertEquals('Updated Title', $task->title);
    }

    /** @test */
    public function it_can_delete_a_task()
    {
        $task = Task::factory()->create();
        $task->delete();

        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }

    /** @test */
    public function it_has_correct_status_values()
    {
        $validStatuses = ['pending', 'in_progress', 'completed'];
        $task = Task::factory()->create();

        $this->assertContains($task->status, $validStatuses);
    }
}
