<div class="card-body">
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label"><span class="text-red">*</span>账户</label>
        <div class="col-sm-10">
            <input type="text" class="form-control {{empty($errors->first('name'))?'':'is-invalid'}}" id="name" name="name" placeholder="{{empty($errors->first('name'))?'ocpc平台账户':$errors->first('name')}}" value="{{isset($count)?$count->name:old('name')}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="password" class="col-sm-2 col-form-label"><span class="text-red">*</span>密码</label>
        <div class="col-sm-10">
            <input type="text" class="form-control {{empty($errors->first('password'))?'':'is-invalid'}}" id="password" name="password" placeholder="{{empty($errors->first('password'))?'ocpc平台密码':$errors->first('password')}}" value="{{isset($count)?$count->password:old('display_name')}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="description" class="col-sm-2 col-form-label">备注</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="description" name="description" placeholder="备注" value="{{ isset($count)?$count->description:'' }}">
        </div>
    </div>
</div>
<!-- /.card-body -->

