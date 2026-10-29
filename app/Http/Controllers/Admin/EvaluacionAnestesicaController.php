<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Practica;
use App\Models\Institucion;
use App\Models\Profesional;
use App\Models\EvaluacionAnestesica;
use App\Models\Localidad;
use App\Models\Obra_social;
use App\Models\Turno;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use File;
use PDF;

class EvaluacionAnestesicaController extends Controller
{

    public function index(Request $request)
    {
        $evaluaciones = EvaluacionAnestesica::OrderBy('fecha_consulta', 'desc')->get();

        return view('admin.evaluaciones_anestesicas.index', compact('evaluaciones'));
    }


    public function create()
    {

        $url_busqueda = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
        $id_institucion = Institucion::orderBy('nombre')->pluck('nombre', 'id');

        if (!Auth::user()->id_profesional) {
            $id_profesional = Profesional::orderBy('nombre')->pluck('nombre', 'id')->all();
            $id_profesional = array('' => trans('message.select')) + $id_profesional;
        } else {
            $id_profesional = Profesional::where('id', '=', Auth::user()->id_profesional)->get()->pluck('nombre', 'id');
        }

        $id_obra_social = Obra_social::orderBy('denominacion')->get()->pluck('denominacion_y_denominacion_amigable', 'id');

        $localidad_institucion = Localidad::orderBy('id')->pluck('denominacion', 'id');

        $id_practica = Practica::orderBy('codigo')->get()->pluck('denominacion_y_codigo_y_nivel', 'id');
        $archivos_laboratorios = [];
        $archivos_otros = [];
        $archivos_ecg = [];



        return view('admin.evaluaciones_anestesicas.edit', compact(
            'localidad_institucion',
            'id_profesional',
            'id_practica',
            'id_institucion',
            'id_obra_social',
            'archivos_laboratorios',
            'archivos_otros',
            'archivos_ecg',
            'url_busqueda'
        ));
    }


    public function show(Request $request, $id)
    {
        $evaluacion = EvaluacionAnestesica::findOrFail($id);
        return view('admin.evaluaciones_anestesicas.show', compact('evaluacion'));
    }

