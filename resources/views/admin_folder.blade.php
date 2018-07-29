@extends('layouts.layout_admin')

@section('head-extend')
@endsection

@section('content')
    <blockquote class="layui-elem-quote">
        <button class="layui-btn layui-btn-sm" id="add-folder-id">
            <i class="layui-icon">&#xe608;</i> 添加分类
        </button>
    </blockquote>
    <table class="layui-hide" id="folder-table-id" lay-filter="folder-table-filter"></table>
@endsection

@section('script-extend')
    <script type="text/html" id="barFolder">
        <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
    </script>

    <script>
        var table = layui.table;
        var $ = layui.jquery;
        //展示已知数据
        table.render({
            elem: '#folder-table-id'
            ,url: '{{route('admin-get-folders')}}'
            ,page: true
            ,cols: [[ //标题栏
                {field: 'folder_id', title: 'ID', width: '10%', sort: true, fixed: 'left'}
                ,{field: 'folder_name', title: '分类名称', width: '80%', edit: 'text'}
                ,{fixed: 'right', width:'10%', align:'center', toolbar: '#barFolder'}
            ]]
        });
        //监听单元格编辑
        table.on('edit(folder-table-filter)', function(obj){
            //请求服务器新增记录
            $.get("{{route('admin-edit-folder')}}"+"?id="+obj.data.folder_id+'&name='+obj.data.folder_name, function (data, status){
                if(data.code == 0){
                    layer.msg('修改成功!');
                }else if(data.code == 1){
                    layer.msg('操作失败 msg : ' + data.msg);
                }
            });
        });

        //监听添加分类事件
        $("#add-folder-id").on('click', function () {
            $.get("{{route('admin-add-folder')}}", function (data, status){
                if(data.code == 0){
                    layer.msg('分类添加成功!');
                    table.reload('folder-table-id',{
                        url: '{{route('admin-get-folders')}}'
                    });
                }else if(data.code == 1){
                    layer.msg('分类添加失败 msg : ' + data.msg);
                }
            });
        });

        //监听工具条
        table.on('tool(folder-table-filter)', function(obj){
            var data = obj.data;
            if(obj.event === 'del'){
                layer.confirm('真的删除么', function(index){
                    $.get("{{route('admin-delete-folder')}}"+'?id='+obj.data.folder_id, function (data, status){
                        if(data.code == 0){
                            obj.del();
                            layer.close(index);
                            layer.msg('分类删除成功!');
                        }else if(data.code == 1){
                            layer.msg('分类删除失败 msg : ' + data.msg);
                        }
                    });
                });
            }
        });
    </script>
@endsection