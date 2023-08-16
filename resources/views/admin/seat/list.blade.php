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
                        <h4 class="card-title">@lang('admin/seat/list.label.list')</h4>
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th>@lang('admin/seat/list.label.seat_list.name')</th>
                                <th>@lang('admin/seat/list.label.seat_list.quantity')</th>
                                <th>@lang('admin/seat/list.label.seat_list.action')</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($seat_list as $item)
                              @php
                                  $item = (object) $item;
                              @endphp
                                <tr id="row_{{$item->id}}">
                                    <td>
                                        {{$item->name}}
                                    </td>
                                    <td>
                                        {{$item->quantity}}
                                    </td>
                                    <td>
                                        
                                        <a target="_blank" href="{{route('seat-edit',['id'=>encrypt($item->id)])}}">
                                          <input type="button" value="@lang('admin/seat/list.label.seat_list.action.edit')" class="btn btn-primary">
                                        </a>
                                        <a href="#" class="delete_seat" data-id="{{$item->id}}"><input type="button" value="@lang('admin/seat/list.label.seat_list.action.delete')" class="btn btn-danger"></a>
                                    </td>
                                </tr>
                              @empty                                  
                              @endforelse
                            </tbody>
                          </table>
                          {{$seat_list->links()}}
                          {{-- {!! $seat_list->links() !!} --}}
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
    $('.delete_seat').click(function(){
        let data_id = $(this).data('id')
        $.post(`{{route('seat-delete')}}`,{data_id,'_token':`{{csrf_token()}}`},((data)=>{           
        },'JSON')).done(()=>{
            $(`#row_${data_id}`).remove()
        })  
    })
</script>
@endsection