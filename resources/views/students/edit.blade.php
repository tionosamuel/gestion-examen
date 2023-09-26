@extends('layout')

@section('content')
<div class="wrapper w-50 shadow m-auto p-4 mt-5"> 
    <h1>Modifié un Etudiant</h1>
    <form action="{{ route('students.update',$student->id) }}" method="POST" class="mt-4">
        @csrf
        @method("PUT")
        <div class="form-group mb-3">
            <input type="text" name="nom" value="{{ $student->nom }}" class="form-control">
            @error('nom')
              <div class="text-danger">{{$message  }}</div> 
            @enderror
        </div>
         
        <div class="form-group mb-3">
            <input type="text" name="prenom" value="{{ $student->prenom }}" class="form-control">
            @error('prenom')
              <div class="text-danger">{{$message  }}</div> 
            @enderror
        </div>
         
        <div class="form-group mb-3">
            <input type="email" name="email" value="{{ $student->email }}" class="form-control">
            @error('email')
              <div class="text-danger">{{$message  }}</div> 
            @enderror
        </div>
        <div class="form-group mb-3">
            <input type="text" name="mobile" value="{{ $student->mobile }}" class="form-control">
            @error('mobile')
              <div class="text-danger">{{$message  }}</div> 
            @enderror
        </div>
        <div class="form-group mb-3">
           <select name="filiere_id" class="form-control">
            @foreach ($filieres as $filiere)
                <option value="{{ $filiere->id }}"
                    @if ($filiere->id == $student->filiere_id)
                       selected
                    @endif
                    >{{ $filiere->name }}</option>
            @endforeach
           </select>
            @error('filiere_id')
              <div class="text-danger">{{$message  }}</div> 
            @enderror
        </div>
         
        <button type="submit" class="btn btn-success">Modifier</button>
        <a href="{{ route('students.index') }}" class="btn btn-info">Annuler</a>
    </form>
</div>
@endsection