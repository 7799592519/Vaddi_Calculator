<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;


class SitemapController extends Controller
{
    public function index(){
        return response()->view('sitemap')->header('Content-Type', 'application/xml');
    }
}