    public function store(Request $request)
    {
        try {

            $fecha = new Carbon($request->fecha_consulta);
            $search = str_replace('.', '', $request->numero_afiliado);
            $search = str_replace('-', '', $search);
            $search = str_replace('/', '', $search);
            $search = str_replace(' ', '', $search);

            if ($request->denominacion_establecimeinto != '') {
                $institucion = Institucion::where('denominacion', $request->denominacion_establecimeinto)->first();
                if (!isset($institucion)) {
                    $institucion = new Institucion();
                    $institucion->denominacion = $request->denominacion_establecimeinto;
                    $institucion->localidad = $request->localidad_institucion;

                    $institucion->save();
                }
            } else {
                if ($request->id_institucion != '') {
                    $institucion = Institucion::find($request->id_institucion);
                }
            }

            $evaluacion = new EvaluacionAnestesica($request->all());

            $evaluacion->numero_afiliado = $search;
            $evaluacion->id_institucion = isset($institucion) ? $institucion->id : null; //si no anda va 0


            //nuevos check agosto copiar en update y store evaluacion
            if ($request->dislipemia != '') {
                $evaluacion->dislipemia = 'checked';
            }
            if ($request->sme_metabolico != '') {
                $evaluacion->sme_metabolico = 'checked';
            }

            if ($request->dbt_gestacional != '') {
                $evaluacion->dbt_gestacional = 'checked';
            }
            if ($request->hta != '') {
                $evaluacion->hta = 'checked';
            }

            if ($request->acretismo != '') {
                $evaluacion->acretismo = 'checked';
            }
            if ($request->placenta_previa != '') {
                $evaluacion->placenta_previa = 'checked';
            }

            if ($request->parto_prematuro != '') {
                $evaluacion->parto_prematuro = 'checked';
            }
            if ($request->hellp != '') {
                $evaluacion->hellp = 'checked';
            }

            //
            if ($request->hipertension != '') {
                $evaluacion->hipertension = 'checked';
            }
            if ($request->arritmias != '') {
                $evaluacion->arritmias = 'checked';
            }
            if ($request->angor_est_cf != '') {
                $evaluacion->angor_est_cf = 'checked';
            }
            if ($request->angor_inest != '') {
                $evaluacion->angor_inest = 'checked';
            }
            if ($request->iam_tiempo != '') {
                $evaluacion->iam_tiempo = 'checked';
            }
            if ($request->valvulopatia != '') {
                $evaluacion->valvulopatia = 'checked';
            }
            if ($request->disnea_cf_cardio != '') {
                $evaluacion->disnea_cf_cardio = 'checked';
            }

            if ($request->cirugia_card_tiempo != '') {
                $evaluacion->cirugia_card_tiempo = 'checked';
            }
            if ($request->marcapaso != '') {
                $evaluacion->marcapaso = 'checked';
            }
            if ($request->edemas != '') {
                $evaluacion->edemas = 'checked';
            }
            if ($request->varices != '') {
                $evaluacion->varices = 'checked';
            }

            if ($request->asma != '') {
                $evaluacion->asma = 'checked';
            }
            if ($request->epoc != '') {
                $evaluacion->epoc = 'checked';
            }
            if ($request->tabaco != '') {
                $evaluacion->tabaco = 'checked';
            }
            if ($request->tos != '') {
                $evaluacion->tos = 'checked';
            }
            if ($request->expectoracion != '') {
                $evaluacion->expectoracion = 'checked';
            }
            if ($request->disnea_cf_respi != '') {
                $evaluacion->disnea_cf_respi = 'checked';
            }
            if ($request->glaucoma != '') {
                $evaluacion->expectoracion = 'checked';
            }
            if ($request->lentes_contacto != '') {
                $evaluacion->disnea_cf_respi = 'checked';
            }

            if ($request->sme_acido_sensitivo != '') {
                $evaluacion->sme_acido_sensitivo = 'checked';
            }
            if ($request->hernia_hiato_reflujo != '') {
                $evaluacion->hernia_hiato_reflujo = 'checked';
            }
            if ($request->oclusion != '') {
                $evaluacion->oclusion = 'checked';
            }
            if ($request->insuf_hepatica != '') {
                $evaluacion->insuf_hepatica = 'checked';
            }
            if ($request->hepatitis_tipo != '') {
                $evaluacion->hepatitis_tipo = 'checked';
            }
            if ($request->cirrosis != '') {
                $evaluacion->cirrosis = 'checked';
            }
            if ($request->ictericia_colectasis != '') {
                $evaluacion->ictericia_colectasis = 'checked';
            }

            if ($request->insuf_renal_cronica != '') {
                $evaluacion->insuf_renal_cronica = 'checked';
            }
            if ($request->insuf_renal_aguda != '') {
                $evaluacion->insuf_renal_aguda = 'checked';
            }
            if ($request->dialisis_frec != '') {
                $evaluacion->dialisis_frec = 'checked';
            }

            if ($request->incontinensia != '') {
                $evaluacion->incontinensia = 'checked';
            }
            if ($request->disuria_polaquiuria != '') {
                $evaluacion->disuria_polaquiuria = 'checked';
            }
            if ($request->alergias != '') {
                $evaluacion->alergias = 'checked';
            }


            if ($request->obesidad != '') {
                $evaluacion->obesidad = 'checked';
            }
            if ($request->diabetes != '') {
                $evaluacion->diabetes = 'checked';
            }
            if ($request->hipertiroidismo != '') {
                $evaluacion->hipertiroidismo = 'checked';
            }
            if ($request->hipotiroidismo != '') {
                $evaluacion->hipotiroidismo = 'checked';
            }

            if ($request->suprarrenales != '') {
                $evaluacion->suprarrenales = 'checked';
            }
            if ($request->desnutricion != '') {
                $evaluacion->desnutricion = 'checked';
            }
            if ($request->deshidratacion != '') {
                $evaluacion->deshidratacion = 'checked';
            }
            if ($request->hipertemia != '') {
                $evaluacion->hipertemia = 'checked';
            }
            if ($request->alcoholismo != '') {
                $evaluacion->alcoholismo = 'checked';
            }

            if ($request->acv != '') {
                $evaluacion->acv = 'checked';
            }
            if ($request->ait != '') {
                $evaluacion->ait = 'checked';
            }
            if ($request->paresias != '') {
                $evaluacion->paresias = 'checked';
            }
            if ($request->parestesias != '') {
                $evaluacion->parestesias = 'checked';
            }

            if ($request->afasias != '') {
                $evaluacion->afasias = 'checked';
            }
            if ($request->convulsiones  != '') {
                $evaluacion->convulsiones = 'checked';
            }
            if ($request->hipert_endocraneana != '') {
                $evaluacion->hipert_endocraneana = 'checked';
            }
            if ($request->niopatias != '') {
                $evaluacion->niopatias = 'checked';
            }

            if ($request->anemia != '') {
                $evaluacion->anemia = 'checked';
            }
            if ($request->coagulopatias != '') {
                $evaluacion->coagulopatias = 'checked';
            }
            if ($request->transfusiones != '') {
                $evaluacion->transfusiones = 'checked';
            }
            if ($request->testigo_jehova != '') {
                $evaluacion->testigo_jehova = 'checked';
            }
            if ($request->psiquiatricos != '') {
                $evaluacion->psiquiatricos = 'checked';
            }

            if ($request->les != '') {
                $evaluacion->les = 'checked';
            }
            if ($request->ar != '') {
                $evaluacion->ar = 'checked';
            }
            if ($request->sme_antifosfolipidos != '') {
                $evaluacion->sme_antifosfolipidos = 'checked';
            }


            if ($request->embarazos != '') {
                $evaluacion->embarazos = 'checked';
            }
            if ($request->abortos != '') {
                $evaluacion->abortos = 'checked';
            }

            if ($request->eclampsia != '') {
                $evaluacion->eclampsia = 'checked';
            }
            if ($request->pre_eclampsia_aco != '') {
                $evaluacion->pre_eclampsia_aco = 'checked';
            }
            if ($request->ayuno != '') {
                $evaluacion->ayuno = 'checked';
            }

            if ($request->propios != '') {
                $evaluacion->propios = 'checked';
            }
            if ($request->complicaciones != '') {
                $evaluacion->complicaciones = 'checked';
            }
            if ($request->fliares_complic != '') {
                $evaluacion->fliares_complic = 'checked';
            }
            $evaluacion->save();



            $this->store_files_contenedor($request, $evaluacion->id);

            session()->flash('alert-success', trans('message.successaction'));
            return redirect()->route('admin.evaluaciones_anestesicas.index');
        } catch (QueryException  $ex) {
            session()->flash('alert-danger', $ex->getMessage());
            return redirect()->route('admin.evaluaciones_anestesicas.index');
        }
    }

