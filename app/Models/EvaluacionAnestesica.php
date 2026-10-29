<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model; 
use Illuminate\Database\Eloquent\SoftDeletes;

class EvaluacionAnestesica extends Model
{
    use SoftDeletes;

    
    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     *   "id_profesional" => "2"
     
     */
     protected $fillable = ['id_profesional', 'id_obra_social', 'id_institucion',   'fecha_consulta','id_turno','id_paciente',
     'dni_paciente', 'nombre_paciente', 'numero_afiliado',  'edad_paciente', 'peso_paciente', 'talla_paciente'
    ,'observacion', 
     //cardiovascular
     'hipertension', 'arritmias',  'angor_est_cf', 'angor_inest', 'iam_tiempo','valvulopatia', 'disnea_cf_cardio',  'disnea_cf_cardio_valor' ,
     'cirugia_card_tiempo', 'marcapaso', 'edemas', 'varices',

       //respiratorio
       'asma', 'epoc',  'tabaco', 'tabaco_cant', 'tabaco_desde','tos', 'expectoracion', 'disnea_cf_respi','disnea_cf_respi_valor',
       //ocular
       'glaucoma', 'lentes_contacto', 
       //gastrointestinal
       'sme_acido_sensitivo', 'hernia_hiato_reflujo',  'oclusion', 'insuf_hepatica', 'hepatitis_tipo',
       'cirrosis', 'ictericia_colectasis', 

        //urinario
        'insuf_renal_cronica', 'insuf_renal_aguda',  'dialisis_frec', 'dialisis_frec_ultima', 'incontinensia',
        'disuria_polaquiuria', 
        //ALERGIAS
        // 'medicamentos', 'medicamentos_valor', 
        'alergias', 'alergias_valor', 
          //otras
          'otras_1', 'otras_enf_con', 
           'otras_2', 'otras_2_valor',  //no se usan
        //endocrino metab
        'obesidad', 'diabetes_tipo','diabetes' ,'dislipemia' ,'sme_metabolico', 'hipertiroidismo', 'hipotiroidismo', 'suprarrenales',
        'desnutricion',  'deshidratacion',  'hipertemia', 'alcoholismo', 'alcoholismo_cant',
        
         //neuromuscular
         'acv', 'ait',  'paresias', 'parestesias', 'afasias',
         'convulsiones',  'hipert_endocraneana',  'niopatias',

           //hematologia
        'anemia', 'coagulopatias', 'coagulopatias_valor', 'transfusiones','transfusiones_valor', 'transfusiones_fecha',
        'testigo_jehova',
         
        //psiquiatricos
         'psiquiatricos', 
          //enf tej conectivo
          'les', 'ar',  'sme_antifosfolipidos',

           //antec ginecobstet
        'fum', 'embarazos','embarazos_valor' ,  'abortos','abortos_valor' , 'eclampsia', 'pre_eclampsia_aco','dbt_gestacional' 
        ,'hta','acretismo','placenta_previa', 'parto_prematuro' ,
          'tratamientos',  'ayuno',  'ayuno_valor','hellp' ,
           
 
            //antecedentes antest
            'propios', 'propios_valor', 'complicaciones','complicaciones_desc',  'fliares_complic',  'fliares_complic_desc',


            
              //examen fisico
        'ta', 'ausc_pulmonar',  'ausc_cardiaca','ausc_cardiaca_valor', 'frec_cardiaca', 'columna','columna_valor', 'venas', 'venas_valor',

       
              //intubacion
              'ap_bucal', 'malampatti',  'dist_tiroment', 'dist_gonioment', 'mov_cuello', 'dentadura',   
              //estado psqiquiatrico
              'estado_psiquico_preoc', 
               //laboratorio
               'hto', 'uremia',  'creat', 'colin', 'na_mas', 'k_mas', 'hb', 'gluc','gb', 'tp', 'kptt', 'plac',
 //examen cardio vascular
 'ecg', 'r_quirugico_goldman',  'otros', 'plan_anestesico', 'interconsulta',  
             
    ]; 
 

      protected $table = 'evaluaciones_anestesicas';

    public function Practicas()
    {
        return $this->hasMany('App\Models\PracticaEvaluacionAnestesica', 'id');
    }

    public function Profesional()
    {
        return $this->belongsTo('App\Models\Profesional', 'id_profesional');
    }

    public function Turno()
    {
        return $this->belongsTo('App\Models\Turno' ,'id_turno');
    }

    public function Paciente()
    {
        return $this->belongsTo('App\Models\Paciente' ,'id_paciente');
    }

    public function Institucion()
    {
        return $this->belongsTo('App\Models\Institucion', 'id_institucion');
    }
    public function Obra_social()
    {
        return $this->belongsTo('App\Models\Obra_social', 'id_obra_social');
    }

      public function setFechaConsultaAttribute($value)
    {
        if(trim($value) !== '')
        {
            $p = new Carbon($value);
            $p = $p->format('Y-m-d');
        }
        else
        {
            $p = null;
        }
        $this->attributes['fecha_consulta']=$p;
    }

   public function getFechaConsultaAttribute($value)
    {
        $value = $value !== null ? new Carbon($value) : null;
        $value = $value !== null ? $value->format('d-m-Y') : null;
      
        return $value;
    }

     public function setTransfusionesFechaAttribute($value)
    {
        if(trim($value) !== '')
        {
            $p = new Carbon($value);
            $p = $p->format('Y-m-d');
        }
        else
        {
            $p = null;
        }
        $this->attributes['transfusiones_fecha']=$p;
    }

   public function getTransfusionesFechaAttribute($value)
   {
       $value = $value !== null ? new Carbon($value) : null;
        $value = $value !== null ? $value->format('d-m-Y') : null;
      
        return $value;
    }

      public static function countFiles($id)
    {
        $path = public_path() . '/storage/evaluaciones_anestesicas/' . $id . '/archivos/*'; //Declaramos un  variable con la ruta donde guardaremos los archivos
        $i = 0;
        foreach (glob("$path") as $filename) {
            $i++;
        }
        return ' ' . $i;
    }
}
