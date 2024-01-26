<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use App\Models\Project;
use App\Models\Task;
use App\Traits\Helpers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TaskController extends Controller
{
    use Helpers;
    public function createTask()
    {

        //fetch priorities and projects details for selection in task creation form

        $priorities = Priority::get();
        $projects = Project::get();
        return view('tasks.create', compact('priorities', 'projects'));
    }

    public function viewTasks()
    {
        //fetch all task and order them using the priority level
        $tasks = Task::orderBy('priority_id', 'ASC')->get();

        // return $tasks;
        return view('tasks.view', compact('tasks'));
    }

    public function storeTask(Request $request)
    {

        // Validate incoming request
        $this->validate($request, [
            'name' => 'required|unique:tasks',
            'description' => 'nullable|string',
            'project_id' => 'required|integer|exists:projects,id',
            'priority_id' => 'required|integer|exists:priorities,id',
        ]);

        //Store validated request
        $task = new Task;
        $task->name = $request->name;
        $task->description = $request->description;
        $task->project_id = $request->project_id;
        $task->priority_id = $request->priority_id;

        $task->save();
        return redirect('task/view')->with('success', 'New Task Added successfully!');

    }

    public function editTask(int $taskId)
    {
        //fetch priorities and projects details for selection in edit form
        $priorities = Priority::get();
        $projects = Project::get();
        $task = Task::where('id', $taskId)->first();
        return view('tasks.edit', compact('priorities', 'projects', 'task'));
    }

    public function updateTask(Request $request, int $taskId)
    {
        //validate request
        $this->validate($request, [
            'name' => ['required', 'string', Rule::unique('tasks', 'name')->ignore($taskId)],
            'description' => 'nullable|string',
            'project_id' => 'required|integer|exists:projects,id',
            'priority_id' => 'required|integer|exists:priorities,id',
        ]);

        //ensure task exist
        $task = Task::find($taskId);

        //update task details
        $task->name = $request->name;
        $task->description = $request->description;
        $task->project_id = $request->project_id;
        $task->priority_id = $request->priority_id;

        $task->update();
        return redirect('task/view')->with('success', 'Task details Updated successfully!');

    }

    public function deleteTask(int $taskId)
    {
        //ensure task exist
        Task::where('id', $taskId)->delete();
        return back()->with('success', 'Record Deleted Successful');

    }
}
