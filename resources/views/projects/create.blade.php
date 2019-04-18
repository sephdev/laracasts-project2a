@extends('layout')

@section('content')    
    <h1 class="title">Create a New Project</h1>

    <form method="POST" action="/projects">
        @csrf
        <div>
            <input type="text" class="input" name="title" placeholder="Project Title">
        </div>
        <div>
            <textarea name="description" class="textarea"></textarea>
        </div>
        <div>
            <button type="submit" class="button">Create Project</button>
        </div>
    </form>
@endsection
