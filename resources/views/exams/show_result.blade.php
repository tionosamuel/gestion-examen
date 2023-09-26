@extends('layout')

@section('content')
<div class="row">
    <div class="col-md-10 mx-auto mt-5">
        <div class="card bg-secondary">
          <h3 class="card-header text-center">Les Resultats des examens</div>
        <table class="table table-striped shadow">
            <tr>
                <th>id</th>
                <th>Etudiant</th>
                <th>Examen</th>
                <th>Mention</th>
                <th>Décision</th>
            </tr>
        
          @foreach ($result as $result)
          <tr>
          <td>{{$result->id}}</td>
          <td>{{$result->student->nom.' '.$result->student->prenom}}</td>
          <td>{{$result->examen->titre}}</td>
          <td>{{$result->grade}}</td>

          <td>
            @if ($result->note >= 10)
               <span class="text-success bg-light py-2 text-center rounded shadow d-block"
               style="width:100px"
               >
                Validé
                </span> 
                @else
                <span class="text-danger bg-light py-2 text-center rounded shadow d-block"
                style="width:100px"
                >
                 Invalide
                 </span> 
            @endif
          </td>

        </tr>

         
          @endforeach
          
        </table> 
        <a href="{{ route('exams.index') }}" class="btn btn-primary mb-3">Retour</a>  
    </div>
@endsection