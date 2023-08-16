@extends('admin.component.app')
@section('content')
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Employee Form</h4>
                        <p class="card-description">
                        Basic form 
                        </p>
                        <form class="forms-sample" name="employee_frm" id="employee_frm" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{$emp_data->id}}">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Select Company</label>
                                <select name="company" id="company">
                                    <option value="">Select</option>
                                    <option value="1" {{$emp_data->company == 1 ? 'selected' :''}}>HP</option>
                                    <option value="2" {{$emp_data->company == 2 ? 'selected' :''}}>Dell</option>
                                    <option value="3" {{$emp_data->company == 3 ? 'selected' :''}}>Indian Oil</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$emp_data->name}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Address</label>
                                <textarea class="form-control" id="address" name="address">{{$emp_data->address}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Position Applied for</label>
                                <textarea class="form-control" id="position" name="position">{{$emp_data->position}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">CV</label>
                                <input type="file" name="resume" id="resume" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
@endsection