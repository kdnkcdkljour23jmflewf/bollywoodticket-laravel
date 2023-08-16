@extends('admin.component.app')
@section('content')
    <style>
        .delete_item{
            color:#ff4747 !important;
        }
    </style>
        @php
        $price  =  $category_id = $movie_id = '';
        $auditoriam_id = [];
            if(!empty($edit_data)){
                $category_id = $edit_data->category_id;
                $movie_id = $edit_data->movie_id;
                $auditoriam_id = explode(',',$edit_data->auditoriam_id);
                $price = $edit_data->price;
            }
        @endphp
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">@lang('admin/ticketsystem/addform.label.movie_frm')</h4>
                        <form class="forms-sample" name="ticketsystem_frm" id="ticketsystem_frm" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">@lang('admin/ticketsystem/addform.label.movie_frm.category')</label>
                                <select name="category" id="category" class="form-control">
                                    <option value="">@lang('admin/ticketsystem/addform.label.movie_frm.category.select')</option>
                                    @forelse ($category as $item)
                                        @if (empty(old('category')))
                                            <option value="{{$item->id}}" {{$category_id == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                        @else 
                                            <option value="{{$item->id}}" {{old('category') == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                        @endif
                                    @empty                                        
                                    @endforelse
                                </select>
                                @error('category')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">@lang('admin/ticketsystem/addform.label.movie_frm.name')</label>
                                <select name="movie" id="movie" class="form-control">
                                    <option value="">@lang('admin/ticketsystem/addform.label.movie_frm.movie.select')</option>
                                </select>
                                @error('movie')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">@lang('admin/ticketsystem/addform.label.movie_frm.auditoriam')</label>
                                <select name="audtoriam[]" id="audtoriam" class="form-control" multiple>
                                    <option value="">@lang('admin/ticketsystem/addform.label.movie_frm.auditoriam.select')</option>
                                    @forelse ($audtoriam as $item)
                                        @if (empty(old('audtoriam')))
                                            <option value="{{$item->id}}" {{in_array($item->id,$auditoriam_id)  ? 'selected' : ''}}>{{$item->name}}</option>
                                        @else
                                            <option value="{{$item->id}}" {{in_array($item->id,old('audtoriam'))  ? 'selected' : ''}}>{{$item->name}}</option>
                                        @endif
                                    @empty
                                    @endforelse
                                </select>
                                @error('audtoriam')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">@lang('admin/ticketsystem/addform.label.movie_frm.movieprice')</label>
                                <input type="text" name="movie_price" id="movie_price" value="{{!empty($price) ? $price : old('movie_price')}}" class="form-control">
                                @error('movie_price')
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

        $(window).on('load',function(){
            var category_id =  `{{$category_id}}`
            if(category_id != ''){
                $('#category').change()
                setTimeout(() => {
                    let movie_id = `{{$movie_id}}`
                    $('#movie').val(movie_id)
                }, 1000);
            }
        })

        $('.delete_item').click(function(){
            let id = $(this).data('id')
            let name = $(this).data('name')
            $(`.img_${id}`).remove()
            var image_data = $('#image_data').val()
            console.log(image_data)
            image_data = image_data.replace(name,"")
            $('#image_data').val(image_data)
        })

        $('#category').on('change',function(){
            let category_id = $(this).val()
            $.post(`{{route('get_movie')}}`,{category_id,'_token':`{{csrf_token()}}`},(data)=>{
               var html = `<option value=""></option>`
                var movie_data =  data.movie_data 
                $.each(movie_data,function(index,value){
                    html+=`
                            <option value="${value.id}">${value.name}</option>
                        `
                })
                $('#movie').html(html)
            },'JSON')
        })
    </script>
@endsection