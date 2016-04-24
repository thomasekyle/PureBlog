<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
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
        //
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
        //Set errors to false until all input is validated.
        $errors = false;

        $data = $request;
        if (\Auth::check())
        {
             //Input Rules for processing the HTML Form data
            $rules = [
                'blog_name'              => 'required',
                'blog_phone_number'      => 'digits_between:10,11',
                'blog_email'             => 'email',
                'blog_facebook'          => 'url',
                'blog_twitter'           => 'url',
                'blog_linkedin'          => 'url',
                'blog_instagram'         => 'url',
                'blog_github'            => 'url'
            ];

            $this->validate($data, $rules);
            if ($errors != false) {
                if ($errors->fails())
                {
                    //return \Redirect::back()->withInput()->withErrors($validator);
                    return redirect()->back()->withInput()->withErrors($errors);
                }
            }
            $settings = \App\Settings::find($id);
            $settings->blog_name = $request['blog_name'];
            $settings->blog_description = $request['blog_description'];
            $settings->blog_phone_number = $request['blog_phone_number'];
            $settings->blog_email = $request['blog_email'];
            $settings->blog_facebook = $request['blog_facebook'];
            $settings->blog_twitter = $request['blog_twitter'];
            $settings->blog_linkedin = $request['blog_linkedin'];
            $settings->blog_instagram = $request['blog_instagram'];
            $settings->blog_github = $request['blog_github'];
            $settings->save();
            return redirect()->action('DashboardController@getSettings');
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
    public function destroy($id)
    {
        //
    }
}
