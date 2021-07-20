@csrf
@if(isset($enforcer))
<input type="hidden" id="enforcer_id" name="enforcer_id" value="{{$enforcer->id}}">
@endif
<div class="row"><!--Start 'name' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>portrait</i>
        <input type="text" name="name" id="name" class="validate @error('name') invalid @enderror"
               value="@if(isset($enforcer)){{ $enforcer->name }}@else{{ old('name') }}@endif" @if(isset($enforcer) || old('name') != null) placeholder="" @endif required></input>
        <label for="name" class="">{{__('Naziv')}}</label>
    </div>
</div>
<div class="row"><!--Start 'email' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>mail</i>
        <input type="email" name="email" id="email" class="validate @error('email') invalid @enderror"
               value="@if(isset($enforcer)){{ $enforcer->email }}@else{{ old('email') }}@endif" @if(isset($enforcer) || old('email') != null) placeholder="" @endif required></input>
        <label for="email" class="">{{__('Email')}}</label>
    </div>
</div>
<div class="row"><!--Start 'phone' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>call</i>
        <input type="text" name="phone" id="phone" class="validate @error('phone') invalid @enderror"
               value="@if(isset($enforcer)){{ $enforcer->phone }}@else{{ old('phone') }}@endif" @if(isset($enforcer) || old('phone') != null) placeholder="" @endif required></input>
        <label for="phone" class="">{{__('Telefon')}}</label>
    </div>
</div>
<div class="row"><!--Start 'address' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>contact_mail</i>
        <input type="text" name="address" id="address" class="validate @error('address') invalid @enderror"
               value="@if(isset($enforcer)){{ $enforcer->address }}@else{{ old('address') }}@endif" @if(isset($enforcer) || old('address') != null) placeholder="" @endif required></input>
        <label for="address" class="">{{__('Adresa')}}</label>
    </div>
</div>
<div class="row"><!--Start 'city' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>location_city</i>
        <input type="text" name="city" id="city" class="validate @error('city') invalid @enderror"
               value="@if(isset($enforcer)){{ $enforcer->city }}@else{{ old('city') }}@endif" @if(isset($enforcer) || old('city') != null) placeholder="" @endif required></input>
        <label for="city" class="">{{__('Mesto')}}</label>
    </div>
</div>
<div class="row"><!--Start 'postcode' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>location_city</i>
        <input type="text" name="postcode" id="postcode" class="validate @error('postcode') invalid @enderror"
               value="@if(isset($enforcer)){{ $enforcer->postcode }}@else{{ old('postcode') }}@endif" @if(isset($enforcer) || old('postcode') != null) placeholder="" @endif required></input>
        <label for="postcode" class="">{{__('Poštanski broj')}}</label>
    </div>
</div>
<div class="row"><!--Start 'account' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>account_balance</i>
        <input type="text" name="account" id="account" class="validate @error('account') invalid @enderror"
               value="@if(isset($enforcer)){{ $enforcer->account }}@else{{ old('account') }}@endif" @if(isset($enforcer) || old('account') != null) placeholder="" @endif required></input>
        <label for="account" class="">{{__('Račun')}}</label>
    </div>
</div>
<div class="row"><!--Start 'pib' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>assignment</i>
        <input type="text" name="pib" id="pib" class="validate @error('pib') invalid @enderror"
               value="@if(isset($enforcer)){{ $enforcer->pib }}@else{{ old('pib') }}@endif" @if(isset($enforcer) || old('pib') != null) placeholder="" @endif required></input>
        <label for="pib" class="">{{__('PIB')}}</label>
    </div>
</div>
<div class="row"><!--Start 'maticni' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>assignment_ind</i>
        <input type="text" name="maticni" id="maticni" class="validate @error('maticni') invalid @enderror"
               value="@if(isset($enforcer)){{ $enforcer->maticni }}@else{{ old('maticni') }}@endif" @if(isset($enforcer) || old('maticni') != null) placeholder="" @endif required></input>
        <label for="maticni" class="">{{__('Matični broj')}}</label>
    </div>
</div>
<div class="row"><!--Start 'br_resenja' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>chrome_reader_mode</i>
        <input type="text" name="br_resenja" id="br_resenja" class="validate @error('br_resenja') invalid @enderror"
               value="@if(isset($enforcer)){{ $enforcer->br_resenja }}@else{{ old('br_resenja') }}@endif" @if(isset($enforcer) || old('br_resenja') != null) placeholder="" @endif required></input>
        <label for="br_resenja" class="">{{__('Broj Rešenja')}}</label>
    </div>
</div>
<div class="row"><!--Start 'status' form field-->
    <div class="input-field col s12 m6 l6">
        <i class='material-icons prefix'>verified_user</i>
        <select id="status" name="status">
            <option value="" disabled selected>{{__('Izaberite')}}</option>
            <option value="active" @if((isset($enforcer) && $enforcer->status == 'active') || old('status') == 'active') selected="selected" @endif>{{__('Aktivan')}}</option>
            <option value="inactive" @if((isset($enforcer) && $enforcer->status == 'inactive') || old('status') == 'inactive') selected="selected" @endif>{{__('Neaktivan')}}</option>
        </select>
        <label>{{__('Status')}}</label>
    </div>
</div>
<div class="row"><!--Start submit button-->
    <div class="col s12 m6">
        <button type="submit" class="btn cyan waves-effect waves-light right">{{__('Sačuvaj')}}
            <i class="material-icons right">send</i>
        </button>
    </div>
</div>

