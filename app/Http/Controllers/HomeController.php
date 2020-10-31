<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{Page};

use SEO;

class HomeController extends Controller
{
    public function index()
    {
        // For SEO
        $title = "My TDA List";

        SEO::setTitle($title);
        SEO::setDescription('Votre Todo App List pour être plus productif au quotidien!');

        return view('welcome');
    }

    public function page(Page $page)
    {
        return view('page', compact('page'));
    }
}
