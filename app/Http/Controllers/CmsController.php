<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Cms;

class CmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        //
        $cmsData = Cms::all()->toArray();
        // $cmsData = Cms::where('title','Test')->get();
        // Use Db for sql queries :- $cmsData = DB:: select('SELECT * from cms');
        //$cmsData = Cms::orderBy('title', 'Desc')->take(1)->get(); // take(1) : For Limits of record 
        $cmsData = Cms::orderBy('created_at', 'DESC')->paginate(4); // For Pagination
        $data = array(
            'title' => 'Manage Cms',
            'cmsData' =>$cmsData,
        );
       // print_r($cmsData);
        return view('admin.cms_headers.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentData = Cms::where('parent_id', '=', '0')
        ->where('status', '=', 'Active')
        ->get();
        $data = array(
            'title' => 'Create Cms',
            'parentData' =>$parentData,
        );
        return view('admin.cms_headers.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {
       //print_r($request->get('slug')); exit;
         $this->validate($request, [
            'title'    =>  'required',
           /* 'position'    =>  'digits_between:1,2|unique:cms',*/
            'image' => 'image|nullable',
        ]);
        //$cmsRow = Cms::find($request->get('title'));

        $cmsRow = DB::table('cms')
                ->where('title', 'LIKE', '%'.$request->get('title').'%')
                ->get();  
        $Row = json_decode($cmsRow, true);
     
        if(empty($Row))
        {
            // File Upload
            if($request->hasFile('cover_image')){
                // Get filename with the extension
                $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $request->file('cover_image')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore= $filename.'_'.time().'.'.$extension;
                // Upload Image
                $path = $request->file('cover_image')->storeAs('public/images/cms', $fileNameToStore);
            } else {
                $fileNameToStore = '';
            }
            $cms = new Cms([
                'title'    =>  $request->title,
                'slug'    =>  $request->get('slug'),
               /* 'position'    =>  $request->get('position'),*/
                'description'    =>  $request->get('description'),
                'image'     =>  $fileNameToStore,
                'parent_id'     =>  $request->parent_id,
                'status'     =>  'Active',
            ]);
          
            $cms->save();
            return redirect()->route('cms.create')->with('successMsg', 'Record added successfully');            
        }
        else{
            return redirect()->route('cms.create')->with('errorMsg', 'Record Already exist');
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
        $cmsRow = Cms::find($id);
        $parentData = Cms::where('parent_id', '=', '0')
                ->where('status', '=', 'Active')
                ->get();
        $data = array(
            'title' => 'Show Cms',
        );
        return view('admin.cms_headers.show', compact('cmsRow', 'id', 'data','parentData'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function edit($id)
    {
        $cmsRow = Cms::find($id);
        $parentData = Cms::where('parent_id', '=', '0')
                        ->where('status', '=', 'Active')
                        ->get();

        // print_r($parentData); exit;
        $data = array(
            'title' => 'Update Cms',
        );
        return view('admin.cms_headers.edit', compact('cmsRow', 'id', 'data', 'parentData'));
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
            'title'    =>  'required',
           /* 'position'  =>  'digits_between:1,2',*/
            'description'    =>  'required',
            'image' => 'image|nullable',
        ]);
        $cmsRow = DB::table('cms')
                ->where('title', 'LIKE', '%'.$request->get('title').'%')
                ->where('id', '!=', $id)
                ->get();  
        $Row = json_decode($cmsRow, true);
        //print_r($Row); exit;

        if(empty($Row))
        {
            // File Upload
            if($request->hasFile('cover_image')){
                // Get filename with the extension
                $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $request->file('cover_image')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore= $filename.'_'.time().'.'.$extension;
                // Upload Image
                $path = $request->file('cover_image')->storeAs('public/images/cms', $fileNameToStore);
            } 

            $getRecord = Cms::find($id);
            $getRecord->title =  $request->get('title');
          /*  $getRecord->position =  $request->get('position');*/
            $getRecord->description =  $request->get('description');
            $getRecord->parent_id  =  $request->parent_id;

            if($request->hasFile('cover_image')){
                $getRecord->image =  $fileNameToStore;                
            }
            $getRecord->save();
            return redirect()->route('cms.edit', $id)->with('successMsg', 'Record updated successfully');
        }
        else{
            return redirect()->route('cms.edit', $id)->with('errorMsg', 'Record Already exist');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_form()
    {
        $id = decrypt($_REQUEST['id']);
        $getRecord = Cms::find($id);
        $getRecord->delete();
        Storage::delete('public/images/cms/'.$getRecord->image);
        return redirect()->route('cms.index')->with('successMsg', 'Record deleted successfully');
    }

    // CHANGE STATUS
    public function change_status()
    {
        // print_r($_POST); exit;
        $id = $_POST['_id'];
        $getRecord = Cms::find($id);
        if($getRecord->status == 'Active')
        {
            $status = 'Inactive';
        }
        else {
            $status = 'Active';
        }
        $getRecord->status =  $status;
        $getRecord->save();
        return redirect()->route('cms.index')->with('successMsg', 'Change Status successfully');
    }

}
