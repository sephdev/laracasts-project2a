@extends('layout')

@section('content')
    <h1 class="title">Projects</h1>

    <a href="/projects/create">Create New Project</a>
    <br><br>    

    @foreach ($projects as $project)
        <li>
            <a href="/projects/{{ $project->id }}">{{ $project->title }}</a>
        </li>
    @endforeach

@endsection

