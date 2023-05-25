@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Tehnology') }}
        <a href="{{ route('admin.technologies.index') }}" class="btn btn-sm btn-success">Technologies Home</a>
    </h2>
    
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">Tech Name:{{ $technology->name}}</h5>
        <p class="card-text">Slug: {{ $technology->slug}}</p>
      </div>
      <div class="card-footer">
        <ul>
        @foreach ($technology->projects as $project)
            <li>{{$project->project_name}}<a href="{{ route('admin.projects.edit', $project) }}" class="badge text-bg-warning">Edit Project</a></li> 
        @endforeach
        </ul>
      </div>
    </div>
    <a href="{{ route('admin.technologies.edit', $technology) }}" class="btn btn-sm btn-warning">Edit Tech</a>
    
</div>
@endsection