    public function store_files_contenedor(Request $request, $id)
    {
        $archivos = count($this->cantidad_archivos($id, 'Archivo_Adjunto_Lab', 19)) + 1;
        $this->store_files($request, $id, $archivos, 'Archivo_Adjunto_Lab', 'Archivo_Adjunto_Lab');

        $archivos = count($this->cantidad_archivos($id, 'Archivo_Adjunto_ECG', 19)) + 1;
        $this->store_files($request, $id, $archivos, 'Archivo_Adjunto_ECG', 'Archivo_Adjunto_ECG');

        $archivos = count($this->cantidad_archivos($id, 'Archivo_Adjunto_Otro', 20)) + 1;
        $this->store_files($request, $id, $archivos, 'Archivo_Adjunto_Otro', 'Archivo_Adjunto_Otro');

        return redirect()->back();
    }

    public function cantidad_archivos($id, $nombre, $largo)
    {
        $path = public_path() . '/storage/evaluaciones_anestesicas/' . $id . '/archivos/'; //Declaramos un  variable con la ruta donde guardaremos los archivos

        $archivos = array();
        $i = 1;

        if (file_exists($path)) {
            $files = File::allFiles($path);

            foreach ($files as $file) {
                $var = explode(".", $file->getFilename());
                $tipo =  substr($var[0], -$largo);
                if ($tipo == $nombre) {
                    $archivos[$i]['nombre'] = $file->getFilename();
                    $archivos[$i]['tamaño'] = $file->getSize();
                    $archivos[$i]['extension'] = $file->getExtension();
                    $i++;
                }
            }
        }
        return $archivos;
    }

    public function archivos($id)
    {
        $i = 1;
        $lab = $this->cantidad_archivos($id, 'Archivo_Adjunto_Lab', 19);
        $ecg = $this->cantidad_archivos($id, 'Archivo_Adjunto_ECG', 19);
        $otros = $this->cantidad_archivos($id, 'Archivo_Adjunto_Otro', 20);

        $puede_eliminar = true;
        $puede_modificar = true;

        return view('admin.evaluaciones_anestesicas.archivos', compact(
            'id',
            'lab',
            'i',
            'puede_eliminar',
            'puede_modificar',
            'ecg',
            'otros'
        ));
    }

    public function store_files_contenedor_files(Request $request, $id)
    {
        $lab =  count($this->cantidad_archivos($id, 'Archivo_Adjunto_Lab', 19)) + 1;
        $ecg =  count($this->cantidad_archivos($id, 'Archivo_Adjunto_ECG', 19)) + 1;
        $otros =  count($this->cantidad_archivos($id, 'Archivo_Adjunto_Otro', 20)) + 1;


        $this->store_files($request, $id, $lab, 'Archivo_Adjunto_Lab', 'Archivo_Adjunto_Lab');
        $this->store_files($request, $id, $ecg, 'Archivo_Adjunto_ECG', 'Archivo_Adjunto_ECG');
        $this->store_files($request, $id, $otros, 'Archivo_Adjunto_Otro', 'Archivo_Adjunto_Otro');

        return redirect()->back();
    }

    public function delete_file(Request $request, $id, $file_name)
    {
        $directorio = public_path() . '/storage/evaluaciones_anestesicas/' . $id . '/archivos/'; //Declaramos un  variable con la ruta donde guardaremos los archivos
        File::delete($directorio . $file_name);

        return redirect()->back();
    }

