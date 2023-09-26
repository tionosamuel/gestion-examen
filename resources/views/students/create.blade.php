@extends('layout')

@section('content')
<div class="wrapper w-50 shadow m-auto p-4 mt-5"> 
    <div class="card bg-secondary">
      <h3 class="card-header text-center">Ajouter un Etudiant</div>
    <form action="{{ route('students.store') }}" method="POST" class="mt-4">
        @csrf
        <div class="form-group mb-3">
            <input type="text" name="nom" placeholder="Nom de l'etudiant" class="form-control">
            @error('nom')
              <div class="text-danger">{{$message  }}</div> 
            @enderror
        </div>
         
        <div class="form-group mb-3">
            <input type="text" name="prenom" placeholder="Prenom de l'etudiant" class="form-control">
            @error('prenom')
              <div class="text-danger">{{$message  }}</div> 
            @enderror
        </div>
         
        <div class="form-group mb-3">
            <input type="email" name="email" placeholder="Email de l'etudiant" class="form-control">
            @error('email')
              <div class="text-danger">{{$message  }}</div> 
            @enderror
        </div>
        <div class="form-group mb-3">
            <input type="text" name="mobile" placeholder="Téléphone de l'etudiant" class="form-control">
            @error('mobile')
              <div class="text-danger">{{$message  }}</div> 
            @enderror
        </div>
        <div class="form-group mb-3">
           <select name="filiere_id" class="form-control">
            <option value="">--filière</option>
            @foreach ($filieres as $filiere)
                <option value="{{ $filiere->id }}">{{ $filiere->name }}</option>
            @endforeach
           </select>
            @error('filiere_id')
              <div class="text-danger">{{$message  }}</div> 
            @enderror
        </div>
         
        <button type="submit" class="btn btn-success">Ajouter</button>
        <a href="{{ route('students.index') }}" class="btn btn-warning">Annuler</a>
    </form>
</div>
@endsection