@extends('layout')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto mt-5">
        {{-- <h1 class="mb-3"></h1> --}}
        <div class="card bg-secondary">
            <h3 class="card-header text-center">Liste des Examens</div>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ route('exams.create') }}" class="btn btn-success">Ajouter</a>
            <a href="{{ route('exams.results.create') }}" class="btn btn-warning">Ajouter les notes</a>
        </div>
        <table class="table table-striped shadow">
            @if (session()->has('success'))
            <div class="alert alert-success text-center my-2">
                {{ session()->get('success') }}
            </div>
                
            @endif
            <tr>
                <th>#</th>
                <th>Titre</th>
                <th>Date de composition</th>
                <th>Cours</th>
                <th>Actions</th>
            </tr>
            @foreach ($exams as $exam )
                <tr>
                    <td>{{$exam->id }}</td>
                    <td>{{$exam->titre }}</td>
                    <td>{{ $exam->date }}</td>
                    <td>{{ $exam->course->name }}</td>
                    <td class="d-flex justify-content-start">
                         <a href="{{ route('exams.edit',$exam->id) }}"class="btn btn-info">Modifier</a>
                         <form action="{{ route('exams.destroy', $exam->id)}}" method="POST" >
                            @csrf
                        @method('delete')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form> 
                        
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
   </div>
@endsection