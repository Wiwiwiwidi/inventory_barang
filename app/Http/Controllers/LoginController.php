<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
        public function login()
        {
            return view('login.login');
        }

        public function postlogin(Request $request){
            // dd($request->all());
            if (Auth::attempt($request->only('email','password'))){
                return redirect('/beranda');
            }
            return redirect('/login')->with('error','Email atau Password anda salah!!');
        }
    

        public function logout(Request $request){
            Auth::logout();
            Session::flush();
            return redirect('/login')->with('error','Anda telah Keluar!');

        }
          
        public function registrasi()
        {
            return view('login.registrasi');
        }
        public function simpanregistrasi(Request $request){
            // dd($request->all());
            $messages = [
                'required' => 'Data Tidak boleh kosong!',
                'min'=> 'Password Harus diisi minimal 8 karakter',
                'unique'=>'Email tersebut sudah ada/terdaftar',
            ];
    
            $this->validate($request,[
                'name'      => 'required|string|max:20',
                'email' => 'required|email|unique:users',
                'password'  => 'required|string|min:8',
            ],$messages);

            $insert= User::create([
                'name'=> $request->name,
                'level'=> 'karyawan',
                'email'=> $request->email,
                'password'=> bcrypt($request->password),
                'remember_token' => Str::random(60),            
            ]);

            return redirect('/login')->with('success','Berhasil Registrasi!!');

        }


        
        
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
