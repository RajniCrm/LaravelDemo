<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Role;
class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        //$rolesData = Role::all()->toArray();
        $rolesData = Role::where('id','<>','1')->get();
        // $rolesData = Role::find(4)->user;
        
      //  print_r($rolesData); exit;
        $data = array(
            'title' => 'Manage Roles',
            'rolesData' =>$rolesData,

        );
       // return view('admin.roles.index')->with($data);
        return view('admin.roles.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = array(
            'title' => 'Create Roles',
        );
        return view('admin.roles.create')->with($data);
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
            'title'    =>  'required',
        ]);
        //$rolesRow = Role::find($request->get('title'));
        $rolesRow = DB::table('roles')
                ->where('title', 'LIKE', '%'.$request->get('title').'%')
                ->get();  
        $Row = json_decode($rolesRow, true);
        if(empty($Row))
        {
            $roles = new Role([
                'title'    =>  $request->get('title'),
                'status'     =>  'Active',
            ]);
            $roles->save();
            return redirect()->route('roles.create')->with('successMsg', 'Record added successfully');            
        }
        else{
            return redirect()->route('roles.create')->with('errorMsg', 'Record Already exist');
        }

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
        $rolesRow = Role::find($id);

        $data = array(
            'title' => 'Update Roles',
        );
        return view('admin.roles.edit', compact('rolesRow', 'id', 'data'));
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
            'title' => 'required',
        ] );
        $getRecord = Role::find($id);
        $getRecord->title =  $request->get('title');
        $getRecord->save();
        return redirect()->route('roles.edit', $id)->with('successMsg', 'Record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   /* public function destroy($id)
    {
        //
       // print_r("adaadad"); exit;
    }*/
    public function delete_form()
    {
        $id = decrypt($_REQUEST['id']);
        $getRecord = Role::find($id);
        $getRecord->delete();
        return redirect()->route('roles.index')->with('successMsg', 'Record deleted successfully');
    }
    public function change_status()
    {
        // print_r($_REQUEST); exit;

        $id = $_POST['_id'];
        $getRecord = Role::find($id);
        if($getRecord->status == 'Active')
        {
            $status = 'Inactive';
        }
        else {
            $status = 'Active';
        }

        $getRecord->status =  $status;
        $getRecord->save();
        return redirect()->route('roles.index')->with('successMsg', 'Change Status successfully');
        
        // print_r($_POST['id']); exit;
    }
}
