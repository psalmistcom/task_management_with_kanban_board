<?php

namespace App\Http\Requests;

use App\Enum\PriorityEnum;
use App\Enum\StatusEnum;
use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => ['required', 'max:255'],
            "description" => ['nullable', 'string'],
            "due_date" => ['nullable', 'date'],
            'project_id' => ['required', 'exists:projects,id'],
            'assigned_user_id' => ['required', 'exists:users,id'],
            "status" => 'required|in:'
                . StatusEnum::COMPLETED->value . ','
                . StatusEnum::IN_PROGRESS->value . ','
                . StatusEnum::PENDING->value,
            "priority" => 'required|in:'
                . PriorityEnum::HIGH->value . ','
                . PriorityEnum::MEDIUM->value . ','
                . PriorityEnum::LOW->value,
        ];
    }
}
