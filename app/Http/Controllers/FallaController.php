<?php

namespace App\Http\Controllers;

use App\Http\Resources\FallaCollection;
use App\Models\Falla;
use Illuminate\Http\Request;

class FallaController extends Controller
{
    public function index () {
        // return response()->json(['fallas' => Falla::all()]);

        return new FallaCollection(Falla::all());
    }
}
