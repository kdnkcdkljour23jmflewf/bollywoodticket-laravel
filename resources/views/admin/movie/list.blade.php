@extends('admin.component.app')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <div class="">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">@lang('admin/movie/list.label.list')</h4>
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th>@lang('admin/movie/list.label.movie_list.name')</th>
                                <th>@lang('admin/movie/list.label.movie_list.image')</th>
                                <th>@lang('admin/movie/list.label.movie_list.category')</th>
                                <th>@lang('admin/movie/list.label.movie_list.status')</th>
                                <th>@lang('admin/movie/list.label.movie_list.action')</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($movie_list as $item)
                              @php
                                  $item = (object) $item;
                              @endphp
                                <tr id="row_{{$item->id}}">
                                    <td>
                                        {{$item->name}}
                                    </td>
                                    <td>
                                      @php
                                          $image = explode(',',$item->image)[0]??'';
                                      @endphp
                                        <img src="{{asset('movie').'/'.$image}}" width="150">
                                    </td>
                                    <td>
                                      {{$item->category_data->name}}
                                    </td>
                                    <td>
                                        {{$item->status == 1 ? 'Active' : 'InActive'}}
                                    </td>
                                    <td>
                                      <a target="_blank" href="{{route('movie-price',['id'=>encrypt($item->id)])}}">
                                        <input type="button" value="@lang('admin/movie/list.label.movie_list.action.mprice')" class="btn btn-warning">
                                      </a>
                                        <a target="_blank" href="{{route('movie-edit',['id'=>encrypt($item->id)])}}">
                                          <input type="button" value="@lang('admin/movie/list.label.movie_list.action.edit')" class="btn btn-primary">
                                        </a>
                                        <a href="#" class="delete_movie" data-id="{{$item->id}}"><input type="button" value="@lang('admin/movie/list.label.movie_list.action.delete')" class="btn btn-danger"></a>
                                    </td>
                                </tr>
                              @empty                                  
                              @endforelse
                            </tbody>
                          </table>
                          {{$movie_list->links()}}
                          {{-- {!! $movie_list->links() !!} --}}
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    $('.delete_movie').click(function(){
        let data_id = $(this).data('id')
        $.post(`{{route('movie-delete')}}`,{data_id,'_token':`{{csrf_token()}}`},((data)=>{           
        },'JSON')).done(()=>{
            $(`#row_${data_id}`).remove()
        })  
    })
</script>
@endsection