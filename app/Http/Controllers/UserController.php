<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use Storage;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (\Auth::check()) //Check to see if the user is logged in.
        {
            $user = \Auth::user();
            return view('dashboard.users.new', compact('user'));
        }
        else
        {
            return view('errors.autherror');
        }
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (\Auth::check()) //Check to see if the user is logged in.
        {
            $errors = false;
            $data = $request;
            //Input Rules for processing the HTML Form data
            $rules = [
                'email'         => 'required|email|unique:users',
                'password'      => 'required|confirmed|min:8',
                'author_name'   => 'required',
                'birthday'      => 'date',
                'phone_number'  => 'digits_between:10,11',
                'description'   => 'max:255'
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

            \App\User::create([
                'email'         => $request['email'],
                'password'      => bcrypt($request['password']),
                'author_name'   => $request['author_name'],
                'create'        => $request['create'],
                'edit'          => $request['edit'],
                'delete'        => $request['delete'],
                'admin'         => $request['admin'],
                'birthday'      => $request['birthday'],
                'phone_number'  => $request['phone_number'],
                'description'   => $request['description'],
            ]);
            $success = 'User was successfully created!';
            return redirect()->action('DashboardController@getUsers')->with(compact('success'));
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
        if (\Auth::check()) //Check to see if the user is logged in.
        {
            $user = \Auth::user();
            $useredit = \App\User::find($id);
            return view('dashboard.users.edit', compact('user', 'useredit'));
        }
        else
        {
            return view('errors.autherror');
        }
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

          if (\Auth::check())
        {
            $errors = false;
            $data = $request;
        
            //Input Rules for processing the HTML Form data
            $rules = [
                'email'         => 'required|email',
                'author_name'   => 'required',
                'birthday'      => 'date',
                'phone_number'  => 'digits_between:10,11',
                'description'   => 'max:255'
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
            

            $edituser = \App\User::find($id);
            $edituser->email        = $request['email'];
            $edituser->author_name  = $request['author_name'];
            $edituser->create       = $request['create'];
            $edituser->edit         = $request['edit'];
            $edituser->delete       = $request['delete'];
            $edituser->admin        = $request['admin'];
            $edituser->birthday     = $request['birthday'];
            $edituser->description  = $request['description'];
            
            $edituser->save();
            $success = 'User was successfully created!';
            return redirect()->action('DashboardController@getUsers')->with(compact('success'));
        }
        else
        {
            return view('errors.autherror');
        }
    }



       public function changePassword($id)
    {
        
          if (\Auth::check())
        {
            $useredit = \App\User::find($id);
            return view('dashboard.users.password', compact('user', 'useredit'));
        }
        else
        {
            return view('errors.autherror');
        }
    }

    public function updatePassword(Request $request, $id)
    {

            if (\Auth::check())
        {
            $useredit = \App\User::find($id);
            $errors = false;
            $data = $request;

            //Input Rules for processing the HTML Form data
            $rules = [
                'entered_password'         => 'required',
                'password'                 => 'required|confirmed',
                'password_confirmation'    => 'required'
            ];

            //Validate the input for all of the fields.
            $this->validate($data, $rules);


            if (Hash::check($data['entered_password'], $useredit->password) != true) {
                $errors = 'The password you entered does not match the current password.';
                return redirect()->back()->withInput()->withErrors($errors);
            }
            //If there are no error skip, returning them
            //If errors are found return the infomation as well as the information
            //filled out to the previous form.
            if ($errors != false) {
                if ($errors->fails())
                {
                    return redirect()->back()->withInput()->withErrors($errors);
                }
            }
            

            
            $useredit->password = bcrypt($request['password']);
            
            $useredit->save();
            $success = 'Password was successfully created!';
            return view('dashboard.users.edit', compact('id', 'user', 'useredit'));
        }
        else
        {
            return view('errors.autherror');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //Delete the user with the specified id.
        //If the user has any properties that are in their name you will be able to transfer
        //to another user or delete them.
        $user = \App\User::find($id);
        $ulistings = DB::select('select * from listings where user_id =' . $id, [1]);

        if ($transfer != 0)
        {
            //transfer other listing to another user
            foreach ($ulisting as $ul)
            {
                $ul->user_id = $request->tid;
                $ul->save();
            }
        }
        else
        {
            //Delete all the listing that this user made.
            foreach ($ulistings as $ul)
            {
                $filenames = DB::select('select * from listing_pictures where listing_id =' . $ul->id, [1]);
                return view($filenames);
                //Delete the files found in storage with the associated filenames
                Storage::delete($filenames);
       
                //Delete the records in the ListingPics table associated with the particular listing
                DB::table('listing_pictures')->whereIn('listing_id', $listing['id'])->delete(); 

                //Delete the listing from the database.
                $ul->delete();
            }
        }


        $user->delete();
        return redirect()->action('DashboardController@getUsers'); 
    }
}
