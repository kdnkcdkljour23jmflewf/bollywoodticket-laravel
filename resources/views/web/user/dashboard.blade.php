@extends('web.components.app')
@extends('web.components.uppermenu')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(()=>{
        setTimeout(() => {
            @if(Session::has('success'))
                toastr.success("{{ Session::get('success') }}");  
            @endif  
            @if(Session::has('info'))  
                    toastr.info("{{ Session::get('info') }}");  
            @endif  
            @if(Session::has('warning'))  
                    toastr.warning("{{ Session::get('warning') }}");  
            @endif  
            @if(Session::has('error'))  
                    toastr.error("{{ Session::get('error') }}");  
            @endif      
        }, 3000);
    })
</script> 
     
@endsection
