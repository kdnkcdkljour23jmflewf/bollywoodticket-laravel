@extends('admin.component.app')
@section('content')
        <div class="content-wrapper">
            <a href="{{url('emp_form')}}"><div class="row" style="
                position: relative;
                float: right;
            "><button class="btn btn-primary">Add</button></div>
            </a>
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>Firstname</th>
                                  <th>Address</th>
                                  <th>Position Applied for</th>
                                  <th>HR status</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                @forelse ($employe_resume_list as $item)
                                    <tr class="row_{{$item->id}}">
                                        <td>
                                            {{$item->name}}
                                        </td>
                                        <td>
                                            {{$item->address}}
                                        </td>
                                        <td>
                                            {{$item->position}}
                                        </td>
                                        <td>
                                            @if ($item->hr_status == 0)
                                                NO Action from HR
                                            @elseif ($item->hr_status == 1)
                                            Resume Shortlisted
                                            @elseif ($item->hr_status == 2)
                                            Resume not Shortlisted
                                            @else
                                                Your Resume is shortlisted
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{url('emp_form_edit').'/'.$item->id}}">
                                                <button class="btn btn-primary">Edit</button>
                                            </a>
                                                <button class="btn btn-danger delete_data" data-id="{{$item->id}}">Delete</button>
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
    <script>
        $('.delete_data').click(function(){
            let id = $(this).data('id')
            $.post(`{{url('emp_resume_delete')}}`,{id,'_token':`{{ csrf_token() }}`},(data)=>{
                $(`.row_${id}`).remove()
            },'JSON')
        })    
    </script>  
@endsection