<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class FiliereController extends Controller
{
    //liste des toutes les fillières
    public function index(){
      $filieres = Filiere::all();
        return view("filieres.index",compact('filieres'));
    }
  //formulaire de creation d'une filiere
  public function create(){
    return view('filieres.create');
  }  
//   Enregistrement de la filiere
  public function store(Request $request){
    $validateData = $request->validate([
        'name'=>"required"
    ]);

    Filiere::create($validateData);
    return redirect()->route('filiere.index')->with('success',"Filiere enregistrée avec succès");
  }

  public function edit(Filiere $filiere){
     return view('filieres.edit',compact('filiere'));
  } 

  public function update(Request $request, int $id){
    $validateData = $request->validate([
      'name'=>"required"
  ]);
  Filiere::where('id',$id)->update($validateData);
  return redirect()->route('filiere.index')->with('success',"Filiere modifiée avec succès");
}

public function destroy(Filiere $filiere){
  $result = $filiere->delete();
  if($result){
    return redirect()->route('filiere.index')->with('success',"Filière supprimée avec succèss");
  }else{
    return redirect()->route('filiere.index')->with('errore',"Echec de suppression"); 
  }
}
}