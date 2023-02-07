<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    function index() {
        return view('blogs.index',[
            'blogs'=>Blog::latest()
                        ->filter(request(['search','category','username']))
                        ->paginate(6)
                        ->withQueryString()
            // 'categories'=>Category::all()
        ]);
    }

    function show(Blog $blog){
        return view('blogs.show',[
            'blog'=>$blog,      // Blog::findOrFail()
            'randomBlogs'=>Blog::inRandomOrder()->take(3)->get()
        ]
    );
    }

    // protected function getBlogs(){
    //     // if(request('search')){
    //         //     $blogs=$blogs->where('title','LIKE','%'.request('search').'%')
    //         //                  ->orWhere('body','LIKE','%'.request('search').'%');
    //         // }
    //     return Blog::latest()->filter()->get();
    //     // $query=Blog::latest();
    //     // $query->when(request('search'),function($query,$search){
    //     //     $query->where('title','LIKE','%'.$search.'%')
    //     //           ->orWhere('body','LIKE','%'.$search.'%');
    //     // });
    //     // return $query->get();
    // }

}
