<?php

namespace App\Http\Requests\Task;

use App\Enums\TaskStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTaskRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'nullable|max:255',
            'description' => 'nullable|string',
            'status' => [
                'required',
                Rule::in(TaskStatus::values()),
            ],
            'due_date' => 'nullable|date|after:today',
        ];
    }
}
