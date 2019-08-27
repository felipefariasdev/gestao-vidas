<?php

namespace App\Http\Controllers;
use App\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index(Paciente $paciente){

        $pacientes = $paciente->orderBy('id','desc')->paginate(5);

        return view('pacientes.index', compact('pacientes'));
    }
    
    public function upload(){

        return view('pacientes.upload');
    }

    public function enviar(Paciente $paciente){
        $paciente->upload($_FILES);
    }

    public function add(){

        return view('pacientes.add');
    }

    public function save(Request $request, Paciente $paciente){

        $paciente->nome      = $request->nome;
        $paciente->idade     = $request->idade;
        $paciente->telefone  = $request->telefone;
        $paciente->matricula = $request->matricula;
        if($paciente->save()){
            echo "Salvo com sucesso!";
        }else{
            echo "Não foi possível salvar";
        }
        return redirect('pacientes');
    }

    public function delete($id){
        Paciente::find($id)->delete();
        return redirect('pacientes');
    }

    public function update($id,Paciente $paciente){
        $paciente = $paciente->find($id);
        return view('pacientes.update',compact('paciente'));
    }

    public function put(Request $request, Paciente $paciente){

        $paciente = $paciente->find($request->id);

        $paciente->nome      = $request->nome;
        $paciente->idade     = $request->idade;
        $paciente->telefone  = $request->telefone;
        $paciente->matricula = $request->matricula;
        if($paciente->save()){
            echo "Atualizado com sucesso!";
        }else{
            echo "Não foi possível salvar";
        }
        return redirect('pacientes');
    }

}
