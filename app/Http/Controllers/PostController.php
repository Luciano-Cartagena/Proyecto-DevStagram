<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(User $user)
    {
        $posts = Post::where('user_id', $user->id)->get();
        //dd($user->username);
        return view('dashboard', [
            'user'=> $user,
            'posts' => $posts
        ]);
    }

    public function create () //Crea el formulario de tipo GET para poder visualizar el formulario, retorna una vista.
    {
        return view('posts.create');
    }

    public function store (Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:255', 
            'descripcion' => 'required',
            'imagen' => 'required'
            ]);

            /*Post::create([
                'titulo' => $request->titulo,
                'descripcion' => $request->descripcion,
                'imagen'=> $request->imagen,
                //'user_id'=> auth()->user()->id
                'user_id' => Auth::id()
            ]);*/

            $request->user()->posts()->create([
                'titulo' => $request->titulo,
                'descripcion' => $request->descripcion,
                'imagen'=> $request->imagen,
                //'user_id'=> auth()->user()->id
                'user_id' => Auth::id()
            ]);

            $user = Auth::user();

            return redirect()->route('posts.index',['user' => $user->username]);
    }
}

