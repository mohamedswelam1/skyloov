<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Services\TaskService;
use App\Traits\ApiResponse;
use App\Http\Resources\Task\TaskResource;
use Illuminate\Support\Facades\Request;

class TaskController extends Controller
{
    use ApiResponse;

    private $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index(Request $request)
    {
        $tasks = $this->taskService->getTasks(Request::query() );
        return $this->successResponseWithPagination(TaskResource::collection($tasks), __('messages.tasks.retrieved'));
    }

    public function store(StoreTaskRequest $request)
    {
        $task = $this->taskService->createTask($request->validated());
        return $this->successResponse(new TaskResource($task), __('messages.tasks.created'), 201);
    }

    public function update(Request $request)
    {
        $task = $this->taskService->updateTask(Request::query());
        return $this->successResponse(new TaskResource($task), __('messages.tasks.updated'));
    }

    public function destroy(Request $request)
    {
    
        $this->taskService->deleteTask(Request::query());
        return $this->successResponse(null, __('messages.tasks.deleted'), 200);
    }
}
