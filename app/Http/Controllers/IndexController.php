<?php

namespace App\Http\Controllers;

use App\Archives;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $whereRule = [
            ['is_home', '=', 1]
        ];
        if(Auth::guest()){
            array_push($whereRule, ['is_publish', '=', 1]);
        }
        $articles = Archives::join('folder', 'archives.folder_id', '=', 'folder.folder_id')
            ->where($whereRule)
            ->select('archive_id', 'archives.folder_id', 'folder_name', 'titile', 'read_salvation', 'like', 'content', 'label', 'archives.created_at', 'archives.updated_at', 'content_html', 'is_publish')
            ->orderBy('archives.updated_at', 'desc')
            ->get();
        return view('index', [
            'articles' => $articles,
        ]);
    }
}
