@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Edit Tecnology') }}
        <a href="{{ route('admin.technologies.index') }}" class="btn btn-sm btn-success">Home Tecnologies</a>
    </h2>
    
    @include('partials.errors')

    <form action="{{ route('admin.technologies.update', $technology)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Tecnology Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name',$technology->name) }}">
        </div>
       
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
       </form>
</div>
@endsection
