@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Tecnologies List') }}
        <a href="{{ route('admin.technologies.create') }}" class="btn btn-sm btn-success">Create New Tecnology</a>
    </h2>
    
    @include('partials.message')

    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tec Name</th>
                <th scope="col">Slug</th>
                <th scope="col">Action</th>
              </tr>
        </thead>
        <tbody>
          @foreach ($technologies as $technology)
              <tr>
                <td>{{$technology->id}}</td>
                <td>{{$technology->name}}</td>
                <td>{{$technology->slug}}</td>
                <td class="d-flex gap-2">
                    <a href="{{ route('admin.technologies.show', $technology) }}" class="btn btn-sm btn-primary">Show</a>
                    <a href="{{ route('admin.technologies.edit', $technology) }}" class="btn btn-sm btn-warning">Edit</a>
                    <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#post-{{ $technology->id }}">Delete</a>
                </td>
              </tr>
              <div class="modal fade" id="post-{{ $technology->id }}" tabindex="-1"  aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Attention</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Do you really want to delete this tec?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                      <form action="{{ route('admin.technologies.destroy', $technology)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                      </form>
                    </div>
                  </div>
                </div>
              </div>
          @endforeach
        </tbody>
      </table>
</div>
@endsection