@extends('layout')

@section('content')
<div class="wrapper w-50 shadow m-auto p-4 mt-5"> 
    <h1>Modifié un Cours</h1>
    <form action="{{ route('courses.update',$course->id) }}" method="POST" class="mt-4">
        @csrf
        @method("PUT")
        <div class="form-group mb-3">
            <input type="text" name="name" value="{{ $course->name }}" class="form-control">
            @error('name')
              <div class="text-danger">{{$message  }}</div> 
            @enderror
        </div>
        <div class="form-group mb-3">
         <textarea name="description"  class="form-control">
            {{ $course->description}}
         </textarea>

         @error('description')
         <div class="text-danger">{{$message  }}</div> 
       @enderror
        </div> 
        <button type="submit" class="btn btn-success">Modifier</button>
        <a href="{{ route('courses.index') }}" class="btn btn-info">Annuler</a>
    </form>
</div>
@endsection