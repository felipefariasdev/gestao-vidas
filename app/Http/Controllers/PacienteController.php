<?php

namespace App\Http\Controllers;
use App\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PacienteController extends Controller
{
    public function index(Paciente $paciente){

        $pacientes = $paciente->orderBy('id','desc')->paginate(5);

        return view('pacientes.index', compact('pacientes'));
    }
    
    public function upload(){

        return view('pacientes.upload');
    }

    public function enviar(){

        $uploaddir = 'uploads/';
        $uploadfile = $uploaddir . basename($_FILES['file']['name']);

        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
            echo "Arquivo válido e enviado com sucesso.";
        } else {
            echo "Possível ataque de upload de arquivo!";
        }

        echo "<hr>";

        $arquivo = fopen ($uploadfile, 'r');
        $i=0;
        while(!feof($arquivo)){
            $linha = fgets($arquivo, 1024);
            
            if($i>0){
                $arrayLinha = explode(';',$linha);
                
                $nome  = $arrayLinha[0];
                $idade = $arrayLinha[1];
                $telefone  = $arrayLinha[2];
                $matricula  = $arrayLinha[3];
                
                $verificarMatriculaCadastrada = DB::table('pacientes')->where('matricula', $matricula)->count();
                
                if($verificarMatriculaCadastrada==0){

                    $paciente = new Paciente();
                    $paciente->nome      = $nome;
                    $paciente->idade     = $idade;
                    $paciente->telefone  = $telefone;
                    $paciente->matricula = $matricula;
                    if($paciente->save()){
                        echo "<pre>";
                        echo "Salvo com sucesso!";
                        print_r($arrayLinha);
                        echo "</pre>";
                    } 
                }
                 

            }
            $i++;
        }
        fclose($arquivo);

        echo "<a href='/pacientes'>Listar Pacientes</a>";
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
