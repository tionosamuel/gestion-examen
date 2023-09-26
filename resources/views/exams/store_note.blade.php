@extends('layout')
@section('content')
<div class="wrapper w-50 shadow m-auto p-4 mt-5">
<h1>Enregistrer une note</h1>
  <form action="{{route('exams.results.store')}}" method="POST" class="mt-4">
    @csrf
    <div class="form-group mb-3">
        <select name="student_id" class="form-control">
            <option value="">--Etudiant--</option>
            @foreach ($students as $student)
                <option value="{{ $student->id }}">{{ $student->nom.' '.$student->prenom }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group mb-3">
        <select name="examen_id" class="form-control">
            <option value="">--Examen--</option>
            @foreach ($examens as $examen)
                <option value="{{ $examen->id }}">{{ $examen->titre}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group mb-3">
        <input type="number" name="note"placeholder=" La Note"class="form-control">
    </div>
    <Button type="submit" class="btn btn-success">Enregistrer</Button>
    <a href="{{ route('exams.index') }}" class="btn btn-info">Annuler</a>
</form>
</div>
@endsection