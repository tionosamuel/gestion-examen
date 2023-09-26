@extends('layout')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto mt-5">
        {{-- <h1 class="mb-3"></h1> --}}
        <a href="{{ route('courses.create') }}" class="btn btn-success mb-3">Ajouter</a>
        <div class="card bg-secondary">
            <h3 class="card-header text-center">Liste des cours</div>
        <table class="table table-striped shadow">
            @if (session()->has('success'))
            <div class="alert alert-success text-center my-2">
                {{ session()->get('success') }}
            </div>
                
            @endif
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Descriptions</th>
                <th>Actions</th>
            </tr>
            @foreach ($courses as $course )
                <tr>
                    <td>{{$course->id }}</td>
                    <td>{{$course->name }}</td>
                    <td>{{ $course->description }}</td>
                    <td class="d-flex justify-content-start">
                         <a href="{{ route('courses.edit',$course->id) }}"class="btn btn-info">Modifier</a>
                         <form action="{{ route('courses.destroy', $course->id)}}" method="POST" >
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