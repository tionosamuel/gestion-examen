@extends('layout')

@section('content')
   <div class="row">
    <div class="col-md-8 mx-auto mt-5">
        <a href="{{ route('filiere.create') }}" class="btn btn-success mb-3">Ajouter</a>
        <div class="card bg-secondary">
            <h3 class="card-header text-center">Liste des filières</div>
        <table class="table table-striped shadow">
            @if (session()->has('success'))
            <div class="alert alert-success text-center my-2">
                {{ session()->get('success') }}
            </div>
                
            @endif
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
            @foreach ($filieres as $filiere )
                <tr>
                    <td>{{$filiere->id }}</td>
                    <td>{{$filiere->name }}</td>
                    <td class="d-flex justify-content-start">
                        <a href="{{ route('filiere.edit',$filiere->id) }}"class="btn btn-info">Modifier</a>
                        <form action="{{ route('filieres.destroy', $filiere->id)}}" method="POST" >
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