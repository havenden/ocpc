@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">项目 <span class="text-muted">（{{ $projects->count() }}）</span> <a href="{{ route('project.create') }}" style="margin-left: 10px;">添加</a></h3>

        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <form action="" method="post" class="user-form" id="user-form">
                {{method_field('DELETE')}}
                {{csrf_field()}}
                <input type="hidden" name="key" value="{{ isset($key)?$key:'' }}">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                    <th style="">名称</th>
                    <th style="">转化类型</th>
                    <th style="">转化值</th>
                    <th style="">备注</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($projects))
                @foreach($projects as $project)
                <tr>
                    <td>{{ $project->name }}</td>
                    <td>{{ isset($conv_types[$project->conv_type_id])?$conv_types[$project->conv_type_id]:'' }}</td>
                    <td>{{ $project->conv_value }}</td>
                    <td>{{ $project->description }}</td>
                    <td data-id="{{ $project->id }}">
                        <a href="{{ route('project.edit',$project->id) }}" style="margin-right: 20px;" title="编辑" data-toggle="tooltip" data-placement="top"><i class="fas fa-edit"></i></a>
                        <a href="javascript:void(0);" data-id="{{$project->id}}"  alt="删除" title="删除" class="delete-operation"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                @endforeach
                @endif
                </tbody>
            </table>
            </form>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
                {{$projects->appends(request()->all())->links()}}
            </ul>
        </div>
    </div>
@endsection
@section('javascripts')
    <script type="text/javascript" src="{{ asset('plugins/layer/layer.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".delete-operation").on('click',function(){
                var id=$(this).attr('data-id');
                layer.open({
                    content: '你确定要删除吗？',
                    btn: ['删除', '取消'],
                    yes: function(index, layero){
                        $('form#user-form').attr('action',"{{route('project.index')}}/"+id);
                        $('form#user-form').submit();
                    },
                    btn2: function(index, layero){
                        //按钮【按钮二】的回调
                        //return false 开启该代码可禁止点击该按钮关闭
                    },
                    cancel: function(){
                        //右上角关闭回调
                        //return false; 开启该代码可禁止点击该按钮关闭
                    }
                });
            });
        } );
    </script>
@endsection