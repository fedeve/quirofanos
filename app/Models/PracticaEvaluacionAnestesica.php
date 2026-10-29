<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Model; 
use Illuminate\Database\Eloquent\SoftDeletes;

class PracticaEvaluacionAnestesica extends Model
{
    use SoftDeletes;

    
    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_evaluacion', 'id_practica' ];


      protected $table = 'evaluaciones_anestesicas';

    public function Practicas()
    {
        return $this->belongsTo('App\Practica', 'id_practica');
    }

    

    public function EvaluacionAnestesica()
    {
        return $this->belongsTo('App\EvaluacionAnestesica', 'id_evaluacion');
    }

   
     
 
}
