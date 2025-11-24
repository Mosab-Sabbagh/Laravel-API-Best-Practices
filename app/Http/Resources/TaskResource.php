<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'task_id'          => $this->id,
            'task_title'       => $this->title,
            'task_description' => $this->description,
            'task_status'      => $this->status,
            'task_priority'    => $this->priority,
            'task_due_date'    => $this->due_date,
            'user_id'     => $this->user_id,
            'created_at'  => Carbon::parse($this->created_at)->format('Y-m-d'),
            // 'updated_at'  => $this->updated_at,
        ];
    }
}
