<?php

namespace App\Http\Controllers;




class Home extends Controller
{
    public function send()
    {
        sendNotification("what", "6285757399827");
    }
}
