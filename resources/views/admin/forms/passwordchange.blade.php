
@section('vendorCss')
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2-materialize.css')}}"/>
@stop
@section('pageCss')
    <link rel="stylesheet" type="text/css" href="{{asset('css/users-form.css')}}"/>
@stop

@section('content')

@if(isset($user))
    <input type="hidden" id="user_id" name="user_id" value="{{$user->id}}">
@endif
<div class="row"><!--Start 'email' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>email</i>
        <input type="text" name="email" id="email" class="validate @error('email') invalid @enderror"
               value="@if(isset($user)){{$user->email}}@else{{old('email')}}@endif" @if(isset($user) || old('email') != null) placeholder="" @endif required></input>
        <label for="email" class="">{{__('E-mail')}}</label>
    </div>
</div>
<div class="row"><!--Start 'password' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>vpn_key</i>
        <input type="password" name="password" id="password" class="validate @error('email') invalid @enderror"
               value="@if(!isset($user)){{old('password')}}@endif" @if(isset($user) || old('password') != null) placeholder="" @endif required></input>
        <label for="password" class="">{{__('Lozinka')}}</label>
    </div>
</div>
@stop

@section('vendorScripts')
    <script src="{{ asset('vendors/jquery-validation/jquery.validate.js') }}"></script>
    <script src="{{ asset('vendors/select2/select2.full.min.js') }}"></script>
@stop
@section('pageScripts')
    <script src="{{ asset('js/users-form.js') }}"></script>
@stop
