@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Service Listing</h3>
                <a class="btn btn-primary" href='/add_category'>Add Category</a>
                <a class="btn btn-primary" href='/add_sub_category'>Add Sub Category</a>

            </div>


            <form method="GET" action="{{ url('filterService') }}">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="category_name" class="form-control" placeholder="Category Name" value="{{ old('category_name') }}">
                        <input type="text" name="sub_category_name" class="form-control" placeholder="Sub Category Name" value="{{ old('sub_category_name') }}">
                        <input type="date" name="activation_start_date" class="form-control" placeholder="Activation Start Date" value="{{ old('activation_start_date') }}">
                        <input type="date" name="activation_end_date" class="form-control" placeholder="Activation End Date" value="{{ old('activation_end_date') }}">
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-success">Search</button>
                    </div>
                </div>
            </form>

            <div class="panel-body">
                <div class="form-group">
                    <input type="text" class="form-controller" id="search" name="search"></input>
                </div>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>Service Name</th>
                            <th>Description</th>
                            <th>Activation Start Date</th>
                            <th>Activation End Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{$category->category_name}}</td>
                            <td>{{$category->sub_category_name}}</td>
                            <td>{{$category->service_name}}</td>
                            <td>{{$category->description}}</td>
                            <td>{{$category->activation_start_date}}</td>
                            <td>{{$category->activation_end_date}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center " style="margin: 20px;">{!! $categories->render() !!}</div>
            </div>
        </div>
    </div>
</div>
@endsection