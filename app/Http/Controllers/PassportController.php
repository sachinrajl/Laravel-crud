<?php

namespace App\Http\Controllers;

use App\Passport;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;
use Redirect;

class PassportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $passports = Passport::all();
        return view('index', compact('passports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create-old');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
         'name'       => 'required',
         'email'      => 'required|email',
         'number' => 'required|numeric'
     ]);

        // process to upload file        
        $fileToUpload = "";
        if ($request->hasfile('filename')) {
            $file = $request->file('filename');
            $fileToUpload = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/images/', $fileToUpload);
        }

        $passport = new Passport;
        $passport->name = $request->get('name');
        $passport->email = $request->get('email');
        $passport->number = $request->get('number');
        $date = date_create($request->get('date'));
        $format = date_format($date, "Y-m-d");
        $passport->date = strtotime($format);
        $passport->office = $request->get('office');
        $passport->filename = $fileToUpload;
        $passport->save();

        // return back();
        return redirect('passports')->with('success', 'Information has been added');
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
        $passport = Passport::find($id);
        return view('edit', compact('passport', 'id'));
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
        $validatedData = $request->validate([
           'name'       => 'required',
           'email'      => 'required|email',
           'number' => 'required|numeric'
       ]);

        // process to upload file        
        $fileToUpload = "";
        if ($request->hasfile('filename')) {
            $file = $request->file('filename');
            $fileToUpload = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/images/', $fileToUpload);
        }
        if(empty($fileToUpload)){
            $fileToUpload = $request->get('hidden_filename');
        }
        
        $passport = Passport::find($id);
        $passport->name = $request->get('name');
        $passport->email = $request->get('email');
        $passport->number = $request->get('number');
        $passport->office = $request->get('office');
        $passport->filename = $fileToUpload;
        $passport->save();
        return redirect('passports')->with('success', 'Information has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $passport = Passport::find($id);
        $passport->delete();
        return redirect('passports')->with('success','Information has been  deleted');
    }
}
