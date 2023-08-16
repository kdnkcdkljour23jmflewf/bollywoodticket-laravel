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
                        <h4 class="card-title">@lang('admin/ticketsystem/list.label.list')</h4>
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th>@lang('admin/ticketsystem/list.label.ticket_list.category')</th>
                                <th>@lang('admin/ticketsystem/list.label.ticket_list.movie')</th>
                                <th>@lang('admin/ticketsystem/list.label.ticket_list.price')</th>
                                <th>@lang('admin/ticketsystem/list.label.ticket_list.action')</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($ticket_list as $item)
                              @php                              
                                  $item = (object) $item;
                              @endphp
                                <tr id="row_{{$item->id}}">
                                    <td>
                                        {{$item->category->name}}
                                    </td>
                                    <td>
                                      {{$item->movies->name}}
                                    </td>
                                    <td>
                                      {{$item->price}}
                                    </td>
                                    <td>                                        
                                        <a target="_blank" href="{{route('ticketprice-edit',['id'=>encrypt($item->id)])}}">
                                          <input type="button" value="@lang('admin/ticketsystem/list.label.ticket_list.action.edit')" class="btn btn-primary">
                                        </a>
                                        <a href="#" class="delete_movie" data-id="{{$item->id}}"><input type="button" value="@lang('admin/ticketsystem/list.label.ticket_list.action.delete')" class="btn btn-danger"></a>
                                    </td>
                                </tr>
                              @empty                                  
                              @endforelse
                            </tbody>
                          </table>
                          {{$ticket_list->links()}}
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
        $.post(`{{route('ticketprice-delete')}}`,{data_id,'_token':`{{csrf_token()}}`},((data)=>{           
        },'JSON')).done(()=>{
            $(`#row_${data_id}`).remove()
        })  
    })
</script>
@endsection