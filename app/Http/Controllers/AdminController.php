<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function adminLogout()
    {
        if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
            return redirect()->route('login');
        }
        return back()->with('message','login Failed');
    }

    private function ValidateForm(Request $req)
    {
        $this->validate($req ,
            [
                'name' => 'required|min:5|max:35',
            'address' => 'required|min:5|max:50',

            'email' => 'required|email|unique:admins',

            'password' => 'required|confirmed|min:4'
            ]);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSignup()
    {
        //dd("hello");
        return view('signup');
    }

    public function getLogin()
    {

        return view('login');

    }


    public function postSignup(Request $req, Admin $admin)
    {
        $this->ValidateForm($req);
        $admin->name = $req->name;
        $admin->email = $req->email;
        $admin->address = $req->address;
        $admin->password = bcrypt($req->password);

       // dd($req->all());

        $admin->save();

        Auth::guard('admin')->login($admin);

        return redirect()->route('list')->with('message','Successful');

    }

    public function postLogin(Request $request)
    {
        $password=$request->password;
        $mail=($request->email);
        //dd($request->all());
       if( Auth::guard('admin')->attempt(['email'=>$mail,'password'=>$password]))
       {
           //dd("hello");
           return redirect()->intended(route('list'))->with('message','Login Successful');

       }
      // dd("hello2");

       return back();


    }

    public function list()
    {
        $listreq=Admin::all();
        return view('list',['listreq'=>$listreq]);
    }

    public function view($id)
    {
        $admin=admin::find($id);
        return view('view',['admin'=>$admin]);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)


    {
        $delete=Admin::find($id)->delete();
        return back()->with('message',"deleted successfully");
    }



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
        $edit=Admin::find($id);
        //$input=$request->all();
        //dd($edit);
        return view('update', ['input' => $edit]);
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
       // $this->ValidateForm($request);
        $this->validate($request ,
            [
                'name' => 'required|min:5|max:35',
                'address' => 'required|min:5|max:50',

                'email' => 'required|email',

                'password' => 'required|min:4'
            ]);
        $update=Admin::find($id);
        $update->name=$request->name;
        $update->email=$request->email;
        $update->address=$request->address;



        $update->save();

        return redirect()->route('list')->with('message',"successfully updated");

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
