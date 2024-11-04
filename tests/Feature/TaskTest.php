<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_a_task()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post(route('tasks.store'), [
                'name' => 'Test Task',
                'description' => 'This is a test task.',
            ])
            ->assertStatus(302)
            ->assertSessionHas('success', 'Task created successfully!');
        
        $this->assertDatabaseHas('tasks', [
            'name' => 'Test Task',
            'description' => 'This is a test task.',
        ]);
    }

    public function test_user_can_view_task()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create(['name' => 'View Task']);

        $this->actingAs($user)
            ->get(route('tasks.index'))
            ->assertStatus(200)
            ->assertSee('View Task');
    }

    public function test_user_can_update_task()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create(['name' => 'Old Task Name']);

        $this->actingAs($user)
            ->patch(route('tasks.update', $task), [
                'name' => 'Updated Task',
                'description' => 'This is an updated task.',
            ])
            ->assertStatus(302)
            ->assertSessionHas('success', 'Task updated successfully!');

        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
            'name' => 'Updated Task',
            'description' => 'This is an updated task.',
        ]);
    }

    public function test_user_can_delete_task()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create(['name' => 'Task to be deleted']);

        $this->actingAs($user)
            ->delete(route('tasks.destroy', $task))
            ->assertStatus(302)
            ->assertSessionHas('success', 'Task deleted successfully!');

        $this->assertDatabaseMissing('tasks', [
            'id' => $task->id,
        ]);
    }
}
