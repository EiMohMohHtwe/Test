<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illumination\Support\Facades\URL;
use Illumination\Support\Facades\DB;

class RegisterController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userdata = User::all()->toArray();
        return view('register.profile',compact('userdata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'age' => ['required','integer'],
            'birthday' => ['required','integer'],
            'address' => ['required', 'string', 'max:100'],
            'phone' => ['required','integer'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    
        $newUser = new User();
        $newUser->fill($request->all());
        $newUser->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('register.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'age' => ['required','integer'],
            'birthday' => ['required','integer'],
            'address' => ['required', 'string', 'max:100'],
            'phone' => ['required','integer'],
        ]);

        $users = User::find($id);
        $user->fill($request->all());
        $users->save();

        return redirect()->back();
    }
}
