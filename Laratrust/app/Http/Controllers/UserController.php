<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\ConnectUserTable;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware(['role:sp_admin']);
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $data['users'] = User::orderBy('id','asc')->paginate(6);
//        return view('adminlte.adminpanel',$data);
        $data = DB::table('users')->paginate(6);
        return view('adminlte.adminpanel', ['users' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('adminlte.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $add = new ConnectUserTable();
//        $add->name = $request->name;
//        $add->email = $request->email;
//        $add->password = $request->password;
////        $add->password_confirmation = $request->password_confirmation;
//        $add->save();
        $allRequest  = $request->all();
        $addName  = $allRequest['name'];
        $addEmail = $allRequest['email'];
        $addPass = $allRequest['password'];

        //Gán giá trị vào array
        $dataInsertToDatabase = array(
            'name'  => $addName,
            'email' => $addEmail,
            'password' => Hash::make($addPass),
        );

        $insertData = DB::table('users')->insert($dataInsertToDatabase);
        return redirect()->action('UserController@index');
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
        $view = User::where('id', '=', $id)->select('*')->first();
//        return view('adminlte.viewdetails', ['user' => User::findOrFail($id)]);
        return view('adminlte.viewdetails', compact('view'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $edit = User::findOrFail($id);
         return view('adminlte.new_update', compact('edit'));
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
        $up = User::find($id);
        $up->name = $request->name;
        $up->email = $request->email;
        $up->password = Hash::make($request->password);
        $up->save();
        return redirect()->action('UserController@index');
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
        $new = User::find($id);
        $new->delete();
        return redirect()->action('UserController@index')->with('Successfully');
    }
}
