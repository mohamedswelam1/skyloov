<?php

namespace App\Services;

use App\Repositories\TaskRepository;

class TaskService
{
    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function getTasks(array $filters )
    {
        return $this->taskRepository->filterTasks($filters);
    }

    public function createTask(array $data)
    {
        return $this->taskRepository->create($data);
    }

    public function updateTask(array $data)
    {
        return $this->taskRepository->update( $data);
    }

    public function deleteTask(array $filters)
    {
        return $this->taskRepository->delete($filters);
    }
}
