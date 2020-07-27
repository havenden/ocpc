@extends('layouts.app')

@section('content')
    @include('layouts.tip')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">账户<span class="text-muted">（{{ $counts->count() }}）</span><a href="{{ route('count.create') }}" class="d-none" style="margin-left: 10px;">添加</a><span class="text-danger small">暂未开通多账户</span></h3>
{{--            <div class="card-tools">--}}
{{--                <form action="{{ route('user.search') }}" method="get" id="search-form">--}}
{{--                    {{csrf_field()}}--}}
{{--                <div class="input-group input-group-sm" style="width: 150px;">--}}
{{--                    <input type="text" name="key" class="form-control float-right" placeholder="Search:姓名/id">--}}
{{--                    <div class="input-group-append">--}}
{{--                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                </form>--}}
{{--            </div>--}}
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
                    <th style="">用户</th>
                    <th style="">密码</th>
                    <th style="">备注</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($counts))
                @foreach($counts as $count)
                <tr>
                    <td>{{ $count->name }}</td>
                    <td>{{ $count->password }}</td>
                    <td>{{ $count->description }}</td>
                    <td data-id="{{ $count->id }}">
                        <a href="{{ route('count.edit',$count->id) }}" style="margin-right: 20px;" title="编辑" data-toggle="tooltip" data-placement="top"><i class="fas fa-edit"></i></a>
                        <a href="javascript:void(0);" data-id="{{$count->id}}"  alt="删除" title="删除" class="delete-operation"><i class="fas fa-trash-alt"></i></a>
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
                {{$counts->appends(request()->all())->links()}}
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
                        $('form#user-form').attr('action',"{{route('count.index')}}/"+id);
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