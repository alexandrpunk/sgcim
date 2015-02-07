<?php

class AuthController extends BaseController {

    public function showLogin()
    {
        // Check if we already logged in
        if (Auth::check())
        {
            // Redirect to homepage
            return Redirect::to('usuarios');
        }

        // Show the login page
        return View::make('auth.login');
    }

    public function postLogin()
    {
        // Get all the inputs.
        $userdata = array(
            'email' => Input::get('email'),
            'password' => Input::get('password')
        );
         $remember = (Input::has('recordar')) ? true : false;

        // Declare the rules for the form validation.
        $rules = array(
            'email'  => 'Required',
            'password'  => 'Required'
        );

        // Validate the inputs.
        $validator = Validator::make($userdata, $rules);

        // Check if the form validates with success.
        if ($validator->passes())
        {
            // Try to log the user in.
            if (Auth::attempt($userdata, $remember))
            {
                // Redirect to homepage
                return Redirect::to('usuarios')->with('info', 'Haz iniciado sesion');
            }
            else
            {
                // Redirect to the login page.
                return Redirect::to('login')->withErrors(array('password' => 'Password invalid'))->withInput(Input::except('password'));
            }
        }

        // Something went wrong.
        return Redirect::to('login')->withErrors($validator)->withInput(Input::except('password'));
    }

    public function getLogout()
    {
        // Log out
        Auth::logout();

        // Redirect to homepage
        return Redirect::to('login')->with('info', 'Haz cerrado sesion');
    }
}