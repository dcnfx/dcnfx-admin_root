@section('title', '权限列表')
@section('header')
    <div class="layui-inline">
    <button class="layui-btn layui-btn-sm layui-btn-normal addBtn" data-desc="添加权限" data-url="{{route('permissions.edit',0)}}"><i class="layui-icon">&#xe654;</i></button>
    <button class="layui-btn layui-btn-sm layui-btn-warm freshBtn"><i class="layui-icon layui-icon-refresh-3"></i></button>
    </div>
@endsection
@section('table')
    <table class="layui-table" lay-even lay-skin="nob">
        <colgroup>
            <col class="hidden-xs" width="50">
            <col class="hidden-xs" width="150">
            <col class="hidden-xs" width="150">
            <col>
            <col class="hidden-xs" width="200">
            <col class="hidden-xs" width="200">
            <col width="200">
        </colgroup>
        <thead>
        <tr>
            <th class="hidden-xs">ID</th>
            <th class="hidden-xs">权限标识</th>
            <th class="hidden-xs">权限名称</th>
            <th>权限描述</th>
            <th class="hidden-xs">创建时间</th>
            <th class="hidden-xs">修改时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($list as $info)
            <tr>
                <td class="hidden-xs">{{$info['id']}}</td>
                <td class="hidden-xs">{{$info['name']}}</td>
                <td class="hidden-xs">{{$info['display_name']}}</td>
                <td>{{$info['description']}}</td>
                <td class="hidden-xs">{{$info['created_at']}}</td>
                <td class="hidden-xs">{{$info['updated_at']}}</td>
                <td>
                    <div class="layui-inline">
                        <button class="layui-btn layui-btn-sm layui-btn-normal edit-btn" data-id="{{$info['id']}}" data-desc="修改权限" data-url="{{route('permissions.edit',$info['id'])}}"><i class="layui-icon layui-icon-edit"></i></button>
                        <button class="layui-btn layui-btn-sm layui-btn-danger del-btn" data-id="{{$info['id']}}" data-url="{{route('permissions.destroy', $info['id'])}}"><i class="layui-icon layui-icon-delete"></i></button>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
@section('js')
    <script>
        layui.use(['form', 'jquery','laydate', 'layer'], function() {
            var form = layui.form;
            form.render();
            form.on('submit(formDemo)', function(data) {
            });
        });
    </script>
@endsection
@extends('common.list')
