<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\imagestest;
use App\Post;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function imageUpload(Request $request){
        // dd($request);

        $image = $request->file("image");
        $input['imagename'] = time() . "." . $image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $input['imagename']);

        // Below is storing Testing images in the DB
        $store = new imagestest();
        $store->filepath = "images/" . $input['imagename'];
        $store->save();
    }

    public function postUpload(){

        // dd(Auth::user()->id);

        request()->validate([
            'postTitle' => ['required','min:3','max:50'],
            'postDescription' => ['required', 'max:255']
        ]);


        // $post = new Post();

        // $userID = Auth::user()->id;


        // $input->user_id = $userID;
        // $input->postTitle = request('postTitle');
        // $input->postDescription = request('postDescription');
        // $input->save();

        Post::create([
            'user_id' => Auth::user()->id,
            'postTitle' => request('postTitle'),
            'postDescription' => request('postDescription')
        ]);


        return redirect('/#/posts');

    }
}
