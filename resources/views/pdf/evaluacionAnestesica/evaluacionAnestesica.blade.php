<!DOCTYPE html>
<html>

<head>
    <title>EVALUACIÓN ANESTÉSICA PREVIA</title>
    <style>
        body {
            font-family: 'Aptos', sans-serif;

        }

        .container {

            border-color: black;
            border-style: solid;
            border-width: 2px;
            padding-bottom: 2em;

        }

        .titulo {
            text-align: center;
            font-size: medium;
            padding-bottom: 1em;
            padding-top: 1em;
        }

        .parrafo {
            padding-left: 1em;
            font-size: 10px;
        }

        .celda {
            font-size: 8px;
        }

        th {
            text-align: left;
            padding-left: 1em;
        }

        td {
            text-align: left;
            padding-left: 1em;
        }

        .checkbox {
            width: 10px;
        }

        .examen {
            font-size: 10px;
            width: 20%;
        }


        .img {
            width: 10px;
            float: right;
            padding-right: 2em;
        }

    </style>
</head>

<body>

    <div class="container">
        <div class="titulo"><b>EVALUACIÓN ANESTÉSICA PREVIA</b></div>

        <div class="col" style="width: 100%;">
            <div class="parrafo" style="line-height: 2;">
                <span>Fecha:{{ $evaluacion->fecha_consulta }}</span>
            </div>
            <div class="parrafo" style="display: inline-block; line-height: 1.5;">
                <span style="padding-right: 5em;">Paciente: {{ strtoupper($evaluacion->nombre_paciente) }}</span>
                <span style="padding-right: 5em;">Edad: {{strtoupper($evaluacion->edad_paciente)}}</span>
                <span style="padding-right: 5em;">Peso: {{strtoupper($evaluacion->peso_paciente)}}</span>
                <span style="padding-right: 5em;">Talla: {{strtoupper($evaluacion->talla_paciente)}}</span>
            </div>
            <div class="parrafo">
                {{ $practica_propuesta = '' }}
                @foreach ($evaluacion->Practicas as $practica)
                {{$practica_propuesta = $practica_propuesta . (isset($practica->Practica) ? $practica->Practica->denominacion : '') . ' - '}}
                @endforeach
                <span>Cirugia propuesta: {{ $practica_propuesta }}</span>
                <span><br></span>
                <span><br></span>
            </div>
        </div>

        <div class="titulo"><b>CLÍNICA PREOPERATORIA</b></div>

        <table style="width: 100%;">
            <thead class="celda">
                <tr>
                    <th>Cardiovascular</th>
                    <th>SI</th>
                    <th>NO</th>
                    <th>Gastrointestinal</th>
                    <th>SI</th>
                    <th>NO</th>
                    <th>Endocrino/metab.</th>
                    <th>SI</th>
                    <th>NO</th>
                    <th>Psiquiatricos</th>
                    <th>SI</th>
                    <th>NO</th>
                    <th>Ayuno ?</th>
                    <th>SI</th>
                    <th style="padding-right:2em;">NO</th>
                </tr>
                <tr>
                    <td>Hipertensión</td>
                    @if ($evaluacion->hipertension)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>Sme. Ácido Sensitivo</td>
                    @if ($evaluacion->sme_acido_sensitivo)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>Obesidad</td>
                    @if ($evaluacion->obesidad)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>Psiquiatricos</td>
                    @if ($evaluacion->psiquiatricos)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>Ayuno</td>
                    @if ($evaluacion->ayuno)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif
                </tr>


                <tr>
                    <td>Arritmias</td>
                    @if ($evaluacion->arritmias)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>Hernia Hiato Reflujo</td>
                    @if ($evaluacion->hernia_hiato_reflujo)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>Diabetes</td>
                    @if ($evaluacion->diabetes)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <th>Enf. del Tej. Conectivo</th>
                    <th>SI</th>
                    <th>NO</th>

                    <th>Antec. Anestes</th>
                    <th>SI</th>
                    <th style="padding-right:2em;">NO</th>
                </tr>


                <tr>
                    <td>Angor est. CF</td>
                    @if ($evaluacion->angor_est_cf)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>Oclusión</td>
                    @if ($evaluacion->oclusion)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>Hipertiroidismo</td>
                    @if ($evaluacion->hipertiroidismo)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>LES</td>
                    @if ($evaluacion->les)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>Propios</td>
                    @if ($evaluacion->propios)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif
                </tr>



                <tr>
                    <td>Angor inest.</td>
                    @if ($evaluacion->angor_inest)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>Insuf. Hepática</td>
                    @if ($evaluacion->insuf_hepatica)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>DISLIPEMIA</td>
                    @if ($evaluacion->dislipemia)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>A.R.</td>
                    @if ($evaluacion->ar)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>Complicaciones</td>
                    @if ($evaluacion->complicaciones)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif
                </tr>

                <tr>
                    <td>IAM Tiempo</td>
                    @if ($evaluacion->iam_tiempo)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>Hepatitis tipo</td>
                    @if ($evaluacion->hepatitis_tipo)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>Sme. METABÓLICO</td>
                    @if ($evaluacion->sme_metabolico)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>Sme. Antifosfolipidos</td>
                    @if ($evaluacion->sme_antifosfolipidos)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>Complic. Fliares.</td>
                    @if ($evaluacion->fliares_complic)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif
                </tr>
                <tr>
                    <td>Valvulopatía</td>
                    @if ($evaluacion->valvulopatia)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>Cirrosis</td>
                    @if ($evaluacion->cirrosis)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>Hipotiroidismo</td>
                    @if ($evaluacion->hipotiroidismo)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <th>Antec. Gineco-obstétricos</th>
                    <th>SI</th>
                    <th>NO</th>

                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th style="padding-right:2em;">&nbsp;</th>
                </tr>


                <tr>
                    <td>Disnea CF</td>
                    @if ($evaluacion->disnea_cf_cardio)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>Ictericia-colectasis</td>
                    @if ($evaluacion->ictericia_colectasis)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>Suprarrenales</td>
                    @if ($evaluacion->suprarrenales)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>F.U.M.</td>
                    @if ($evaluacion->fum)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <th>Hematología</th>
                    <th>SI</th>
                    <th>NO</th>
                </tr>

                <tr>
                    <td>Cirugía Card. Tiempo</td>
                    @if ($evaluacion->cirugia_card_tiempo)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <th>Urinario</th>
                    <th>SI</th>
                    <th>NO</th>

                    <td>Sme. METABÓLICO</td>
                    @if ($evaluacion->sme_metabolico)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>Desnutricion</td>
                    @if ($evaluacion->desnutricion)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>Embarazos</td>
                    @if ($evaluacion->embarazos)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif
                </tr>



                <tr>
                    <td>Marcapaso</td>
                    @if ($evaluacion->marcapaso)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>Insuf. Renal crónica</td>
                    @if ($evaluacion->insuf_renal_cronica)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>Deshidratación</td>
                    @if ($evaluacion->deshidratacion)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>Abortos</td>
                    @if ($evaluacion->abortos)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>Anemia</td>
                    @if ($evaluacion->anemia)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif
                </tr>



                <tr>
                    <td>Edemas</td>
                    @if ($evaluacion->edemas)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>Insuf. Renal aguda</td>
                    @if ($evaluacion->insuf_renal_aguda)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>Hipertemia</td>
                    @if ($evaluacion->hipertemia)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>Eclampsia</td>
                    @if ($evaluacion->eclampsia)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>Coagulopatías</td>
                    @if ($evaluacion->coagulopatias)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif
                </tr>


                <tr>
                    <td>Varices</td>
                    @if ($evaluacion->varices)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>Dialisis Frec.</td>
                    @if ($evaluacion->dialisis_frec)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>Alcoholismo</td>
                    @if ($evaluacion->alcoholismo)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>Pre Eclampsia A.C.O</td>
                    @if ($evaluacion->pre_eclampsia_aco)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif


                    <td>Transfusiones</td>
                    @if ($evaluacion->transfusiones)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif
                </tr>


                <tr>
                    <th>Respiratorio</th>
                    <th>SI</th>
                    <th>NO</th>

                    <td>Ultima:</td>
                    @if ($evaluacion->dialisis_frec_ultima)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>Cant.</td>
                    @if ($evaluacion->alcoholismo_cant)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>DBT GESTACIONAL</td>
                    @if ($evaluacion->dbt_gestacional)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>Testigo de Jehova ?</td>
                    @if ($evaluacion->testigo_jehova)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                </tr>

                <tr>

                    <td>Asma</td>
                    @if ($evaluacion->asma)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>Incontinencia</td>
                    @if ($evaluacion->incontinensia)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <th>Neuromuscular</th>
                    <th>SI</th>
                    <th>NO</th>

                    <td>HTA</td>
                    @if ($evaluacion->hta)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <th>Medicación Actual: </th>
                    @if ($evaluacion->tratamientos)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif
                </tr>

                <tr>
                    <td>EPOC</td>
                    @if ($evaluacion->epoc)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>Disuria Polaquiuria</td>
                    @if ($evaluacion->disuria_polaquiuria)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>ACV</td>
                    @if ($evaluacion->acv)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>ACRETISMO/PERCRETISMO</td>
                    @if ($evaluacion->acretismo)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th style="padding-right:2em;">&nbsp;</th>
                </tr>
                <tr>


                    <td>Tabaco</td>
                    @if ($evaluacion->tabaco)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <th>Alergias</th>
                    <th>SI</th>
                    <th>NO</th>

                    <td>AIT</td>
                    @if ($evaluacion->ait)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif


                    <td>PLACENTA PREVIA</td>
                    @if ($evaluacion->placenta_previa)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th style="padding-right:2em;">&nbsp;</th>
                </tr>

                <tr>
                    <td>Tabaco Cant.</td>
                    @if ($evaluacion->tabaco_cant)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif


                    <td>Alergias</td>
                    @if ($evaluacion->alergias)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif


                    <td>Paresias</td>
                    @if ($evaluacion->paresias)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif


                    <td>PARTO PREMATURO</td>
                    @if ($evaluacion->parto_prematuro)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th style="padding-right:2em;">&nbsp;</th>
                </tr>


                <tr>
                    <td>Desde</td>
                    @if ($evaluacion->tabaco_desde)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif


                    <th>Otras</th>
                    <th>SI</th>
                    <th>NO</th>


                    <td>Parestesias</td>
                    @if ($evaluacion->parestesias)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif


                    <td>H.E.L.L.P.</td>
                    @if ($evaluacion->hellp)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th style="padding-right:2em;">&nbsp;</th>
                </tr>

                <tr>
                    <td>Tos</td>
                    @if ($evaluacion->tos)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th style="padding-right:2em;">&nbsp;</th>

                    <td>Afasias</td>
                    @if ($evaluacion->afasias)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <th>Ocular</th>
                    <th>SI</th>
                    <th>NO</th>

                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th style="padding-right:2em;">&nbsp;</th>
                </tr>
                <tr>
                    <td>Expectoración</td>
                    @if ($evaluacion->expectoracion)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th style="padding-right:2em;">&nbsp;</th>

                    <td>Convulsiones</td>
                    @if ($evaluacion->convulsiones)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>Glaucoma</td>
                    @if ($evaluacion->glaucoma)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif


                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th style="padding-right:2em;">&nbsp;</th>

                </tr>

                <tr>
                    <td>Disnea CF</td>
                    @if ($evaluacion->disnea_cf_respi)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th style="padding-right:2em;">&nbsp;</th>

                    <td>Hipert. Endocraneana</td>
                    @if ($evaluacion->hipert_endocraneana)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <td>Lentes de contacto</td>
                    @if ($evaluacion->lentes_contacto)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif

                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th style="padding-right:2em;">&nbsp;</th>

                </tr>

                <tr>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th style="padding-right:2em;">&nbsp;</th>

                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th style="padding-right:2em;">&nbsp;</th>

                    <td>Miopatias</td>
                    @if ($evaluacion->niopatias)
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    @else
                    <td><img class="checkbox" src="{{ url ('img/check_vacio.png') }}"></td>
                    <td><img class="checkbox" src="{{ url ('img/check_si.png') }}"></td>
                    @endif


                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th style="padding-right:2em;">&nbsp;</th>


                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th style="padding-right:2em;">&nbsp;</th>
                </tr>
            </thead>
        </table>

        <div class="titulo"><b>EXAMEN FÍSICO</b></div>
        <table style="width: 100%;">
            <thead class="celda" style="line-height: 2;">
                <tr>
                    <span style="padding-left:3em;">T.A {{$evaluacion->ta}}</span>
                    <span style="padding-left:3em;">Ausc. Pulmonar {{ $evaluacion->ausc_pulmonar . ' ' . $evaluacion->ausc_pulmonar_valor}}</span>
                    <span style="padding-left:3em;">Ausc. Cardíaca {{$evaluacion->ausc_cardiaca . ' ' . $evaluacion->ausc_cardiaca_valor}}</span>
                    <span style="padding-left:3em;">Frecuencia Cardíaca {{ $evaluacion->frec_cardiaca}}</span>
                    <span style="padding-left:3em;">&nbsp;</span>
                    <span style="padding-left:3em;">&nbsp;</span>
                </tr>
            </thead>
            <tbody class="celda" style="line-height: 2;">
                </tr>
                <span style="padding-left:3em;">Columna {{$evaluacion->columna . ' ' . $evaluacion->columna_valor}}</span>
                <span style="padding-left:3em;">&nbsp;</span>
                <span style="padding-left:3em;">&nbsp;</span>
                <span style="padding-left:3em;">Venas {{$evaluacion->venas . ' ' . $evaluacion->venas_valor}}</span>
                <span style="padding-left:3em;">&nbsp;</span>
                <span style="padding-left:3em;">&nbsp;</span>
                </tr>
                <tr style="line-height: 2;">
                    <span style="padding-left:3em;">Intubación: Ap. Bucal: {{$evaluacion->ap_bucal}}</span>
                    <span style="padding-left:3em;">Malampatti: {{$evaluacion->malampatti}}</span>
                    <span style="padding-left:3em;">Dist. Tiroment: {{$evaluacion->dist_tiroment}}</span>
                    <span style="padding-left:3em;">Dist. Gonioment: {{$evaluacion->dist_gonioment}}</span>
                    <span style="padding-left:3em;">Mov. Cuello: {{$evaluacion->mov_cuello}}</span>
                    <span style="padding-left:3em;">Dentadura: {{$evaluacion->dentadura}}</span>
                </tr>
            </tbody>
            <tfoot class="celda" style="line-height: 2;">
                <tr>
                    <span style="padding-left:3em;">Laboratorio: {{$evaluacion->columna}}</span>
                    <span style="padding-left:3em;">H.T.O.: {{$evaluacion->hto}}</span>
                    <span style="padding-left:3em;">Uremia: {{$evaluacion->uremia}}</span>
                    <span style="padding-left:3em;">Creat: {{$evaluacion->creat}}</span>
                    <span style="padding-left:3em;">Colin: {{$evaluacion->colin}}</span>
                    <span style="padding-left:3em;">&nbsp;</span>
                </tr>
                <tr>
                    <span style="padding-left:3em; padding-right:6em;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span style="padding-left:3em;">Na +: {{$evaluacion->na_mas}}</span>
                    <span style="padding-left:6em;">K +: {{$evaluacion->k_mas}}</span>
                    <span style="padding-left:4em;">HB: {{$evaluacion->hb}}</span>
                    <span style="padding-left:3em;">Gluc.: {{$evaluacion->gluc}}</span>
                    <span style="padding-left:3em;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </tr>
                <tr>
                    <span style="padding-left:3em; padding-right:6em;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span style="padding-left:3em;">G.B.: {{$evaluacion->gb}}</span>
                    <span style="padding-left:3em;">T.P.: {{$evaluacion->tp}}</span>
                    <span style="padding-left:3em;">KPTT.: {{$evaluacion->kptt}}</span>
                    <span style="padding-left:3em;">Plaq.: {{$evaluacion->plac}}</span>
                    <span style="padding-left:3em;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </tr>
                <tr>
                    <span style="padding-left:3em;">Ex. C. Vascular: {{$evaluacion->columna}}</span>
                    <span style="padding-left:5em;">E.C.G.: {{$evaluacion->ecg}}</span>
                    <span style="padding-left:5em;">R. Quirugico (Goldman): {{$evaluacion->r_quirugico_goldman}}</span>
                    <span style="padding-left:3em;">&nbsp;</span>
                    <span style="padding-left:3em;">&nbsp;</span>
                    <span style="padding-left:3em;">&nbsp;</span>
                </tr>
                <tr>
                    <span style="padding-left:3em;">Otros: {{$evaluacion->otros}}</span>
                    <span style="padding-left:3em;">&nbsp;</span>
                    <span style="padding-left:3em;">&nbsp;</span>
                    <span style="padding-left:3em;">&nbsp;</span>
                    <span style="padding-left:3em;">&nbsp;</span>
                    <span style="padding-left:3em;">&nbsp;</span>
                </tr>
                <tr>
                    <span style="padding-left:3em;">Plan Anestesico: {{$evaluacion->plan_anestesico}}</span>
                    <span style="padding-left:3em;">&nbsp;</span>
                    <span style="padding-left:3em;">&nbsp;</span>
                    <span style="padding-left:3em;">&nbsp;</span>
                    <span style="padding-left:3em;">Interconsulta: {{$evaluacion->interconsulta}}</span>
                    <span style="padding-left:3em;">&nbsp;</span>
                </tr>
            </tfoot>
        </table>
    </div>
    <div>
        @if($evaluacion->Profesional && $evaluacion->Profesional->firma != '')
        <img class="img" src="{{ url('storage/profesionales/' . $evaluacion->id_profesional . '/archivos/'. $evaluacion->Profesional->firma )}}" style="width:150px; padding-top:2em;">
    @endif
</div>
</body>

</html>