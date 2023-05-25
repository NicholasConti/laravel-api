@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('New Tec') }}
    </h2>

    @include('partials.errors')
    
   <form action="{{ route('admin.technologies.store')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="tec_name" class="form-label">Tec Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="tec_name" name="name" value="{{ old('name') }}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
   </form>
</div>
@endsection
