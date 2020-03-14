@extends('layouts.app')
@section('content')
<form action="{{url('/subcategory/store')}}" name="sub_category_form" id="sub_category_form" style="border-radius: 0px;" method="post" class="form-horizontal group-border-dashed">
    {{ csrf_field() }}

    <div class="form-group">
        <label class="col-sm-4 control-label">Category Name <span class="error">*</span></label>
        <div class="col-sm-6 col-md-4">
            <select name="category_name" id="category_name" class="form-control input-sm required">
                <option value="">Select Category</option>
                <option value="1">Oppo</option>
                <option value="2">Vivo</option>
                <option value="3">MI</option>
                <option value="4">Samsung</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label">Sub Category Name <span class="error">*</span></label>
        <div class="col-sm-6 col-md-4">
            <input type="text" name="sub_category_name" id="sub_category_name" placeholder="Sub Category Name" class="form-control input-sm required" value="{{old('sub_category_name')}}" />
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 control-label"></label>
        <div class="col-sm-6 col-md-4">
        <button class="btn btn-primary" type="submit">submit</button>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-6 col-md-4">
            
        </div>
    </div>
</form>
@endsection