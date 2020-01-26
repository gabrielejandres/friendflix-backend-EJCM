<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    //MÉTODOS CRUD - OBJETO: POST

	//create
    public function createPost(Request $request){

    	$post = new Post;

    	$post->content_txt = $request->content_txt;
    	$post->content_file = $request->content_file;
    	$post->data = $request->data;
    	$post->attachment = $request->attachment;
    	$post->user_id = $request->user_id;
    	$post->save();

    	return response()->json([$post]); 
    }

    //read
    public function listPost(){

    	$post = Post::all(); 
    	return response()->json($post);
    }

    public function showPost($id){

    	$post = Post::findOrFail($id);
    	return response()->json([$post]);
    }

	//update
    public function updatePost(Request $request, $id){

    	$post = Post::find($id);

    	if($post){ 

    		if($request->content_txt){
    			$post->content_txt = $request->content_txt;
    		}
    		if($request->content_file){
    			$post->content_file = $request->content_file;
    		}
    		if($request->data){
    			$post->data = $request->data;
    		}
    		if($request->attachment){
    			$post->attachment = $request->attachment;
    		}
    		if($request->user_id){
    			$post->user_id = $request->user_id;
    		}
    		$post->save();
    		return response()->json([$post]);
    	}
    	else{
    		return response()->json(['Este post não existe']);
    	}
    }

    //delete
    public function deletePost($id){

    	Post::destroy($id);
    	return response()->json(['Post deletado']); 

    }

    //inserir o atributo da relação entre usuários e posts de uma instância específica
    public function insertRelationship(Request $request, $id){

    	$post = Post::find($id);

    	if($post){ 
    		$post->user_id = $request->user_id;
    		$post->save();
    		return response()->json([$post]);
    	}
    	else{
    		return response()->json(['Esse post não existe. Por favor, entre com um valor válido para o id do post.']);
    	}
    }

    //deletar a relação entre usuários e posts de uma instância específica
    public function deleteRelationship(Request $request, $id){

    	$post = Post::find($id);

    	if($post){ 
			$post->user_id = NULL;
    		$post->save();
    		return response()->json([$post]);
    	}
    	else{
    		return response()->json(['Esse post não existe. Por favor, entre com um valor válido para o id do post.']);
    	}
    }

}
