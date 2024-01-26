<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Traits\Helpers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    use Helpers;

    public function createProject()
    {
        return view('projects.create');
    }

    public function viewProjects()
    {
        $projects = Project::with('task')->latest()->get();
        return view('projects.view', compact('projects'));
    }

    public function storeProject(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:projects',
            'description' => 'nullable|string',
        ]);

        $project = new Project;
        $project->name = $request->name;
        $project->description = $request->description;

        $project->save();
        return redirect('project/view')->with('success', 'New project Added successfully!');

    }

    public function editProject(int $projectId)
    {
        $project = Project::where('id', $projectId)->first();

        return view('projects.edit', compact('project'));
    }

    public function updateProject(Request $request, $projectId)
    {
        $this->validate($request, [
            'name' => ['required', 'string', Rule::unique('projects', 'name')->ignore($projectId)],
            'description' => 'nullable|string',
        ]);

        $project = Project::find($projectId);
        $project->name = $request->name;
        $project->description = $request->description;

        $project->update();
        return redirect('project/view')->with('success', 'Project details Updated successfully!');

    }

    public function fetchProjectTasks(int $projectId)
    {
        $tasks = Task::where('project_id', $projectId)->orderBy('priority_id', 'DESC')->with('project')->latest()->get();
        return view('projects.project_tasks', compact('tasks'));
    }

    public function deleteProject(int $projectId)
    {
        Project::where('id', $projectId)->delete();
        return back()->with('success', 'Record Deleted Successful');

    }
}
