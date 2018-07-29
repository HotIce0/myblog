<?php

namespace App\Http\Controllers;

use App\Folder;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('home');
        return view('admin');
    }

    public function folderManage(Request $request){
        return view('admin_folder');
    }

    public function getFolders(Request $request){
        $count = Folder::count();
        $folders = Folder::select('folder_id', 'folder_name')
            ->offset(($request->page - 1) * $request->limit)
            ->limit($request->limit)
            ->get();
        return response()->json([
            'code' => 0,
            'count' => $count,
            'data' => $folders->toArray()
        ]);
    }
    public function editFolder(Request $request){
        //表单验证
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:folder,folder_id',
            'name' => 'required|max:50|string',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'code' => 1,
                'msg' => '分类名称必须填写，并且不能超过50个字符!',
            ]);
        }
        //查找记录
        $folder = Folder::find($request->id);
        $folder->folder_name = $request->name;
        //完成修改
        if($folder->save())
            return response()->json([
                'code' => 0,
                'msg' => '修改分类名成功!',
            ]);
        else
            return response()->json([
                'code' => 1,
                'msg' => '修改分类名失败!',
            ]);
    }

    public function addFolder(Request $request){
        $folder = new Folder();
        $folder->folder_name = '请修改分类名称';
        if($folder->save())
            return response()->json([
                'code' => 0,
                'msg' => '添加分类名成功!',
            ]);
        else
            return response()->json([
                'code' => 1,
                'msg' => '添加分类名失败!',
            ]);
    }

    public function deleteFolder(Request $request){
        //表单验证
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:folder,folder_id',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'code' => 1,
                'msg' => '删除失败，该分类记录不存在!',
            ]);
        }
        //查找记录
        $folder = Folder::find($request->id);
        //完成删除
        if($folder->delete())
            return response()->json([
                'code' => 0,
                'msg' => '删除分类名成功!',
            ]);
        else
            return response()->json([
                'code' => 1,
                'msg' => '删除分类名失败!',
            ]);
    }


    public function msgManage(){
        return view('admin_msg');
    }

    public function getMsgs(Request $request){
        $count = Message::count();
        $messages = Message::join('archives', 'message.archive_id', '=', 'archives.archive_id')
            ->select('message_id', 'message.archive_id', 'user_name', 'email', 'message.content', 'message.created_at', 'titile')
            ->offset(($request->page - 1) * $request->limit)
            ->limit($request->limit)
            ->get();
        return response()->json([
            'code' => 0,
            'count' => $count,
            'data' => $messages->toArray()
        ]);
    }

    public function deleteMsg(Request $request){
        //表单验证
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:message,message_id',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'code' => 1,
                'msg' => '删除失败，该留言记录不存在!',
            ]);
        }
        //查找记录
        $msg = Message::find($request->id);
        //完成删除
        if($msg->delete())
            return response()->json([
                'code' => 0,
                'msg' => '删除留言记录成功!',
            ]);
        else
            return response()->json([
                'code' => 1,
                'msg' => '删除留言记录失败!',
            ]);
    }
}
