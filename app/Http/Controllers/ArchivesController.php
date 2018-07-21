<?php

namespace App\Http\Controllers;

use App\Archives;
use App\Folder;
use function Couchbase\defaultDecoder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;

class ArchivesController extends Controller
{
    /**
     * 时间线查看存档
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        //验证规则
        $rules = array(
            'year'=>'required|date_format:Y',
        );
        //错误消息
        $message = array(
            'required'=>'必须填写',
            'date_format'=>'年格式不正确'
        );
        //字段意义
        $meaning = array(
            'year'=>'年',
        );
        //表单验证
        $this->validate($request, $rules, $message, $meaning);
        //查询当年的所有文章
        $data = array();
        $data['year'] = $request->year;
        for ($month = 1; $month <= 12; $month++){
            $temp = $archivesQuery = Archives::join('folder', 'archives.folder_id', '=', 'folder.folder_id')
                ->latest('archives.created_at')
                ->select('archive_id', 'archives.folder_id', 'folder_name', 'titile', 'read_salvation', 'like', 'archives.created_at')
                ->whereYear('archives.created_at', $request->year)
                ->whereMonth('archives.created_at', $month)->get();
            if(!$temp->isEmpty()){
                $data[$month] = $temp->toArray();
            }
        }
        return view('archives', [
            'data' => $data,
        ]);
    }

    public function article(Request $request){
        //验证规则
        $rules = array(
            'id'=>'required|exists:archives,archive_id',
        );
        //错误消息
        $message = array(
            'required'=>':attribute 必须填写',
            'exists'=>':attribute 无效'
        );
        //字段意义
        $meaning = array(
            'id'=>'文章ID',
        );
        //表单验证
        $this->validate($request, $rules, $message, $meaning);

        $data = Archives::join('folder', 'archives.folder_id', '=', 'folder.folder_id')
            ->where('archive_id', '=', $request->id)
            ->select('archive_id', 'archives.folder_id', 'folder_name', 'titile', 'read_salvation', 'like', 'content', 'label', 'archives.created_at', 'archives.updated_at')
            ->get()
            ->toArray();
        return view('article', [
            'data' => $data[0],
        ]);
    }

    public function articleEdit(Request $request){
        $folders = Folder::all();
        return view('article_edit', [
            'folders' => $folders,
        ]);
    }
}
