<?php

namespace App\Http\Controllers;

use App\Models\Examen;
use App\Models\Course;
use App\Models\Result;
use App\Models\Student;
use Illuminate\Http\Request;

class ExamenController extends Controller
{
    //liste des examens
    public function index(){
        $exams = Examen::with("course")->get();
        return view("exams.index", compact("exams"));
    }
    public function create(){
        $courses = Course::all();
        return view("exams.create",compact("courses"));
    }

    public function store(Request $request){
        $validateData = $request->validate([
            "titre"=>'required',
            "date"=>'required|date',
            "course_id"=>"required|exists:courses,id"
        ]);
        Examen::create($validateData);
        return redirect()->route('exams.index')->with('success',"Examen enregistré avec succèss");
    }

    public function edit(Examen $exam){
        // formulaire de modification
        $courses = Course::all();
        return view('exams.edit',compact('exam',"courses"));
     
     } 
// Modification du cours
public function update(Request $request, int $id){
    $validateData = $request->validate([
        "titre"=>'required',
        "date"=>'required|date',
        "course_id"=>'required|exists:courses,id'
    ]);
  Examen::where('id',$id)->update($validateData);
  return redirect()->route('exams.index')->with('success',"Examen modifié avec succès");
}
// suppression d'un course
public function destroy(Examen $exam){
    $result = $exam->delete();
    if($result){
      return redirect()->route('exams.index')->with("success","examen supprimée avec succès");
    }
  }

  public function createNote(){
    $students = Student::all();
    $examens = Examen::all();
    return view("exams.store_note", compact("students","examens"));
  }
public function  storeResult(Request $request){
  $validateData = $request->validate([
    "note"=>'required',
    "student_id"=>'required|exists:students,id',
    "examen_id"=>"required|exists:examens,id"
]);

$note = $request->note;
$grade = "nulle";
if($note <= 5){
  $grade ="nulle";
}elseif($note <=7){
   $grade = "faible";
}elseif($note <= 9){
  $grade = "insuffisante";
}elseif($note <= 11){
  $grade = "passable";
}elseif($note <= 13){
  $grade = "assez-bien";
}elseif($note <= 15){
  $grade = "bien";
}elseif($note <= 17){
  $grade = "très-bien";
}elseif($note <= 19){
  $grade = "excellente";
}elseif($note <= 20){
  $grade = "honorable";
}
Result::create([
  
   "note"=>$validateData["note"],
   "student_id"=>$validateData["student_id"],
   "examen_id"=>$validateData["examen_id"],
   "grade"=>$grade
   
]);

return redirect()->route("exams.index")->with("success","Note ou resultat enregistrer succès"); 
}
 public function showresult(){
  $result = Result::all();
  return view("exams.show_result",compact("result"));
 } 

}
