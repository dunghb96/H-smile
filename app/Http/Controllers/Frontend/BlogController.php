<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\Service;

class BlogController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $blog = Blog::orderBy('created_at', 'DESC')->paginate();
        return view('frontend.blog.index', compact('blog'));
    }
    public function get($id)
    {
        $blog = Blog::find($id);
        $blogAll = Blog::all()->random(4);
        return view('frontend.blog.detail', compact('blog', 'blogAll'));
    }
}
