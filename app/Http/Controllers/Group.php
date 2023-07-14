<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Group extends Controller
{
    private $group;
    private $bot;
    function __construct($group, $bot)
    {
        $this->group = $group;
        $this->bot = $bot;
    }
    
}
