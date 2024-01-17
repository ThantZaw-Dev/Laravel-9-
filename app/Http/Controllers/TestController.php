<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $subCategories = [
           [ "name" => "Zune","myn"=>"Myanmar","eng" => "English"],
        ];
        $categories = ["Math", "Science", "English", "Myanamr"];
        return view('test', compact('subCategories','categories'));
    }
}
