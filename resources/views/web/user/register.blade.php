@extends('web.components.app')
@extends('web.components.uppermenu')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="contact-form spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2>@lang('web/register.label.register_frm')</h2>
                </div>
            </div>
        </div>
        <form action="" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <input type="text" placeholder="@lang('web/register.label.register_frm.email')" name="email" id="email" value="{{ old('email')}}">
                    @error('email')
                        <label for="email">{{$message}}</label>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-6">
                    <input type="text" placeholder="@lang('web/register.label.register_frm.name')" name="name" id="name" value="{{ old('name')}}">
                    @error('name')
                        <label for="name">{{$message}}</label>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-6">
                    <input type="password" placeholder="@lang('web/register.label.register_frm.password')" name="password" id="password">
                    @error('password')
                        <label for="password">{{$message}}</label>
                    @enderror
                </div>
                <a href="{{route('user-register')}}">
                    <div class="col-lg-12 text-center">
                        <button type="submit" class="site-btn">@lang('web/register.label.register_frm.category.submit')</button>
                    </div>
                </a>
                <br>
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
