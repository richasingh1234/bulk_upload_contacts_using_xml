<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Session;
use Redirect;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts=Contact::latest()->simplePaginate(10);
        $total_contacts= Contact::get()->count();
        return view('contact_list',compact('contacts','total_contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->hasFile('xmlfile')){
            $file = $request->file('xmlfile');
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('/xml'),$file_name);
            $image_path = "/xml/" . $file_name;
        }

        $xmlString = file_get_contents(public_path('xml/'.$file_name));
        $xmlObject = simplexml_load_string($xmlString);          
        $json = json_encode($xmlObject);
        $phpArray = json_decode($json, true);
        $contacts= $phpArray['contact'];
        foreach($contacts as $contact){
            $data = [
                'name' => $contact['name'], 
                'lastName' => $contact['lastName'], 
                'phone' => $contact['phone'], 
            ];
            $contactInsert=Contact::create($data);
        }
        if($contactInsert){
            Session::flash('message','Recorded Inserted');
            return Redirect::to('/contact');
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
        $contact=Contact::where('id',$id)->first();
        return view('edit',compact('contact'));
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
        $data = [
             'name' => $request->fname,
             'lastName' => $request->lname,
             'phone' => $request->phone,
        ];
        $contactUpdate=Contact::where('id',$id)->update($data);
        if($contactUpdate){
            Session::flash('message','Recorded Updated');
            return Redirect::to('/contact');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact=Contact::where('id',base64_decode($id))->delete();
        if($contact){
            Session::flash('message','Recorded Deleted');
            return Redirect::to('/contact');

        }
    }
}
