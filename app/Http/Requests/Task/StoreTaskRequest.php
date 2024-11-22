<?php

namespace App\Http\Requests\Task;

use App\Enums\TaskStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTaskRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'description' => 'nullable|string',
            'status' => [
                'required',
                Rule::in(TaskStatus::values()),
            ],
            'due_date' => 'required|date|after:today',
        ];
    }
}
