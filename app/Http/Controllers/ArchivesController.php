<?php

namespace App\Http\Controllers;

use App\Archives;
use App\Folder;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
                ->where('is_publish', '=', 1)
                ->select('archive_id', 'archives.folder_id', 'folder_name', 'titile', 'read_salvation', 'like', 'archives.created_at', 'is_home')
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

        $firstRead = false;
        //存储ID,用于判断是否为同一个人阅读
        if($request->session()->has('user.read.'.$request->id) == null){
            $request->session()->put('user.read.'.$request->id, true);
            $firstRead = true;
        }

        $whereRule = [
            ['archive_id', '=', $request->id]
        ];
        if(Auth::guest()){
            array_push($whereRule, ['is_publish', '=', 1]);
        }
        $article = Archives::join('folder', 'archives.folder_id', '=', 'folder.folder_id')
            ->where($whereRule)
            ->select('archive_id', 'archives.folder_id', 'folder_name', 'titile', 'read_salvation', 'like', 'content', 'label', 'archives.created_at', 'archives.updated_at', 'is_publish', 'content_html')
            ->first();
        //增加阅读量
        if($firstRead){
            $article->read_salvation = intval($article->read_salvation) + 1;
            $article->save();
        }
        $data = $article->toArray();
        $data['label'] = json_decode($data['label']);
        //查询评论数据
        $data['comments'] = Message::where('archive_id', '=', $article->archive_id)
            ->get()->toArray();
        //dd($data['comments']);
        //没有权限查看
        if(empty($data)){
            return view('errors.default',[
                'errorCode' => '0618',
                'errorMsg' => '您没有权限查看该文章',
            ]);
        }
        return view('article', [
            'data' => $data,
        ]);
    }

    public function articleEdit($id = null, Request $request){
        $article = null;
        if($id != null){
            $article = Archives::join('folder', 'archives.folder_id', '=', 'folder.folder_id')
                ->where('archive_id', '=', $id)
                ->select('archive_id', 'archives.folder_id', 'titile', 'content', 'label', 'is_publish')
                ->first();
            $labels = json_decode($article->label);
            $article->label = join(',', $labels);
        }

        if($request->isMethod('get')){
            $folders = Folder::all();
            return view('article_edit', [
                'folders' => $folders,
                'article' => $article,
            ]);
        }elseif($request->isMethod('post')){
            if($article == null){
                $article = new Archives();
            }
            $article->folder_id = intval($request->article_folder);
            $article->titile = $request->article_title;
            $article->content = $request->get('article-editormd-markdown-doc');
            $article->label = json_encode(explode(',', $request->article_lable));
            $article->content_html = $request->get('article-editormd-html-code');
            if($request->submit_type == 'save'){
                $article->is_publish = 0;
            }elseif ($request->submit_type == 'publish'){
                $article->is_publish = 1;
            }
            if($article->save()){
                return redirect(route('article', 'article', 'id='.($article->archive_id)));
            }else{
                return view('errors.default',[
                    'errorCode' => '777',
                    'errorMsg' => '运气有点差，文章数据存储失败!',
                ]);
            }
        }
    }

    public function articleDelete($id, Request $request){
        $article = Archives::find($id);
        if($article == null){
            return view('errors.default',[
                'errorCode' => '0618',
                'errorMsg' => '运气有点差，找不到你要删除的文章!',
            ]);
        }else{
            $article->delete();
            return redirect()->back();
        }
    }

    public function message($id, Request $request){
        //验证规则
        $rules = array(
            'msgName'=>'required|max:20',
            'msgEmail' => 'required|email|max:255',
            'msgContent' => 'required|max:500'
        );
        //错误消息
        $message = array(
            'required'=>':attribute 必须填写',
            'email'=>':attribute 必须符合邮箱地址格式',
            'msgName.max' => ':attribute 不能超过20个字符',
            'msgEmail.max' => ':attribute 不能超过255个字符',
            'msgContent.max' => ':attribute 不能超过500个字符',
        );
        //字段意义
        $meaning = array(
            'msgName'=>'姓名',
            'msgEmail'=>'邮箱地址',
            'msgContent'=>'留言内容',
        );
        //表单验证
        $this->validate($request, $rules, $message, $meaning);

        $message = new Message();
        $message->user_name = $request->msgName;
        $message->email = $request->msgEmail;
        $message->content = $request->msgContent;
        if(Archives::where([
            ['archive_id', '=', $id]
        ])->first() == null){
            return view('errors.default',[
                'errorCode' => '0618',
                'errorMsg' => '文章ID不存在!',
            ]);
        }
        $message->archive_id = $id;
        if($message->save()){
            return redirect()->back();
        }else{
            return view('errors.default',[
                'errorCode' => '0618',
                'errorMsg' => '评论发表失败!',
            ]);
        }
    }


    public function showHome($id){
        $article = Archives::find($id);
        $article->is_home = 1;
        if($article->save()){
            return redirect()->back();
        }else{
            return view('errors.default',[
                'errorCode' => '0618',
                'errorMsg' => '设置到首页失败!',
            ]);
        }
    }

    public function hideHome($id){
        $article = Archives::find($id);
        $article->is_home = 0;
        if($article->save()){
            return redirect()->back();
        }else{
            return view('errors.default',[
                'errorCode' => '0618',
                'errorMsg' => '取消设置到首页失败!',
            ]);
        }
    }
}
