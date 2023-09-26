@extends('layout')

@section('content')
<div class="wrapper w-50 shadow m-auto p-4 mt-5"> 
    <div class="card bg-secondary">
      <h3 class="card-header text-center">Ajouter un Cours</div>
    <form action="{{ route('courses.store') }}" method="POST" class="mt-4">
        @csrf
        <div class="form-group mb-3">
            <input type="text" name="name" placeholder="Nom de cours" class="form-control">
            @error('name')
              <div class="text-danger">{{$message  }}</div> 
            @enderror
        </div>
        <div class="form-group mb-3">
         <textarea name="description" placeholder="Description du cours" class="form-control"></textarea>

         @error('description')
         <div class="text-danger">{{$message  }}</div> 
       @enderror
        </div> 
        <button type="submit" class="btn btn-success">Ajouter</button>
        <a href="{{ route('courses.index') }}" class="btn btn-warning">Annuler</a>
    </form>
</div>
@endsection