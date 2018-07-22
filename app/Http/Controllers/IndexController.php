<?php

namespace App\Http\Controllers;

use App\Archives;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $articles = Archives::join('folder', 'archives.folder_id', '=', 'folder.folder_id')
        ->where([
            ['is_home', '=', 1],
            ['is_publish', '=', 1]
        ])->select('archive_id', 'archives.folder_id', 'folder_name', 'titile', 'read_salvation', 'like', 'content', 'label', 'archives.created_at', 'archives.updated_at', 'content_html')
            ->get();
        return view('index', [
            'articles' => $articles,
        ]);
    }
}