    public function store_files(Request $request, $id, $i, $nombre_archivo, $nuevo)
    {

        foreach ($_FILES[$nombre_archivo]['tmp_name'] as $key => $tmp_name) {

            if ($_FILES[$nombre_archivo]["name"][$key]) {
                $var = explode(".", $_FILES[$nombre_archivo]['name'][$key]);
                $cant = count($var);
                $esten = $cant - 1;

                $filename = $nuevo . '.' . $var[$esten]; //Obtenemos el nombre original del archivo

                $source = $_FILES[$nombre_archivo]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo

                $direct = public_path() . '/storage/evaluaciones_anestesicas/'; //Declaramos un  variable con la ruta donde guardaremos los archivos

                if (!file_exists($direct)) {
                    mkdir($direct, 0777) or die("No se puede crear el directorio comuniquese con el area de sistemas");
                }
                $director = $direct . $id . '/'; //Declaramos un  variable con la ruta donde guardaremos los archivos

                if (!file_exists($director)) {
                    mkdir($director, 0777) or die("No se puede crear el directorio comuniquese con el area de sistemas");
                }

                $directorio = $director . '/archivos/'; //Declaramos un  variable con la ruta donde guardaremos los archivos

                if (!file_exists($directorio)) {
                    mkdir($directorio, 0777) or die("No se puede crear el directorio comuniquese con el area de sistemas");
                }

                $dir = opendir($directorio); //Abrimos el directorio de destino
                $fecha =  Carbon::now()->format('d-m-Y');
                $filename =  '_' . $fecha . '_' . $filename;
                $z = $this->verificar_archivo($id, $filename, $i);

                while ($z == 1) {
                    $i++;
                    $z = $this->verificar_archivo($id, $filename, $i);
                }

                $target_path = $directorio . $i . $filename; //Indicamos la ruta de destino, así como el nombre del archivo
                move_uploaded_file($source, $target_path);

                closedir($dir);
            }
            $i++;
        }
        return redirect()->back()->with('message', 'Operation Successful !');
        //return redirect()->route('admin.comunicaciones.archivos', ['id' => $id]);
    }

    public function verificar_archivo($id, $nombre, $i)
    {
        $path = public_path() . '/storage/evaluaciones_anestesicas/' . $id . '/archivos/'; //Declaramos un  variable con la ruta donde guardaremos los archivos

        $z = 0;

        if (file_exists($path)) {
            $files = File::allFiles($path);

            foreach ($files as $file) {

                if ($file->getFilename() == $i . $nombre) {
                    $z = 1;
                }
            }
        }
        return  $z;
    }



    public function edit(Request $request, $id)
    {
        $url_busqueda = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
        $id_institucion = Institucion::orderBy('nombre')->pluck('nombre', 'id');

        if (!Auth::user()->id_profesional) {
            $id_profesional = Profesional::orderBy('nombre')->pluck('nombre', 'id')->all();
            $id_profesional = array('' => trans('message.select')) + $id_profesional;
        } else {
            $id_profesional = Profesional::where('id', '=', Auth::user()->id_profesional)->get()->pluck('nombre', 'id');
        }

        $id_obra_social = Obra_social::orderBy('denominacion')->get()->pluck('denominacion_y_denominacion_amigable', 'id');
        // $id_obra_social = array('' => trans('message.select')) + $id_obra_social; 
        $localidad_institucion = Localidad::orderBy('id')->pluck('denominacion', 'id');
        $evaluacion = EvaluacionAnestesica::find($id);

        $id_practica = Practica::orderBy('codigo')->get()->pluck('denominacion_y_codigo_y_nivel', 'id');

        $cant_practicas = count($evaluacion->Practicas);

        $archivos_laboratorios  = $this->cantidad_archivos($evaluacion->id, 'Archivo_Adjunto_Lab', 19);
        $archivos_ecg  = $this->cantidad_archivos($evaluacion->id, 'Archivo_Adjunto_ECG', 19);
        $archivos_otros  = $this->cantidad_archivos($evaluacion->id, 'Archivo_Adjunto_Otro', 20);

        $puede_eliminar = true;
        $puede_modificar = true;

        return view('admin.evaluaciones_anestesicas.edit', compact(
            'archivos_laboratorios',
            'archivos_otros',
            'archivos_ecg',
            'evaluacion',
            'puede_eliminar',
            'puede_modificar',
            'id_practica',
            'id_institucion',
            'id_obra_social',
            'id_profesional',
            'localidad_institucion',
            'url_busqueda'
        ));
    }

    public function asociar(Request $request, $id)
    {
        $turno = Turno::find($id);

        $evaluacion = new EvaluacionAnestesica();
        $evaluacion->id_turno = $turno->id;
        $evaluacion->id_profesional = $turno->id_profesional;
        $evaluacion->id_institucion = $turno->id_institucion;
        $evaluacion->id_obra_social = $turno->id_obra_social;
        $evaluacion->fecha_consulta = $turno->fecha;
        if (isset($turno->Paciente)) {
            $evaluacion->id_paciente = $turno->Paciente->id;
            $evaluacion->dni_paciente = $turno->Paciente->dni;
            $evaluacion->nombre_paciente = $turno->Paciente->nombre;
            $evaluacion->numero_afiliado = $turno->Paciente->numero_afiliado;
            if ($turno->Paciente->fecha_nacimiento != '') {
                $fecha_nac = new Carbon($turno->Paciente->fecha_nacimiento);
                $edad = $fecha_nac->diffInYears(Carbon::now());
                $evaluacion->edad_paciente = $edad;
            }
        }
        $evaluacion->save();
        $turno->preanestesico = 'Si';
        $turno->save();


        $url_busqueda = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

        if (!Auth::user()->id_profesional) {
            $id_profesional = Profesional::orderBy('nombre')->pluck('nombre', 'id')->all();
            $id_profesional = array('' => trans('message.select')) + $id_profesional;
        } else {
            $id_profesional = Profesional::where('id', '=', Auth::user()->id_profesional)->get()->pluck('nombre', 'id');
        }

        $id_institucion = Institucion::orderBy('nombre')->pluck('nombre', 'id');
        $id_obra_social = Obra_social::orderBy('denominacion')->get()->pluck('denominacion_y_denominacion_amigable', 'id');
        $localidad_institucion = Localidad::orderBy('id')->pluck('denominacion', 'id');


        $id_practica = Practica::orderBy('codigo')->get()->pluck('denominacion_y_codigo_y_nivel', 'id');

        $cant_practicas = count($evaluacion->Practicas);

        $archivos_laboratorios  = $this->cantidad_archivos($evaluacion->id, 'Archivo_Adjunto_Lab', 19);
        $archivos_ecg  = $this->cantidad_archivos($evaluacion->id, 'Archivo_Adjunto_ECG', 19);
        $archivos_otros  = $this->cantidad_archivos($evaluacion->id, 'Archivo_Adjunto_Otro', 20);

        $puede_eliminar = true;
        $puede_modificar = true;

        return view('admin.evaluaciones_anestesicas.edit', compact(
            'archivos_laboratorios',
            'archivos_otros',
            'archivos_ecg',
            'evaluacion',
            'puede_eliminar',
            'puede_modificar',
            'id_practica',
            'id_institucion',
            'id_obra_social',
            'id_profesional',
            'localidad_institucion',
            'url_busqueda'
        ));
    }

