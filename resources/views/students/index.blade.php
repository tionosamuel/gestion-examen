@extends('layout')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto mt-5">
        <h1 class="mb-3"></h1>
        <a href="{{ route('students.create') }}" class="btn btn-success mb-3">Ajouter</a>
        <div class="card bg-secondary">
            <h3 class="card-header text-center">Liste des Etudiants</div>
        <table class="table table-striped shadow">
            @if (session()->has('success'))
            <div class="alert alert-success text-center my-2">
                {{ session()->get('success') }}
            </div>
                
            @endif
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Telephone</th>
                <th>Filière</th>
                <th>Action</th>
            </tr>
            @foreach ($students as $student )
                <tr>
                    <td>{{$student->id }}</td>
                    <td>{{$student->nom }}</td>
                    <td>{{ $student->prenom }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->mobile }}</td>
                    <td>{{ $student->filiere->name }}</td>
                    <td class="d-flex justify-content-start">
                          <a href="{{ route('students.edit',$student->id) }}"class="btn btn-info">Modifier</a>
                          <form action="{{ route('students.destroy', $student->id)}}" method="POST" >
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