<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Http\Requests\TaskStatusUpdateRequest;
use App\Http\Resources\TaskCollection;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Traits\ApiResponse;


class TaskController extends Controller
{
    use AuthorizesRequests;
    use ApiResponse;

    // GET /tasks
    public function index(Request $request)
    {
        $tasks = Task::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate($request->get('per_page', 10));

        return $this->success([
            'items' => TaskResource::collection($tasks),
            'meta'  => [
                'current_page' => $tasks->currentPage(),
                'last_page'    => $tasks->lastPage(),
                'per_page'     => $tasks->perPage(),
                'total'        => $tasks->total(),
            ]
        ], 'Tasks retrieved successfully.');
    }


    // POST /tasks
    public function store(TaskStoreRequest $request)
    {
        $task = Task::create(array_merge(
            $request->validated(),
            ['user_id' => Auth::id()]
        ));

        return $this->success(new TaskResource($task), 'Task created successfully.', 201);
    }

    // GET /tasks/{task}
    public function show(Task $task)
    {
        $this->authorize('view', $task);
        return new TaskResource($task);
    }

    // PUT /tasks/{task}
    public function update(TaskUpdateRequest $request, Task $task)
    {
        $this->authorize('update', $task);
        $task->update($request->validated());
        return new TaskResource($task);
    }

    // PATCH /tasks/{task}/status
    public function updateStatus(TaskStatusUpdateRequest $request, Task $task)
    {
        $this->authorize('update', $task);
        $task->update($request->validated());
        return new TaskResource($task);
    }

    // DELETE /tasks/{task}
    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);
        $task->delete();
        return response()->json(['message' => 'Task deleted successfully.']);
    }
}
