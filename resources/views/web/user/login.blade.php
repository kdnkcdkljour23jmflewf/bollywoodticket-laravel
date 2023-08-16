@extends('web.components.app')
@extends('web.components.uppermenu')
@section('content')
<div class="contact-form spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2>@lang('web/login.label.login_frm')</h2>
                </div>
            </div>
        </div>
        <form action="{{route('user-login')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <input type="text" placeholder="@lang('web/login.label.login_frm.email')" name="email" id="email">
                    @error('email')
                        <label for="email">{{$message}}</label>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-6">
                    <input type="password" placeholder="@lang('web/login.label.login_frm.password')" name="password" id="password">
                    @error('password')
                        <label for="password">{{$message}}</label>
                    @enderror
                </div>
                {{-- <a href="{{route('user-login')}}"> --}}
                    <div class="col-lg-12 text-center">
                        <button type="submit" class="site-btn">@lang('web/login.label.login_frm.category.submit')</button>
                    </div>
                {{-- </a> --}}
                <br>
                <a href="{{route('user-register')}}">
                    <div class="col-lg-12 text-center mt-5">
                        <button type="button" class="site-btn">@lang('web/login.label.login_frm.category.signup')</button>
                    </div>
                </a>
            </div>
        </form>
    </div>
</div>
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