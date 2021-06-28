@csrf
@if(isset($steward))
    <input type="hidden" id="id" name="id" value="{{$steward->id}}">
    <input type="hidden" id="user_id" name="user_id" value="{{$steward->user_id}}">
@endif
<div class="row"><!--Start 'name' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>account_circle</i>
        <input type="text" name="name" id="name" class="validate @error('name') invalid @enderror"
               value="@if(isset($steward)){{ $steward->name }}@else{{ old('name') }}@endif" @if(isset($steward) || old('name') != null) placeholder="" @endif required></input>
        <label for="name" class="">{{__('Ime')}}</label>
    </div>
</div>
<div class="row"><!--Start 'last name' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>account_circle</i>
        <input type="text" name="last_name" id="last_name" class="validate @error('last_name') invalid @enderror"
               value="@if(isset($steward)){{ $steward->last_name }}@else{{ old('last_name') }}@endif" @if(isset($steward) || old('last_name') != null) placeholder="" @endif required></input>
        <label for="last_name" class="">{{__('Prezime')}}</label>
    </div>
</div>
<div class="row"><!--Start 'jmbg' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>account_circle</i>
        <input type="text" name="jmbg" id="jmbg" class="validate @error('jmbg') invalid @enderror"
               value="@if(isset($steward)){{ $steward->jmbg }}@else{{ old('jmbg') }}@endif" @if(isset($steward) || old('jmbg') != null) placeholder="" @endif required></input>
        <label for="jmbg" class="">{{__('JMBG')}}</label>
    </div>
</div>
<div class="row"><!--Start 'email' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>email</i>
        <input type="text" name="email" id="email" class="validate @error('email') invalid @enderror"
               value="@if(isset($steward)){{$steward->email}}@else{{old('email')}}@endif" @if(isset($steward) || old('email') != null) placeholder="" @endif required></input>
        <label for="email" class="">{{__('E-mail')}}</label>
    </div>
</div>
<div class="row"><!--Start 'account' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>vpn_key</i>
        <input type="password" name="password" id="password" class="validate @error('password') invalid @enderror"
               value="@if(isset($steward)){{$steward->password}}@else{{old('password')}}@endif" @if(isset($steward) || old('password') != null) placeholder="" @endif required></input>
        <label for="password" class="">{{__('Šifra')}}</label>
    </div>
</div>
<div class="row"><!--Start 'phone' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>phone</i>
        <input type="text" name="phone" id="phone" class="validate @error('phone') invalid @enderror"
               value="@if(isset($steward)){{$steward->phone}}@else{{old('phone')}}@endif" @if(isset($steward) || old('phone') != null) placeholder="" @endif required></input>
        <label for="phone" class="">{{__('Telefon')}}</label>
    </div>
</div>
<div class="row"><!--Start 'address' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>location_city</i>
        <input type="text" name="address" id="address" class="validate @error('address') invalid @enderror"
               value="@if(isset($steward)){{ $steward->address }}@else{{ old('address') }}@endif" @if(isset($steward) || old('address') != null) placeholder="" @endif required></input>
        <label for="address" class="">{{__('Adresa')}}</label>
    </div>
</div>
<div class="row"><!--Start 'licence' form field-->
    <div class="input-field col s12 m6 l6">
        <i class='material-icons prefix'>assignment_ind</i>
        <select id="licence" name="licence">
            <option value="Da" @if((isset($steward) && $steward->licence == "Da") || old('licence') == "Da") selected="selected" @endif>{{__('Da')}}</option>
            <option value="Ne" @if((isset($steward) && $steward->licence == "Ne") || old('licence') == "Ne") selected="selected" @endif>{{__('Ne')}}</option>
        </select>
        <label>{{__('Licenca')}}</label>
    </div>
</div>
<div class="row"><!--Start 'account' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>account_balance</i>
        <input type="text" name="account" id="account" class="validate @error('account') invalid @enderror"
               value="@if(isset($steward)){{ $steward->account }}@else{{ old('account') }}@endif" @if(isset($steward) || old('account') != null) placeholder="" @endif required></input>
        <label for="account" class="">{{__('Račun')}}</label>
    </div>
</div>
<div class="row"><!--Start submit button-->
    <button type="submit" class="btn cyan waves-effect waves-light right">{{__('Sačuvaj')}}
        <i class="material-icons right">send</i>
    </button>
</div>
