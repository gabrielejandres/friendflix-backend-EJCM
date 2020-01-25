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
    	$user->username = $request->username;
    	$user->password = $request->password;
    	$user->following = $request->following;
    	$user->followers = $request->followers;
    	$user->number_of_posts = $request->number_of_posts;
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
    		if($request->email){
    			$user->email = $request_email;
    		}
    		if($request->username){
    			$user->username = $request->username;
    		}
    		if($request->password){
    			$user->password = $request->password;
    		}
    		if($request->following){
    			$user->following = $request->following;
    		}
    		if($request->followers){
    			$user->followers = $request->followers;
    		}
    		if($request->number_of_posts){
    			$user->number_of_posts = $request->number_of_posts;
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
