@section('css')
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection
<div class="card-body">
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label"><span class="text-red">*</span>名称</label>
        <div class="col-sm-10">
            <input type="text" class="form-control {{empty($errors->first('name'))?'':'is-invalid'}}" id="name" name="name" placeholder="{{empty($errors->first('name'))?'名称':$errors->first('name')}}" value="{{isset($project)?$project->name:old('name')}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="hospitals" class="col-sm-2 col-form-label"><span class="text-red">*</span>转化类型</label>
        <div class="col-sm-10">
            <select name="conv_type_id" id="conv_type_id" class="form-control select2 {{empty($errors->first('conv_type_id'))?'':'is-invalid'}}" data-placeholder="选择类型" style="width: 100%;">
                @if(isset($conv_types))
                    @foreach($conv_types as $id => $conv_type)
                        <option value="{{ $id }}" {{ isset($project)&&$project->conv_type_id==$id?'selected':'' }}>{{ $conv_type }}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="convValue" class="col-sm-2 col-form-label">转化值</label>
        <div class="col-sm-10">
            <input type="text" class="form-control {{empty($errors->first('conv_value'))?'':'is-invalid'}}" id="convValue" name="conv_value" placeholder="转化值，默认为1" value="{{isset($project)?$project->conv_value:old('conv_value')}}">
        </div>
    </div>

    <div class="form-group row">
        <label for="description" class="col-sm-2 col-form-label">备注</label>
        <div class="col-sm-10">
            <input type="text" class="form-control {{empty($errors->first('description'))?'':'is-invalid'}}" id="description" name="description" value="{{isset($project)?$project->description:old('description')}}">
        </div>
    </div>
</div>
<!-- /.card-body -->
@section('javascripts')
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $('.select2').select2();
    </script>
@endsection
