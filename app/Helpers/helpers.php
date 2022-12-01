<?php
use Illuminate\Support\Facades\Auth;
if (! function_exists('checkRole')) {
    function checkRole()
    {
        if(Auth::user()->role == "admin"){
            return true;
        }
        return false;
    }
}