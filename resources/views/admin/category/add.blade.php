@extends('admin.component.app')
@section('content')
        @php
        $name = $image = $status = '';
            if(!empty($edit_data)){
                $name = $edit_data->name;
                $image = $edit_data->image;
                $status = $edit_data->status;
            }
        @endphp
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Category Form</h4>
                        <form class="forms-sample" name="category_frm" id="category_frm" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">Category Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Category" value="{{!empty(old('name')) ? old('name') : $name}}">
                                @error('name')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Parent</label>
                                
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                                <img src="{{asset('category').'/'.$image}}" width="150">
                                @error('image')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">Select Status</option>
                                    <option value="1" {{($status == 1 ? 'selected' : '')}}>Active</option>
                                    <option value="0" {{($status == 0 ? 'selected' : '')}}>InActive</option>
                                </select>
                                @error('status')
                                    {{$message}}
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">{{!empty($edit_data) ? 'Update' : 'Submit'}}</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
@endsection