<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = 'Manage Categories';
        $getRecords = Category::all()->toArray();
        $data = array(
            'title' => $title,
            'getRecords' => $getRecords,
        );
        return view('admin.category.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Category';
        return view('admin.category.create', compact('title'));
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
        $catRow = DB::table('categories')
                ->where('title', 'LIKE', '%'.$request->get('title').'%')
                ->get();  
        $Row = json_decode($catRow, true);
        if(empty($Row))
        {
            $roles = new Category([
                'title'    =>  $request->get('title'),
                'created_by' => auth()->user()->id,
                'status'     =>  'Active',
            ]);
            $roles->save();
            return redirect()->route('category.create')->with('successMsg', 'Record added successfully');            
        }
        else{
            return redirect()->route('category.create')->with('errorMsg', 'Record Already exist');
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
        $rolesRow = Category::find($id);

        $data = array(
            'title' => 'Update Category',
        );
        return view('admin.category.edit', compact('rolesRow', 'id', 'data'));
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
        $getRecord = Category::find($id);
        $getRecord->title =  $request->get('title');
        $getRecord->save();
        return redirect()->route('category.edit', $id)->with('successMsg', 'Record updated successfully');
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
        $getRecord = Category::find($id);
        $getRecord->delete();
        return redirect()->route('category.index')->with('successMsg', 'Record deleted successfully');
    }
    public function change_status()
    {
        // print_r($_REQUEST); exit;

        $id = $_POST['_id'];
        $getRecord = Category::find($id);
        if($getRecord->status == 'Active')
        {
            $status = 'Inactive';
        }
        else {
            $status = 'Active';
        }

        $getRecord->status =  $status;
        $getRecord->save();
        return redirect()->route('category.index')->with('successMsg', 'Change Status successfully');
        
        // print_r($_POST['id']); exit;
    }

}
