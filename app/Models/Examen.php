<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    use HasFactory;
    protected $fillable=[
        "titre",
        "date",
        "course_id"
];

public function course(){
    return $this->belongsTo(course::class,"course_id");
}
}
