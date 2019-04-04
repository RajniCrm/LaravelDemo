<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use App\User;
use App\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $userData = User::where('id','<>','1')->orderBy('id', 'Desc')->get();
        //$userData = Role::find(4)->user;
        $data = array(
            'userData' => $userData,
            'title' => 'Manage Users',
        );
        return view('admin.user.index')->with($data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = DB::table('roles')
                ->where('status', '=','Active')
                ->where('id', '!=','1')
                ->get();

        $roles = json_decode($roles);
        $title = 'Create User';

        if(auth()->user()->id != '1')
        {
            $data = array('title' => $title, 'errorMsg'=> 'Unauthorized Page',);
            return redirect('/user')->with($data);
        }
        return view('admin.user.create', compact('title','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'    =>  'required',
            'email'    =>  'required',
            'role_id'    =>  'required',
            'password'    =>  'required',
            'password_confirmation'    =>  'required',
        ]);
        $userRow = User::where('email', '=', $request->get('email'))->get();
        if(empty($userRow)){
            $user = new User;
            $user->role_id = $request->get('role_id');
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->password = Hash::make($request->get('password'));
            $user->show_password = $request->get('password');
            $user->save();
            return redirect()->route('user.index')->with('successMsg', 'Record added successfully');            
        }
        else
            return redirect()->route('user.create')->with('successMsg', 'Email id already exist');            
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
        $roles = DB::table('roles')
                ->where('status', '=','Active')
                ->where('id', '!=','1')
                ->get();

        $roles = json_decode($roles);
        $title = 'Update User';
        $userRow = User::find($id);
        $data = array(
            'title' => $title,
            'roles' => $roles,
            'userRow' => $userRow,
        );

        if(auth()->user()->id != '1')
        {
            $data = array('title' => $title, 'errorMsg'=> 'Unauthorized Page',);
            return redirect('/user')->with($data);
        }
        return view('admin.user.edit')->with($data);
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
        $this->validate($request, [
            'name' => 'required|string|max:255',
        ] );
        $getRecord = User::find($id);
        $getRecord->name =  $request->get('name');
        $getRecord->save();
        return redirect()->route('user.index')->with('successMsg', 'Record updated successfully');    
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
        //print_r($id); exit;
    }


    public function delete_form()
    {

        if(auth()->user()->id != '1')
        {
            $data = array('errorMsg'=> 'Unauthorized Page',);
            return redirect('/user')->with($data);
        }

        $id = decrypt($_REQUEST['id']);
        $getRecord = User::find($id);
        $getRecord->delete();
        return redirect()->route('user.index')->with('successMsg', 'Record deleted successfully');
    }
    public function change_status()
    {
        if(auth()->user()->id != '1')
        {
            $data = array('errorMsg'=> 'Unauthorized Page',);
            return redirect('/user')->with($data);
        }
        $id = $_POST['_id'];
        $getRecord = User::find($id);
        if($getRecord->status == 'Active')
        {
            $status = 'Inactive';
        }
        else {
            $status = 'Active';
        }
        $getRecord->status =  $status;
        $getRecord->save();
        return redirect()->route('user.index')->with('successMsg', 'Change Status successfully');
    }

}
