<div class="card-body">
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label"><span class="text-red">*</span>id</label>
        <div class="col-sm-10">
            <input type="text" class="form-control {{empty($errors->first('id'))?'':'is-invalid'}}" id="id" name="id" placeholder="{{empty($errors->first('id'))?'id':$errors->first('id')}}" value="{{isset($conv_type)?$conv_type->id:old('id')}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="password" class="col-sm-2 col-form-label"><span class="text-red">*</span>名称</label>
        <div class="col-sm-10">
            <input type="text" class="form-control {{empty($errors->first('name'))?'':'is-invalid'}}" id="name" name="name" placeholder="{{empty($errors->first('name'))?'name':$errors->first('name')}}" value="{{isset($conv_type)?$conv_type->name:old('name')}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="description" class="col-sm-2 col-form-label">备注</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="description" name="description" placeholder="备注" value="{{ isset($conv_type)?$conv_type->description:'' }}">
        </div>
    </div>
</div>
<!-- /.card-body -->

