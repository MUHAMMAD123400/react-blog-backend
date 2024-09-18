<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    //
    public function index(){

    }

    public function show(){

    }

    public function store(Request $request){
       $validate =  Validator::make(
            $request->all() , [
                'title' => 'required|min:10',
                'author' => 'required|min:3',
            ]
        );

        if($validate->fails()){
            return response()->json([
                'status' => false,
                'message' => 'Please fix the error',
                'errors' => $validate->errors()
            ]);
        }

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->author = $request->author;
        $blog->description = $request->description;
        $blog->shortDesc = $request->shortDesc;
        $blog->save();

        return response()->json([
            'status' => true,
            'message' => 'Blog Add Successfully!',
            'data' => $blog
        ]);
    }

    public function update(){

    }

    public function destroy(){

    }
}
