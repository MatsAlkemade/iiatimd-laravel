<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;


class PostsController extends Controller
{
    public function create(Request $request){

        $post = new Post;
        $post -> id = Auth::user()->id;
        $post->desc = $request->desc;

        if($request->photo != ''){
            $photo = time().'jpg';
            file_put_contents('storage/posts/'.$photo,base64_decode($request->photo));
            $posts->photo = $photo; 
        }

        $post->save();
        $post->user;
        return response()->json([
            'werktWel'=> true,
            'message' => 'Toegevoegd!',
            'post' => $post]);
    }
}
