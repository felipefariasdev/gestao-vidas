<?php

namespace App\Http\Controllers;
use App\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index(Paciente $paciente){

        $pacientes = $paciente->paginate();

        return view('pacientes.index', compact('pacientes'));
    }
    

}
