<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cms;

class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth', ['except'=>['index','about','contact']]); // AUTHENTICATION FOR GIVEN FUNCTIONS ONLY NOT FOR CREATE, UPDATE, DELETE & SERVICES
    }*/

    public function index()
    {
    	return view('pages.index');
    }

    // FOR DYNAMIC PAGES SHOW ON THE WEBSITE
    public function slug($slug)
    {
        $services = array();
        if($slug == 'services')
        {
            $services = ['Development', 'SEO', 'Testing', 'Data Analyst'];
        }
     
        $getCmsData = Cms::orderBy('position')
                        ->where('status', '=', 'Active')
                        ->where('slug', '=', $slug)->get();

        $data = array(
            'services' => $services,
            'getCmsData' => $getCmsData,
            'title' => $getCmsData[0]['title'],
            'slug' => $getCmsData[0]['slug'],
            'description' => $getCmsData[0]['description'],
            'image' => $getCmsData[0]['image'],
        );
        return view('pages.slug')->with($data);
        //return redirect('pages');
    }

    
    public function about()
    {
    	$title = 'About Us Page';
    	//return view('pages.about', compact('title')); // first way to load variable
    	return view('pages.about')->with('title', $title);  // second way to load variable
    }
    public function services()
    {
    	$data = array(
    		'title' => 'Our Service Page',
    		'serviceData' => ['Development', 'SEO', 'Testing', 'Data Analyst'],
    	);
    	return view('pages.services')->with($data);
    }
    public function contact()
    {
    	$title = 'Contact Us Page';
    	return view('pages.contact', compact('title'));
    }
}
