<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FileController extends Controller
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
        //Check to see if the user is actually logged in.
        if (\Auth::check())
        {
             $user = \Auth::user();
            $uid = \Auth::user()->id;
            $errors = false;
            $data = $request;
            
            //Input Rules for processing the HTML Form data
            $rules = [
                'file'     => 'required',
            ];

            //Validate the input for all of the fields.
            $this->validate($data, $rules);

            //If there are no error skip, returning them
            //If errors are found return the infomation as well as the information
            //filled out to the previous form.
            if ($errors != false) {
                if ($errors->fails())
                {
                    return redirect()->back()->withInput()->withErrors($errors);
                }
            }

            //Construct the search query field
            $dt = date("Y-m-d");
            $sd = date('m.d.Y');
            $month = date("F");

            //For each files upload create an entry in the File table and
            //move the uploaded file to the proper directory.
            if ($request->file[0] != null)
            {
                $ufiles = $request->file;
                foreach ($ufiles as $file) 
                {    
                    $name = $file->getClientOriginalName();
                    $filetype = $file->getClientOriginalExtension();
                    $newfilename = time() . $name;
                    //Populate the search query
                    $t_name = $newfilename . ' ' . $name . ' ' . $filetype;
                    $t_tags = str_replace(',', ' ', $request->file_tags);
                    $search_query = $t_name . ' ' . $t_tags;

                    $newfile = \App\Files::create([
                        'user_id'               => $user['id'],
                        'file_tags'             => $request->file_tags,
                        'file_name'             => $name,
                        'file_true_name'        => $newfilename,
                        'file_extension'        => $filetype,
                        'file_date'             => $dt,
                        'search_query'          => $search_query
                        ]);
                    $file->move(public_path().'/files/', $newfilename);
                }
            }
                                        
           
            $search = '';
            $files = \App\Files::paginate(25);
            $success = 'Your file has been uploaded.';
            return redirect('dashboard/files/main')->with(compact('user', 'files', 'search','success'));
            }
            else
            {
                return view('errors.autherror');
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
         //This is for deleting a single picture from a listing
        //First we must specify the listing picture we would like to delete
         $file = \App\Files::find($id);


         //Remove the picture from physical storage.
         unlink(public_path() . '/files/' . $file->file_true_name);

         //Save the changes to the listing and delete the record for the picture from the
         //database.
         $user = \Auth::user();
         $uid = \Auth::user()->id;
         $search= '';
         $file->delete();
         $success = 'File was successfully deleted.';
         $files = \App\Files::paginate(25);
         return redirect('dashboard/files/main')->with(compact('user', 'files', 'search','success'));
    }
}
