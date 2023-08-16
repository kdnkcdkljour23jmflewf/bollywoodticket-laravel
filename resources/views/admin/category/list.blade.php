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
                        <h4 class="card-title">Categories Table</h4>
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($category_list as $item)
                                <tr id="row_{{$item->id}}">
                                    <td>
                                        {{$item->name}}
                                    </td>
                                    <td>
                                        <img src="{{asset('category').'/'.$item->image}}" width="150">
                                    </td>
                                    <td>
                                        {{$item->status == 1 ? 'Active' : 'InActive'}}
                                    </td>
                                    <td>
                                        
                                        <a target="_blank" href="{{route('category-edit',['id'=>$item->id])}}"><input type="button" value="Edit" class="btn btn-primary"></a>
                                        <a href="#" class="delete_category" data-id="{{$item->id}}"><input type="button" value="Delete" class="btn btn-danger"></a>
                                    </td>
                                </tr>
                              @empty                                  
                              @endforelse
                            </tbody>
                          </table>
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
    $('.delete_category').click(function(){
        let data_id = $(this).data('id')
        $.post(`{{route('category-delete')}}`,{data_id,'_token':`{{csrf_token()}}`},((data)=>{           
        },'JSON')).done(()=>{
            $(`#row_${data_id}`).remove()
        })  
    })
</script>
@endsection