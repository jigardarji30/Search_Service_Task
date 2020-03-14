@extends('layouts.app')
@section('content')
<form action="{{url('/category/store')}}" name="category_form" id="category_form" style="border-radius: 0px;" method="post" class="form-horizontal group-border-dashed" enctype="multipart/form-data">
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
        <label class="col-sm-4 control-label">Service Name <span class="error">*</span></label>
        <div class="col-sm-6 col-md-4">
            <input type="text" name="service_name" id="service_name" placeholder="Service Name" class="form-control input-sm required" value="{{old('service_name')}}" />
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 control-label">Sub Category Name <span class="error">*</span></label>
        <div class="col-sm-6 col-md-4">
            <select name="sub_category_name" id="sub_category_name" class="form-control input-sm required">
            </select>
        </div>

    </div>

    <div class="form-group">
        <label class="col-sm-4 control-label">Description</label>
        <div class="col-sm-6 col-md-4">
            <textarea rows="5" cols="50" name="description" id="description" placeholder="Description" class="form-control input-sm " value="{{old('description')}}"></textarea>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-4 control-label">Activation Start Date</label>
        <div class="col-sm-6 col-md-4">
        <input type="date" class="date form-control" name="activation_start_date">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label">Activation End Date</label>
        <div class="col-sm-6 col-md-4">
        <input type="date" class="date form-control" name="activation_end_date">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-6 col-md-8 savebtn">
            <p class="text-right">
                <button type="submit" class="btn btn-primary">Submit</button>
            </p>
        </div>
    </div>

</form>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('select[name="category_name"]').on('change', function() {
            var categoryID = jQuery(this).val();
            if (categoryID) {
                jQuery.ajax({
                    url: '/getSubCategory/' + categoryID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        // console.log(data);
                        jQuery('select[name="sub_category_name"]').empty();
                        jQuery.each(data, function(key, value) {
                            $('select[name="sub_category_name"]').append('<option value="' + value.id + '">' + value.sub_category_name + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="sub_category_name"]').empty();
            }
        });
    });

</script>
@endsection