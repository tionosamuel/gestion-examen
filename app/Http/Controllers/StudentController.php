<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //liste des etudiants et filiere

    public function index(){
        $students = Student::with("filiere")->get();
       
        return view("students.index",compact("students"));
    }
    // creation d'un etudiant
    public function create(){
      $filieres = Filiere::all();

        return view("students.create",compact("filieres"));
    }
    public function store(Request $request){
  $validateData = $request->validate([
    "nom"=> "required",
    "prenom"=>"required",
    "email" =>"required|email",
    "mobile"=>"required|min:8",
    "filiere_id"=>"required|exists:filieres,id"
  ]);
 
  Student::create($validateData);
  return redirect()->route("students.index")->with("success","Etudiant créé avec succèss");
    }
       // formulaire de modification
    public function edit(Student $student ){
         $filieres = Filiere::all();
        return view('students.edit',compact('student',"filieres"));
     } 

    // formulaire de modification
    public function update(Request $request, int $id){
        $validateData = $request->validate([
            "nom"=> "required",
            "prenom"=>"required",
            "email" =>"required|email",
            "mobile"=>"required|min:8",
            "filiere_id"=>"required|exists:filieres,id"
      ]);
      Student::where('id',$id)->update($validateData);
      return redirect()->route('students.index')->with('success',"Etudiant modifié avec succès");
    }
    // suppression d'un course
    public function destroy(Student $student){
        $result = $student->delete();
        if($result){
          return redirect()->route('students.index')->with('success',"Etudiant supprimée avec succèss");
        }else{
          return redirect()->route('students.index')->with('errore',"Echec de suppression"); 
        }
      }
}
