@extends('layout')

@section('content')
<div class="wrapper w-50 shadow m-auto p-4 mt-5"> 
    <h1>Modifier un Examen</h1>
    <form action="{{ route('exams.update',$exam->id) }}" method="POST" class="mt-4">
        @csrf
        @method("PUT")
        <div class="form-group mb-3">
            <input type="text" name="titre" value="{{ $exam->titre }}" class="form-control">
            @error('titre')
              <div class="text-danger">{{$message  }}</div> 
            @enderror
        </div>
         
        <div class="form-group mb-3">
            <input type="datetime-local" name="date"  value="{{ $exam->date }}"  class="form-control">
            @error('date')
              <div class="text-danger">{{$message  }}</div> 
            @enderror
        </div> 
        <div class="form-group mb-3">
           <select name="course_id" class="form-control">
            @foreach ($courses as $course)
                <option value="{{ $course->id}}"
                    @if ($course->id == $exam->course_id)
                    selected
                 @endif
                    >{{ $course->name }}</option>
            @endforeach
           </select>
            @error("course_id")
              <div class="text-danger">{{$message  }}</div> 
            @enderror
        </div>
         
        <button type="submit" class="btn btn-success">Modifier</button>
        <a href="{{ route('exams.index') }}" class="btn btn-info">Annuler</a>
    </form>
</div>
@endsection