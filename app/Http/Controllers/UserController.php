<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //MÉTODOS CRUD - OBJETO: USUÁRIO


	//create
    public function createUser(Request $request){

    	$user = new User;

    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->password = $request->password;
    	$user->save(); //salva os dados

    	return response()->json([$user]); //retorna o que inserimos
    }

    //read
    public function listUser(){

    	$user = User::all(); //User é a model sendo utilizada, o all indica todas as instâncias 
    	return response()->json($user);
    }

    public function showUser($id){

    	$user = User::findOrFail($id);
    	return response()->json([$user]);
    }

    //update
    public function updateUser(Request $request, $id){//request é tudo o que quer atualizar

    	$user = User::find($id);

    	if($user){ //se achar o usuário faz as atualizações

    		//os ifs verificam qual foi o parâmetro passado para ser atualizado
    		if($request->name){
    			$user->name = $request->name;
    		}
    		else if($request->email){
    			$user->email = $request_email;
    		}
    		else if($request->password){
    			$user->password = $request->password;
    		}
    		else{
    			return response()->json(['Insira o parâmetro a ser atualizado']);
    		}
    		$user->save();
    		return response()->json([$user]);
    	}
    	else{
    		return response()->json(['Este usuário não existe']);
    	}
    }

    //delete
    public function deleteUser($id){

    	User::destroy($id);
    	return response()->json(['Usuário deletado']); 

    }
}
