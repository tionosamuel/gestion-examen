<?php

namespace App\Http\Controllers;

use App\Models\Course;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    // liste des coure
    public function index(){
        $courses = Course::all();
    return view("courses.index",compact("courses"));
    }

    public function create(){
        return view("courses.create");
    }
    public function store(Request $request){
        // validation des données
        $validateData = $request->validate([
            "name"=>'required',
            "description"=>'required'
        ]);
        Course::create($validateData);
        return redirect()->route('courses.index')->with('success',"Cours enregistré avec succèss");
    }

    public function edit(Course $course){
        // formulaire de modification
        return view('courses.edit',compact('course'));
     } 
// Modification du cours
public function update(Request $request, int $id){
    $validateData = $request->validate([
      'name'=>"required",
      'description'=>"required"
  ]);
  Course::where('id',$id)->update($validateData);
  return redirect()->route('courses.index')->with('success',"Course modifié avec succès");
}
// suppression d'un course
public function destroy(Course $course){
    $result = $course->delete();
    if($result){
      return redirect()->route('courses.index')->with('success',"course supprimée avec succèss");
    }else{
      return redirect()->route('courses.index')->with('errore',"Echec de suppression"); 
    }
  }
}