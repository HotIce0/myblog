<?php

namespace App\Http\Controllers;

use App\Archives;
use function Couchbase\defaultDecoder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;

class ArchivesController extends Controller
{
    public function index()
    {
        $year = 2018;
        //查询今年的所有文章

        $data = array();
        $data['year'] = $year;
        for ($month = 1; $month <= 12; $month++){
            $temp = $archivesQuery = Archives::join('folder', 'archives.folder_id', '=', 'folder.folder_id')
                ->latest('archives.created_at')
                ->select('archive_id', 'archives.folder_id', 'folder_name', 'titile', 'read_salvation', 'like', 'archives.created_at')
                ->whereYear('archives.created_at', $year)
                ->whereMonth('archives.created_at', $month)->get();
            if(!$temp->isEmpty()){
                $data[$month] = $temp->toArray();
            }
        }
        return view('archives', [
            'data' => $data,
        ]);
    }
}
