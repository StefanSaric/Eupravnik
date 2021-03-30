@csrf
@if(isset($partner))
<input type="hidden" id="partner_id" name="partner_id" value="{{$partner->id}}">
@endif
<div class="row"><!--Start 'partner_id' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>subtitles</i>
        <input type="text" name="partner_id" id="partner_id" class="validate @error('partner_id') invalid @enderror"  
               value="@if(isset($partner)){{ $partner->partner_id }}@else{{ old('partner_id') }}@endif" @if(isset($partner) || old('partner_id') != null) placeholder="" @endif ></input>
        <label for="partner_id" class="">{{__('Šifra')}}</label>
    </div>
</div>
<div class="row"><!--Start 'name' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>domain</i>
        <input type="text" name="name" id="name" class="validate @error('name') invalid @enderror"  
               value="@if(isset($partner)){{ $partner->name }}@else{{ old('name') }}@endif" @if(isset($partner) || old('name') != null) placeholder="" @endif ></input>
        <label for="name" class="">{{__('Naziv')}}</label>
    </div>
</div>
<div class="row"><!--Start 'email' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>mail</i>
        <input type="email" name="email" id="email" class="validate @error('email') invalid @enderror"  
               value="@if(isset($partner)){{ $partner->email }}@else{{ old('email') }}@endif" @if(isset($partner) || old('email') != null) placeholder="" @endif ></input>
        <label for="email" class="">{{__('Email')}}</label>
    </div>
</div>
<div class="row"><!--Start 'phone' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>call</i>
        <input type="text" name="phone" id="phone" class="validate @error('phone') invalid @enderror"  
               value="@if(isset($partner)){{ $partner->phone }}@else{{ old('phone') }}@endif" @if(isset($partner) || old('phone') != null) placeholder="" @endif ></input>
        <label for="phone" class="">{{__('Telefon')}}</label>
    </div>
</div>
<div class="row"><!--Start 'address' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>contact_mail</i>
        <input type="text" name="address" id="address" class="validate @error('address') invalid @enderror"  
               value="@if(isset($partner)){{ $partner->address }}@else{{ old('address') }}@endif" @if(isset($partner) || old('address') != null) placeholder="" @endif ></input>
        <label for="address" class="">{{__('Adresa')}}</label>
    </div>
</div>
<div class="row"><!--Start 'city' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>location_city</i>
        <input type="text" name="city" id="city" class="validate @error('city') invalid @enderror"  
               value="@if(isset($partner)){{ $partner->city }}@else{{ old('city') }}@endif" @if(isset($partner) || old('city') != null) placeholder="" @endif ></input>
        <label for="city" class="">{{__('Mesto')}}</label>
    </div>
</div>
<div class="row"><!--Start 'postcode' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>location_city</i>
        <input type="text" name="postcode" id="postcode" class="validate @error('postcode') invalid @enderror"  
               value="@if(isset($partner)){{ $partner->postcode }}@else{{ old('postcode') }}@endif" @if(isset($partner) || old('postcode') != null) placeholder="" @endif ></input>
        <label for="postcode" class="">{{__('Poštanski broj')}}</label>
    </div>
</div>
<div class="row"><!--Start 'account' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>account_balance</i>
        <input type="text" name="account" id="account" class="validate @error('account') invalid @enderror"  
               value="@if(isset($partner)){{ $partner->account }}@else{{ old('account') }}@endif" @if(isset($partner) || old('account') != null) placeholder="" @endif ></input>
        <label for="account" class="">{{__('Račun')}}</label>
    </div>
</div>
<div class="row"><!--Start 'pib' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>assignment</i>
        <input type="text" name="pib" id="pib" class="validate @error('pib') invalid @enderror"  
               value="@if(isset($partner)){{ $partner->pib }}@else{{ old('pib') }}@endif" @if(isset($partner) || old('pib') != null) placeholder="" @endif ></input>
        <label for="pib" class="">{{__('PIB')}}</label>
    </div>
</div>
<div class="row"><!--Start 'maticni' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>assignment_ind</i>
        <input type="text" name="maticni" id="maticni" class="validate @error('maticni') invalid @enderror"  
               value="@if(isset($partner)){{ $partner->maticni }}@else{{ old('maticni') }}@endif" @if(isset($partner) || old('maticni') != null) placeholder="" @endif ></input>
        <label for="maticni" class="">{{__('Matični broj')}}</label>
    </div>
</div>
<div class="row"><!--Start 'status' form field-->
    <div class="input-field col s12 m6 l6">
        <i class='material-icons prefix'>verified_user</i>
        <select id="status" name="status">
            <option value="" disabled selected>{{__('Izaberite')}}</option>
            <option value="active" @if((isset($partner) && $partner->status == 'active') || old('status') == 'active') selected="selected" @endif>{{__('Aktivan')}}</option>
            <option value="inactive" @if((isset($partner) && $partner->status == 'inactive') || old('status') == 'inactive') selected="selected" @endif>{{__('Neaktivan')}}</option>
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