    public function update(Request $request, $id)
    {
        try {
            $search = str_replace('.', '', $request->numero_afiliado);
            $search = str_replace('-', '', $search);
            $search = str_replace('/', '', $search);
            $search = str_replace(' ', '', $search);

            if ($request->denominacion_establecimeinto != '') {
                $institucion = Institucion::where('denominacion', $request->denominacion_establecimeinto)->first();
                if (!isset($institucion)) {
                    $institucion = new Institucion();
                    $institucion->denominacion = $request->denominacion_establecimeinto;
                    $institucion->localidad = $request->localidad_institucion;
                    $institucion->save();
                }
            } else {
                if ($request->id_institucion != '') {
                    $institucion = Institucion::find($request->id_institucion);
                }
            }

            $evaluacion = EvaluacionAnestesica::find($id);

            $evaluacion->numero_afiliado = $search;
            $evaluacion->id_institucion = isset($institucion) ? $institucion->id : null; //si no anda va 0

            $evaluacion->id_profesional = $request->id_profesional;
            $evaluacion->id_obra_social = $request->id_obra_social;
            $evaluacion->fecha_consulta = $request->fecha_consulta;
            $evaluacion->dni_paciente = $request->dni_paciente;
            $evaluacion->nombre_paciente = $request->nombre_paciente;

            $evaluacion->edad_paciente = $request->edad_paciente;
            $evaluacion->peso_paciente = $request->peso_paciente;
            $evaluacion->talla_paciente = $request->talla_paciente;

            $evaluacion->tabaco_cant = $request->tabaco_cant;
            $evaluacion->tabaco_desde = $request->tabaco_desde;
            $evaluacion->dialisis_frec_ultima = $request->dialisis_frec_ultima;

            $evaluacion->otras_1 = $request->otras_1;

            $evaluacion->alcoholismo_cant = $request->alcoholismo_cant;

            $evaluacion->complicaciones_desc = $request->complicaciones_desc;
            $evaluacion->fliares_complic_desc = $request->fliares_complic_desc;
            $evaluacion->tratamientos = $request->tratamientos;

            $evaluacion->ta = $request->ta;
            $evaluacion->ausc_pulmonar = $request->ausc_pulmonar;
            $evaluacion->ausc_cardiaca = $request->ausc_cardiaca;

            $evaluacion->frec_cardiaca = $request->frec_cardiaca;
            $evaluacion->columna = $request->columna;
            $evaluacion->venas = $request->venas;

            $evaluacion->ap_bucal = $request->ap_bucal;
            $evaluacion->malampatti = $request->malampatti;
            $evaluacion->dist_tiroment = $request->dist_tiroment;

            $evaluacion->dist_gonioment = $request->dist_gonioment;
            $evaluacion->mov_cuello = $request->mov_cuello;
            $evaluacion->dentadura = $request->dentadura;
            $evaluacion->estado_psiquico_preoc = $request->estado_psiquico_preoc;

            $evaluacion->hto = $request->hto;
            $evaluacion->uremia = $request->uremia;
            $evaluacion->creat = $request->creat;

            $evaluacion->colin = $request->colin;
            $evaluacion->na_mas = $request->na_mas;
            $evaluacion->k_mas = $request->k_mas;
            $evaluacion->hb = $request->hb;

            $evaluacion->gluc = $request->gluc;
            $evaluacion->gb = $request->gb;
            $evaluacion->tp = $request->tp;

            $evaluacion->kptt = $request->kptt;
            $evaluacion->plac = $request->plac;

            $evaluacion->ecg = $request->ecg;
            $evaluacion->r_quirugico_goldman = $request->r_quirugico_goldman;
            $evaluacion->otros = $request->otros;

            $evaluacion->plan_anestesico = $request->plan_anestesico;
            $evaluacion->interconsulta = $request->interconsulta;

            // nuevas agosto 24
            $evaluacion->disnea_cf_cardio_valor = $request->disnea_cf_cardio_valor;
            $evaluacion->disnea_cf_respi_valor = $request->disnea_cf_respi_valor;
            $evaluacion->alergias_valor = $request->alergias_valor;
            $evaluacion->diabetes_tipo = $request->diabetes_tipo;

            $evaluacion->coagulopatias_valor = $request->coagulopatias_valor;
            $evaluacion->transfusiones_valor = $request->transfusiones_valor;
            $evaluacion->transfusiones_fecha = $request->transfusiones_fecha;
            $evaluacion->otras_enf_con = $request->otras_enf_con;

            $evaluacion->fum = $request->fum;
            $evaluacion->embarazos_valor = $request->embarazos_valor;
            $evaluacion->abortos_valor = $request->abortos_valor;
            $evaluacion->ayuno_valor = $request->ayuno_valor;
            $evaluacion->propios_valor = $request->propios_valor;

            $evaluacion->ausc_cardiaca_valor = $request->ausc_cardiaca_valor;
            $evaluacion->columna_valor = $request->columna_valor;
            $evaluacion->venas_valor = $request->venas_valor;

            //nuevos check agosto copiar en update y store evaluacion
            if ($request->dislipemia != '') {
                $evaluacion->dislipemia = 'checked';
            }
            if ($request->sme_metabolico != '') {
                $evaluacion->sme_metabolico = 'checked';
            }

            if ($request->dbt_gestacional != '') {
                $evaluacion->dbt_gestacional = 'checked';
            }
            if ($request->hta != '') {
                $evaluacion->hta = 'checked';
            }

            if ($request->acretismo != '') {
                $evaluacion->acretismo = 'checked';
            }
            if ($request->placenta_previa != '') {
                $evaluacion->placenta_previa = 'checked';
            }

            if ($request->parto_prematuro != '') {
                $evaluacion->parto_prematuro = 'checked';
            }
            if ($request->hellp != '') {
                $evaluacion->hellp = 'checked';
            }

            //
            //
            if ($request->hipertension != '') {
                $evaluacion->hipertension = 'checked';
            } else {
                $evaluacion->hipertension = null;
            }
            if ($request->arritmias != '') {
                $evaluacion->arritmias = 'checked';
            } else {
                $evaluacion->arritmias = null;
            }
            if ($request->angor_est_cf != '') {
                $evaluacion->angor_est_cf = 'checked';
            } else {
                $evaluacion->angor_est_cf = null;
            }
            if ($request->angor_inest != '') {
                $evaluacion->angor_inest = 'checked';
            } else {
                $evaluacion->angor_inest = null;
            }
            if ($request->iam_tiempo != '') {
                $evaluacion->iam_tiempo = 'checked';
            } else {
                $evaluacion->iam_tiempo = null;
            }
            if ($request->valvulopatia != '') {
                $evaluacion->valvulopatia = 'checked';
            } else {
                $evaluacion->valvulopatia = null;
            }
            if ($request->disnea_cf_cardio != '') {
                $evaluacion->disnea_cf_cardio = 'checked';
            } else {
                $evaluacion->disnea_cf_cardio = null;
            }

            if ($request->cirugia_card_tiempo != '') {
                $evaluacion->cirugia_card_tiempo = 'checked';
            } else {
                $evaluacion->cirugia_card_tiempo = null;
            }
            if ($request->marcapaso != '') {
                $evaluacion->marcapaso = 'checked';
            } else {
                $evaluacion->marcapaso = null;
            }
            if ($request->edemas != '') {
                $evaluacion->edemas = 'checked';
            } else {
                $evaluacion->edemas = null;
            }
            if ($request->varices != '') {
                $evaluacion->varices = 'checked';
            } else {
                $evaluacion->varices = null;
            }

            if ($request->asma != '') {
                $evaluacion->asma = 'checked';
            } else {
                $evaluacion->asma = null;
            }
            if ($request->epoc != '') {
                $evaluacion->epoc = 'checked';
            } else {
                $evaluacion->epoc = null;
            }
            if ($request->tabaco != '') {
                $evaluacion->tabaco = 'checked';
            } else {
                $evaluacion->tabaco = null;
            }
            if ($request->tos != '') {
                $evaluacion->tos = 'checked';
            } else {
                $evaluacion->tos = null;
            }
            if ($request->expectoracion != '') {
                $evaluacion->expectoracion = 'checked';
            } else {
                $evaluacion->expectoracion = null;
            }
            if ($request->disnea_cf_respi != '') {
                $evaluacion->disnea_cf_respi = 'checked';
            } else {
                $evaluacion->disnea_cf_respi = null;
            }
            if ($request->glaucoma != '') {
                $evaluacion->expectoracion = 'checked';
            } else {
                $evaluacion->expectoracion = null;
            }
            if ($request->lentes_contacto != '') {
                $evaluacion->disnea_cf_respi = 'checked';
            } else {
                $evaluacion->disnea_cf_respi = null;
            }

            if ($request->sme_acido_sensitivo != '') {
                $evaluacion->sme_acido_sensitivo = 'checked';
            } else {
                $evaluacion->sme_acido_sensitivo = null;
            }
            if ($request->hernia_hiato_reflujo != '') {
                $evaluacion->hernia_hiato_reflujo = 'checked';
            } else {
                $evaluacion->hernia_hiato_reflujo = null;
            }
            if ($request->oclusion != '') {
                $evaluacion->oclusion = 'checked';
            } else {
                $evaluacion->oclusion = null;
            }
            if ($request->insuf_hepatica != '') {
                $evaluacion->insuf_hepatica = 'checked';
            } else {
                $evaluacion->insuf_hepatica = null;
            }
            if ($request->hepatitis_tipo != '') {
                $evaluacion->hepatitis_tipo = 'checked';
            } else {
                $evaluacion->hepatitis_tipo = null;
            }
            if ($request->cirrosis != '') {
                $evaluacion->cirrosis = 'checked';
            } else {
                $evaluacion->cirrosis = null;
            }
            if ($request->ictericia_colectasis != '') {
                $evaluacion->ictericia_colectasis = 'checked';
            } else {
                $evaluacion->ictericia_colectasis = null;
            }

            if ($request->insuf_renal_cronica != '') {
                $evaluacion->insuf_renal_cronica = 'checked';
            } else {
                $evaluacion->insuf_renal_cronica = null;
            }
            if ($request->insuf_renal_aguda != '') {
                $evaluacion->insuf_renal_aguda = 'checked';
            } else {
                $evaluacion->insuf_renal_aguda = null;
            }
            if ($request->dialisis_frec != '') {
                $evaluacion->dialisis_frec = 'checked';
            } else {
                $evaluacion->dialisis_frec = null;
            }

            if ($request->incontinensia != '') {
                $evaluacion->incontinensia = 'checked';
            } else {
                $evaluacion->incontinensia = null;
            }
            if ($request->disuria_polaquiuria != '') {
                $evaluacion->disuria_polaquiuria = 'checked';
            } else {
                $evaluacion->disuria_polaquiuria = null;
            }
            if ($request->alergias != '') {
                $evaluacion->alergias = 'checked';
            } else {
                $evaluacion->alergias = null;
            }


            if ($request->obesidad != '') {
                $evaluacion->obesidad = 'checked';
            } else {
                $evaluacion->obesidad = null;
            }
            if ($request->diabetes != '') {
                $evaluacion->diabetes = 'checked';
            } else {
                $evaluacion->diabetes = null;
            }
            if ($request->hipertiroidismo != '') {
                $evaluacion->hipertiroidismo = 'checked';
            } else {
                $evaluacion->hipertiroidismo = null;
            }
            if ($request->hipotiroidismo != '') {
                $evaluacion->hipotiroidismo = 'checked';
            } else {
                $evaluacion->hipotiroidismo = null;
            }

            if ($request->suprarrenales != '') {
                $evaluacion->suprarrenales = 'checked';
            } else {
                $evaluacion->suprarrenales = null;
            }
            if ($request->desnutricion != '') {
                $evaluacion->desnutricion = 'checked';
            } else {
                $evaluacion->desnutricion = null;
            }
            if ($request->deshidratacion != '') {
                $evaluacion->deshidratacion = 'checked';
            } else {
                $evaluacion->deshidratacion = null;
            }
            if ($request->hipertemia != '') {
                $evaluacion->hipertemia = 'checked';
            } else {
                $evaluacion->hipertemia = null;
            }
            if ($request->alcoholismo != '') {
                $evaluacion->alcoholismo = 'checked';
            } else {
                $evaluacion->alcoholismo = null;
            }

            if ($request->acv != '') {
                $evaluacion->acv = 'checked';
            } else {
                $evaluacion->acv = null;
            }
            if ($request->ait != '') {
                $evaluacion->ait = 'checked';
            } else {
                $evaluacion->ait = null;
            }
            if ($request->paresias != '') {
                $evaluacion->paresias = 'checked';
            } else {
                $evaluacion->paresias = null;
            }
            if ($request->parestesias != '') {
                $evaluacion->parestesias = 'checked';
            } else {
                $evaluacion->parestesias = null;
            }

            if ($request->afasias != '') {
                $evaluacion->afasias = 'checked';
            } else {
                $evaluacion->afasias = null;
            }
            if ($request->convulsiones  != '') {
                $evaluacion->convulsiones = 'checked';
            } else {
                $evaluacion->convulsiones = null;
            }
            if ($request->hipert_endocraneana != '') {
                $evaluacion->hipert_endocraneana = 'checked';
            } else {
                $evaluacion->hipert_endocraneana = null;
            }
            if ($request->niopatias != '') {
                $evaluacion->niopatias = 'checked';
            } else {
                $evaluacion->niopatias = null;
            }

            if ($request->anemia != '') {
                $evaluacion->anemia = 'checked';
            } else {
                $evaluacion->anemia = null;
            }
            if ($request->coagulopatias != '') {
                $evaluacion->coagulopatias = 'checked';
            } else {
                $evaluacion->coagulopatias = null;
            }
            if ($request->transfusiones != '') {
                $evaluacion->transfusiones = 'checked';
            } else {
                $evaluacion->transfusiones = null;
            }
            if ($request->testigo_jehova != '') {
                $evaluacion->testigo_jehova = 'checked';
            } else {
                $evaluacion->testigo_jehova = null;
            }
            if ($request->psiquiatricos != '') {
                $evaluacion->psiquiatricos = 'checked';
            } else {
                $evaluacion->psiquiatricos = null;
            }

            if ($request->les != '') {
                $evaluacion->les = 'checked';
            } else {
                $evaluacion->les = null;
            }
            if ($request->ar != '') {
                $evaluacion->ar = 'checked';
            } else {
                $evaluacion->ar = null;
            }
            if ($request->sme_antifosfolipidos != '') {
                $evaluacion->sme_antifosfolipidos = 'checked';
            } else {
                $evaluacion->sme_antifosfolipidos = null;
            }


            if ($request->embarazos != '') {
                $evaluacion->embarazos = 'checked';
            } else {
                $evaluacion->embarazos = null;
            }
            if ($request->abortos != '') {
                $evaluacion->abortos = 'checked';
            } else {
                $evaluacion->abortos = null;
            }
            if ($request->eclampsia != '') {
                $evaluacion->eclampsia = 'checked';
            } else {
                $evaluacion->eclampsia = null;
            }
            if ($request->pre_eclampsia_aco != '') {
                $evaluacion->pre_eclampsia_aco = 'checked';
            } else {
                $evaluacion->pre_eclampsia_aco = null;
            }
            if ($request->ayuno != '') {
                $evaluacion->ayuno = 'checked';
            } else {
                $evaluacion->ayuno = null;
            }

            if ($request->propios != '') {
                $evaluacion->propios = 'checked';
            } else {
                $evaluacion->propios = null;
            }
            if ($request->complicaciones != '') {
                $evaluacion->complicaciones = 'checked';
            } else {
                $evaluacion->complicaciones = null;
            }
            if ($request->fliares_complic != '') {
                $evaluacion->fliares_complic = 'checked';
            } else {
                $evaluacion->fliares_complic = null;
            }
            $evaluacion->save();


            $fecha = new Carbon($request->fecha_consulta);

            $this->store_files_contenedor($request, $evaluacion->id);

            session()->flash('alert-success', trans('message.successaction'));
            return redirect()->route('admin.evaluaciones_anestesicas.index');
        } catch (QueryException  $ex) {
            session()->flash('alert-danger', $ex->getMessage());
            return redirect()->route('admin.evaluaciones_anestesicas.index');
        }
    }


