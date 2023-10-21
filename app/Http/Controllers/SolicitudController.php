<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SolicitudRequest;
use App\Http\Resources\SolicitudCollection;
use App\Http\Resources\SolicitudResource;
use App\Models\Mecanico;
use Spatie\Ignition\Contracts\Solution;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        return new SolicitudCollection(Solicitud::select('solicitudes.id', 'eco', 'km', 'persona', 'fallas.nombre as falla', 'solicitudes.comentarios', 'mecanicos.nombre as mecanico', 'descripcion', 'calificacion', DB::raw('DATE_FORMAT(solicitudes.created_at, "%d/%m/%Y") as fecha'))->join('fallas', 'fallas.id', '=', 'solicitudes.fallas_id')->leftJoin('mecanicos', 'solicitudes.mecanicos_id', '=', 'mecanicos.id')->orderBy('solicitudes.id', 'DESC')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SolicitudRequest $request)
    {
        $data = $request->validated();

        $solicitud = new Solicitud();
        $solicitud->eco = $request->eco;
        $solicitud->km = $request->km;
        $solicitud->persona = $request->persona;
        $solicitud->fallas_id = $request->fallas_id;
        $solicitud->descripcion = $request->descripcion;
        $solicitud->created_at = Carbon::now();
        $solicitud->updated_at = Carbon::now();
        $solicitud->save();

        return [
            'message' => 'Tu solicitud con folio '. $solicitud->id . ' ha sido recibida y será atendida cuanto antes'
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(Solicitud $solicitud)
    {
        return $solicitud;
    }

    public function showByEco($eco)
    {
        // Busca por eco y retorna aquellos que tengan mecánico y no hayan sido calificados
        return Solicitud::select('solicitudes.id', DB::raw('DATE_FORMAT(solicitudes.created_at, "%d/%m/%Y") as fecha'), 'eco', 'nombre', 'persona', 'nombre as falla')->where('eco', '=' , $eco)->whereNotNull('mecanicos_id')->whereNull('calificacion')->join('fallas', 'solicitudes.fallas_id', '=', 'fallas.id')->orderBy('solicitudes.id', 'DESC')->get();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Solicitud $solicitud)
    {
        // Petición por parte de vendedor
        if($request->calificacion) {
            $solicitud->calificacion = $request->calificacion;
            $solicitud->comentarios = $request->comentarios;
        }
        
        // Petición por parte de mecánico
        if($request->mecanico) {
            // Si el nombre de mecánico no ha sido registrado, registrarlo
            $mecanico = Mecanico::firstOrCreate(['nombre' => $request->mecanico]);
            $solicitud->mecanicos_id = $mecanico->id;
        }



        $solicitud->save();

        return $solicitud;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Solicitud $solicitud)
    {
        //
    }
}
