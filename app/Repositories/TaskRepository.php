<?php

namespace App\Repositories;

use App\Models\Task;

class TaskRepository
{
    public function filterTasks(array $filters , $perPage =15)
    {
        $query = Task::query();
    

        if (!empty($filters['per_page'])) {
            $perPage = $filters['per_page'];
        }

        if (!empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }
        if (!empty($filters['title'])) {
            $query->where('title', 'like', '%' . $filters['title'] . '%');
        }    

        if (!empty($filters['due_date'])) {
            $query->whereDate('due_date', $filters['due_date']);
        }
        $page = isset($filters['page']) ? (int) $filters['page'] : 1;

        return $query->orderBy('due_date')->paginate($perPage, ['*'], 'page', $page);

    }

    public function create(array $data)
    {
        return Task::create($data);
    }

    public function update( array $data)
    {
        $query = Task::query();

        if (!empty($data['id'])) {
            $task = $query->findOrFail($data['id']);
            $task->update($data) ;
            return $task ;
        } 

    }

    public function delete($data)
    {
        $query = Task::query();

        if (!empty($data['id'])) {
            $task = $query->findOrFail($data['id']);
            $task->delete();
        } 

        return true;
    }
}