    public function destroy(Request $request, $id)
    {
        try {

            EvaluacionAnestesica::destroy($id);

            session()->flash('alert-success', trans('message.successaction'));
            return redirect()->route('admin.evaluaciones_anestesicas.index');
        } catch (QueryException  $ex) {
            session()->flash('alert-danger', $ex->getMessage());
            return redirect()->route('admin.evaluaciones_anestesicas.index');
        }
    }


    public function export_evaluacion_pdf($id, $mode)
    {
        $evaluacion = EvaluacionAnestesica::findOrFail($id);


        $data = ['evaluacion' => $evaluacion];


        $pdf = PDF::loadView('pdf/evaluacionAnestesica/evaluacionAnestesica', $data);
        if ($mode == 'store') {


            $direct = public_path() . '/storage/evaluaciones_anestesicas'; //Declaramos un  variable con la ruta donde guardaremos los archivos

            if (!file_exists($direct)) {
                File::makeDirectory($direct);
            }
            $director = $direct . $evaluacion->id  . '/'; //Declaramos un  variable con la ruta donde guardaremos los archivos

            if (!file_exists($director)) {
                File::makeDirectory($director);
            }

            $directorio = $director . '/archivos/'; //Declaramos un  variable con la ruta donde guardaremos los archivos

            if (!file_exists($directorio)) {
                File::makeDirectory($directorio);
            }


            return    $pdf->save($directorio . '1_' . $evaluacion->fecha_consulta . '_Evaluacion_Anestesica.pdf');
        } else {
            return $pdf->download('1_' . $evaluacion->fecha_consulta . '_Evaluacion_Anestesica.pdf');
        }
    }

    function eliminar_tildes($cadena)
    {
        //Codificamos la cadena en formato utf8 en caso de que nos de errores
        // $cadena = utf8_encode($cadena);
        //Ahora reemplazamos las letras
        $cadena = str_replace(
            array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
            array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
            $cadena
        );
        $cadena = str_replace(
            array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
            array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
            $cadena
        );

        $cadena = str_replace(
            array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
            array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
            $cadena
        );

        $cadena = str_replace(
            array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
            array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
            $cadena
        );

        $cadena = str_replace(
            array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
            array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
            $cadena
        );

        $cadena = str_replace(
            array('ñ', 'Ñ', 'ç', 'Ç'),
            array('n', 'N', 'c', 'C'),
            $cadena
        );

        return $cadena;
    }


    public function download($id, $file_name)
    {
        $filePath = public_path('storage/evaluaciones_anestesicas/' . $id . '/archivos/' . $file_name);

        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            abort(404, 'File not found.');
        }
    }
}
