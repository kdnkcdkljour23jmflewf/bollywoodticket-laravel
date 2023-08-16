@extends('admin.component.app')
@section('content')
    <style>
        .delete_item{
            color:#ff4747 !important;
        }
    </style>
        @php
        $name = $image = $status = $category_id = '';
            if(!empty($edit_data)){
                $name = $edit_data->name;
                $image = $edit_data->image;
                $category_id = $edit_data->category_id;
                $status = $edit_data->status;
            }
        @endphp
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">@lang('admin/movie/addform.label.movie_frm')</h4>
                        <form class="forms-sample" name="category_frm" id="category_frm" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">@lang('admin/movie/addform.label.movie_frm.name')</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="@lang('admin/movie/addform.label.movie_frm.name')" value="{{!empty(old('name')) ? old('name') : $name}}">
                                @error('name')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">@lang('admin/movie/addform.label.movie_frm.category')</label>
                                <select name="category" id="category" class="form-control">
                                    <option value="">@lang('admin/movie/addform.label.movie_frm.category.select')</option>
                                    @forelse ($category as $item)
                                        <option value="{{$item->id}}" {{$category_id == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                    @empty                                        
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">@lang('admin/movie/addform.label.movie_frm.image')</label>
                                <input type="file" name="image[]" id="image" class="form-control" multiple>
                                @if (!empty($image))
                                    {{-- {{dd($image)}} --}}
                                    <input type="hidden" name="image_data" id="image_data" value="{{$image}}">
                                    @php
                                        $image = explode(',',$image);
                                        foreach ($image as $key => $value) {
                                            echo "
                                                <span class='img_$key'> 
                                                    <i class='fa fa-times delete_item' data-name='$value' data-id='$key'></i>
                                                    <img src='".asset('movie')."/$value' width='150'>
                                                </span>
                                                ";
                                        }
                                    @endphp
                                @endif
                                @error('image')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">@lang('admin/movie/addform.label.movie_frm.status')</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">@lang('admin/movie/addform.label.movie_frm.status.select')</option>
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
    <script>
        $('.delete_item').click(function(){
            let id = $(this).data('id')
            let name = $(this).data('name')
            $(`.img_${id}`).remove()
            var image_data = $('#image_data').val()
            console.log(image_data)
            image_data = image_data.replace(name,"")
            $('#image_data').val(image_data)
        })
    </script>
@endsection