<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/#/users';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'image' => ['required', 'image'],
            'description' => ['required', 'min:3', 'max:500']

        ]);
    }

    

    /**
     * Create a new user instance after a valid registration.
     *
     * 
     *     @param  array  $data
    * @return \App\User
     */
    protected function create(array $data)
    {

        $request = request();

        $image = $request->file('image');
        $imageSavedName = time() . "." . $image->getClientOriginalExtension();

        $upload_path = 'images/';

        // BELOW IS FOR THE DB COLUMN VALUE
        $image_url = $upload_path  . $imageSavedName;

        $success = $image->move($upload_path, $imageSavedName);

        // dd($image->getClientOriginalExtension());

        // $test = request('image');
        // dd($test);

        // ORIGINAL SYNTAX
        // $image = $request->file("image");
        // $input['imagename'] = time() . "." . $image->getClientOriginalExtension();
        // $destinationPath = public_path('/images');
        // $image->move($destinationPath, $input['imagename']);

        // $image = $data["image"];
        // $input['image'] = time() . "." . $image['originalName'];
        // $destinationPath = public_path('/images');
        // $image->move($destinationPath, $input['image']);

        



        // Below is storing Testing images in the DB
        // $store = new imagestest();
        // $store->filepath = "images/" . $input['imagename'];
        // $store->save();

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'image' => $image_url,
            'description' => $data['description']

            // time() . "." . $image->getClientOriginalExtension()
        ]);
    }
}
