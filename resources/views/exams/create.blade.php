@extends('layout')

@section('content')
<div class="wrapper w-50 shadow m-auto p-4 mt-5"> 
    <div class="card bg-secondary">
      <h3 class="card-header text-center">Ajouter un Examen</div>
    <form action="{{ route('exams.store') }}" method="POST" class="mt-4">
        @csrf
        <div class="form-group mb-3">
            <input type="text" name="titre" placeholder="titre de l'examen" class="form-control">
            @error('titre')
              <div class="text-danger">{{$message  }}</div> 
            @enderror
        </div>
         
        <div class="form-group mb-3">
            <input type="datetime-local" name="date" placeholder="date de composition de l'exmen" class="form-control">
            @error('date')
              <div class="text-danger">{{$message  }}</div> 
            @enderror
        </div> 
        <div class="form-group mb-3">
           <select name="course_id" class="form-control">
            <option value="">--cours</option>
            @foreach ($courses as $course)
                <option value="{{ $course->id}}">{{ $course->name }}</option>
            @endforeach
           </select>
            @error("course_id")
              <div class="text-danger">{{$message  }}</div> 
            @enderror
        </div>
         
        <button type="submit" class="btn btn-success">Ajouter</button>
        <a href="{{ route('exams.index') }}" class="btn btn-warning">Annuler</a>
    </form>
</div>
@endsection