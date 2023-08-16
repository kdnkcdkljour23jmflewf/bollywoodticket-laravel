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
                                            <select name="hr_status" id="hr_status" class="form-control hr_status" style="width: 135px;" data-id="{{$item->id}}">
                                                <option value="">Select status for candidate</option>
                                                <option value="1" {{$item->hr_status == 1 ? 'selected':''}}>Resume Shortlisted</option>
                                                <option value="2" {{$item->hr_status == 2 ? 'selected':''}}>Resume not Shortlisted</option>
                                            </select>
                                        </td>
                                        <td>
                                           <a href='{{url('resume').$item->resume}}' download>Download Resume</a>
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
        $('.hr_status').change(function(){
            let status = $(this).val()
            let id = $(this).data('id')
            $.post(`{{url('emp_resume_list_hr')}}`,{id,status,'_token':`{{ csrf_token() }}`},(data)=>{
                // location.reload()
            },'JSON')
        })    
    </script>  
@endsection