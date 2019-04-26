<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Services\Twitter;
use Mail;
use App\Mail\ProjectCreated;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }    

    public function index()
    {
        // $projects = Project::where('owner_id', auth()->id())->get();        

        return view('projects.index', [
            'projects' => auth()->user()->projects
        ]);
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:3'
        ]);

        $attributes['owner_id'] = auth()->id();

        $project =  Project::create($attributes);

        Mail::to($project->owner->email)->send(
            new ProjectCreated($project)
        );

        return redirect('/projects');
    }

    public function show(Project $project)
    {        
        // abort_unless(auth()->user()->owns($project), 403);

        // abort_if($project->owner_id !== auth()->id(), 403);

        // $this->authorize('update', $project);

        abort_unless(\Gate::allows('update', $project), 403);

        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {        
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {        
        $attributes = request()->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:3'
        ]);

        $project->update(request([
            'title',
            'description'
        ]));

        return redirect('/projects');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect('/projects');
    }

    protected function validateProject()
    {
        return request()->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:3'
        ]);
    }
}
