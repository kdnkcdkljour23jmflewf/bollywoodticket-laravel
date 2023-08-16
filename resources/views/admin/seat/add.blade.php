@extends('admin.component.app')
@section('content')
    <style>
        .delete_item{
            color:#ff4747 !important;
        }
    </style>
        @php
        $quantity  = $category_id = '';
            if(!empty($edit_data)){
                $quantity = $edit_data->quantity;
                $category_id = $edit_data->auditoriam_id;
            }
        @endphp
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">@lang('admin/seat/addform.label.movie_frm')</h4>
                        <form class="forms-sample" name="seat_frm" id="seat_frm" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">@lang('admin/seat/addform.label.movie_frm.category')</label>
                                <select name="category" id="category" class="form-control">
                                    <option value="">@lang('admin/seat/addform.label.movie_frm.category.select')</option>
                                    @forelse ($audtoriam as $item)
                                        <option value="{{$item->id}}" {{$category_id == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                    @empty                                        
                                    @endforelse
                                </select>
                            </div>
                            @error('category')
                                {{$message}}
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputEmail1">@lang('admin/seat/addform.label.movie_frm.seatquantity')</label>
                                <input type="text" name="seat_quantity" id="seat_quantity" class="form-control" value="{{!empty($quantity) ? $quantity : old('seat_quantity')}}">
                                @error('seat_quantity')
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