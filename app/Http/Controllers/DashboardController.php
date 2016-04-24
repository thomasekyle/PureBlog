<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class DashboardController extends Controller
{
    ///////////////////////////////////////////////////////////
    //
    // User Dashboard Routes. Any user of the System can see these.
    //
    /////////////////////////////////////////////



    //The main page of the dashboard
    public function getDashboard()
    {
     if (\Auth::check()) //Check to see if the user is logged in.
    {
        $user = \Auth::user();
        $uid = \Auth::user()->id;
        $search = '';
        $posts = \App\Posts::orderBy('id', 'desc')->paginate(5);
        return view('dashboard.main', compact('user', 'posts', 'search'));
    }
    else
    {
        return view('errors.autherror');
    }
    }

    public function getPosts()
    {
     if (\Auth::check()) //Check to see if the user is logged in.
    {
        $user = \Auth::user();
        $search = '';
        $posts = \App\Posts::orderBy('id', 'desc')->paginate(15);
        return view('dashboard.posts.main', compact('user', 'posts', 'search'));
    }
    else
    {
        return view('errors.autherror');
    }
    }

    public function getFiles()
    {
     if (\Auth::check()) //Check to see if the user is logged in.
    {
        $user = \Auth::user();
        $search = '';
        $files = \App\Files::orderBy('id', 'desc')->paginate(25);
        return view('dashboard.files.main', compact('user', 'files', 'search'));
    }
    else
    {
        return view('errors.autherror');
    }
    }

    //The Page for the currently logged in user's profile
    public function getProfile()
    {
        if (\Auth::check()) //Check to see if the user is logged in.
    {
        $user = \Auth::user();
        return view('dashboard.profile', compact('user'));
    }
    else
    {
        return view('errors.autherror');
    }
    }

    ///////////////////////////////////////////////////////////
    //
    // Admin Dashboard Routes. Only Admins of the System can see these.
    //
    /////////////////////////////////////////////

    //Page to change or update the site settings
    public function getSettings()
    {
        if (\Auth::check())
        {
            $user = \Auth::user();
            $settings = \App\Settings::find(1);
            return view('dashboard.settings.main' ,compact('settings', 'user'));
        }
        else
        {
            return view('errors.autherror');
        }
    }

    //Users page. Admins may add or update user profiles and passwords
    public function getUsers()
    {
        if (\Auth::check())
    {
        $search = '';
        $user = \Auth::user();
         $users = User::paginate(15);
        return view('dashboard.users.main' ,compact('users', 'user', 'search'));
    }
    else
    {
        return view('errors.autherror');
    }
    }

    
}
