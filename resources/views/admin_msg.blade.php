@extends('layouts.layout_admin')

@section('head-extend')
@endsection

@section('content')
    <table class="layui-hide" id="msg-table-id" lay-filter="msg-table-filter"></table>
@endsection

@section('script-extend')
    <script type="text/html" id="barMsg">
        <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
    </script>

    <script>
        var table = layui.table;
        var $ = layui.jquery;
        //展示已知数据
        table.render({
            elem: '#msg-table-id'
            ,url: '{{route('admin-get-msgs')}}'
            ,page: true
            ,cols: [[ //标题栏
                {field: 'message_id', title: 'ID', width: '5%', sort: true, fixed: 'left'}
                ,{field: 'archive_id', title: '文章ID', width: '7%', event: 'toArchive', style:'cursor: pointer;'}
                ,{field: 'titile', title: '文章标题', width: '15%', event: 'toArchive', style:'cursor: pointer;'}
                ,{field: 'user_name', title: '用户名', width: '15%'}
                ,{field: 'email', title: '邮箱', width: '10%'}
                ,{field: 'content', title: '留言内容', width: '23%'}
                ,{field: 'created_at', title: '留言日期', width: '15%'}
                ,{fixed: 'right', width:'10%', align:'center', toolbar: '#barMsg'}
            ]]
        });

        //监听工具条
        table.on('tool(msg-table-filter)', function(obj){
            var data = obj.data;
            if(obj.event === 'del'){
                layer.confirm('真的删除么', function(index){
                    $.get("{{route('admin-delete-msg')}}"+'?id='+obj.data.message_id, function (data, status){
                        if(data.code == 0){
                            obj.del();
                            layer.close(index);
                            layer.msg('删除留言记录成功!');
                        }else if(data.code == 1){
                            layer.msg('删除留言记录失败 msg : ' + data.msg);
                        }
                    });
                });
            }else if(obj.event === 'toArchive'){
                window.location.href = "{{route('article')}}"+'?id='+obj.data.archive_id;
            }
        });
    </script>
@endsection