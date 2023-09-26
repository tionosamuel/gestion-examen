@extends('layout')

@section('content')
<div class="wrapper w-50 shadow m-auto p-4 mt-5">
    <h1>Modifier la filière</h1>
    <form action="{{ route('filiere.update', $filiere->id) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <input type="text" name="name" value="{{ $filiere->name }}" class="form-control">
            @error('name')
              <div class="text-danger">{{$message  }}</div> 
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Modifier</button>
        <a href="{{ route('filiere.index') }}" class="btn btn-info">Annuler</a>
    </form>
</div>
@endsection