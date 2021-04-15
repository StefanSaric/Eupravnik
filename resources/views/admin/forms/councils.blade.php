@csrf
@if(isset($council))
<input type="hidden" id="council_id" name="council_id" value="{{$council->id}}">
@endif
<input type="hidden" id="user_id" name="user_id" value="{{Auth::user()->id}}">
<div class="row"><!--Start 'name' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>domain</i>
        <input type="text" name="name" id="name" class="validate @error('name') invalid @enderror"  
               value="@if(isset($council)){{ $council->name }}@else{{ old('name') }}@endif" @if(isset($council) || old('name') != null) placeholder="" @endif required></input>
        <label for="name" class="">{{__('Naziv')}}</label>
    </div>
</div>
<div class="row"><!--Start 'short_name' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>featured_play_list</i>
        <input type="text" name="short_name" id="short_name" class="validate @error('short_name') invalid @enderror"  
               value="@if(isset($council)){{ $council->short_name }}@else{{ old('short_name') }}@endif" @if(isset($council) || old('short_name') != null) placeholder="" @endif required></input>
        <label for="short_name" class="">{{__('Oznaka')}}</label>
    </div>
</div>
<div class="row"><!--Start 'city' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>location_city</i>
        <input type="text" name="city" id="city" class="validate @error('city') invalid @enderror"  
               value="@if(isset($council)){{ $council->city }}@else{{ old('city') }}@endif" @if(isset($council) || old('city') != null) placeholder="" @endif required></input>
        <label for="city" class="">{{__('Mesto')}}</label>
    </div>
</div>
<div class="row"><!--Start 'area' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>location_city</i>
        <input type="text" name="area" id="area" class="validate @error('area') invalid @enderror"  
               value="@if(isset($council)){{ $council->area }}@else{{ old('area') }}@endif" @if(isset($council) || old('area') != null) placeholder="" @endif required></input>
        <label for="area" class="">{{__('Naselje')}}</label>
    </div>
</div>
<div class="row"><!--Start 'account' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>account_balance</i>
        <input type="text" name="account" id="account" class="validate @error('account') invalid @enderror"  
               value="@if(isset($council)){{ $council->account }}@else{{ old('account') }}@endif" @if(isset($council) || old('account') != null) placeholder="" @endif required></input>
        <label for="account" class="">{{__('Račun')}}</label>
    </div>
</div>
<div class="row"><!--Start 'maticni' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>assignment_ind</i>
        <input type="text" name="maticni" id="maticni" class="validate @error('maticni') invalid @enderror"  
               value="@if(isset($council)){{ $council->maticni }}@else{{ old('maticni') }}@endif" @if(isset($council) || old('maticni') != null) placeholder="" @endif required></input>
        <label for="maticni" class="">{{__('Matični broj')}}</label>
    </div>
</div>
<div class="row"><!--Start 'latitude' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>adjust</i>
        <input type="text" name="latitude" id="latitude" class="validate @error('latitude') invalid @enderror"  
               value="@if(isset($council)){{ $council->latitude }}@else{{ old('latitude') }}@endif" @if(isset($council) || old('latitude') != null) placeholder="" @endif required></input>
        <label for="latitude" class="">{{__('Geo X')}}</label>
    </div>
</div>
<div class="row"><!--Start 'longitude' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>adjust</i>
        <input type="text" name="longitude" id="longitude" class="validate @error('longitude') invalid @enderror"  
               value="@if(isset($council)){{ $council->longitude }}@else{{ old('longitude') }}@endif" @if(isset($council) || old('longitude') != null) placeholder="" @endif required></input>
        <label for="longitude" class="">{{__('Geo Y')}}</label>
    </div>
</div>
<div class="row"><!--Start 'pib' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>assignment</i>
        <input type="text" name="pib" id="pib" class="validate @error('pib') invalid @enderror"  
               value="@if(isset($council)){{ $council->pib }}@else{{ old('pib') }}@endif" @if(isset($council) || old('pib') != null) placeholder="" @endif required></input>
        <label for="pib" class="">{{__('PIB')}}</label>
    </div>
</div>
<div class="row"><!--Start 'phone' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>call</i>
        <input type="text" name="phone" id="phone" class="validate @error('phone') invalid @enderror"  
               value="@if(isset($council)){{ $council->phone }}@else{{ old('phone') }}@endif" @if(isset($council) || old('phone') != null) placeholder="" @endif required></input>
        <label for="phone" class="">{{__('Telefon')}}</label>
    </div>
</div>
@if(!isset($council))
<div class="row"><!--Start 'name' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>domain</i>
        <input type="text" name="ca_address" id="ca_address" class="validate @error('address') invalid @enderror"  
               value="@if(isset($address)){{ $address->address }}@else{{ old('address') }}@endif" @if(isset($address) || old('address') != null) placeholder="" @endif required></input>
        <label for="address" class="">{{__('Adresa')}}</label>
    </div>
</div>
<div class="row"><!--Start 'short_name' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>featured_play_list</i>
        <input type="text" name="protection_status" id="protection_status" class="validate @error('protection_status') invalid @enderror"  
               value="@if(isset($address)){{ $address->protection_status }}@else{{ old('protection_status') }}@endif" @if(isset($address) || old('sprotection_status') != null) placeholder="" @endif required></input>
        <label for="protection_status" class="">{{__('Status zaštite')}}</label>
    </div>
</div>
<div class="row"><!--Start 'city' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>location_city</i>
        <input type="text" name="area_size" id="area_size" class="validate @error('area_size') invalid @enderror"  
               value="@if(isset($address)){{ $address->area_size }}@else{{ old('area_size') }}@endif" @if(isset($address) || old('area_size') != null) placeholder="" @endif required></input>
        <label for="area_size" class="">{{__('Površina')}}</label>
    </div>
</div>
<div class="row"><!--Start 'area' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>date_range</i>
        <input type="text" name="built_year" id="built_year" class="validate @error('built_year') invalid @enderror"  
               value="@if(isset($address)){{ $address->built_year }}@else{{ old('built_year') }}@endif" @if(isset($address) || old('built_year') != null) placeholder="" @endif required></input>
        <label for="built_year" class="">{{__('Godina izgradnje')}}</label>
    </div>
</div>
<div class="row"><!--Start 'short_name' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>featured_play_list</i>
        <input type="text" name="ca_short_name" id="ca_short_name" class="validate @error('short_name') invalid @enderror"  
               value="@if(isset($address)){{ $address->short_name }}@else{{ old('short_name') }}@endif" @if(isset($address) || old('short_name') != null) placeholder="" @endif required></input>
        <label for="ca_short_name" class="">{{__('Oznaka')}}</label>
    </div>
</div>
<div class="row"><!--Start 'maticni' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>assignment_ind</i>
        <input type="text" name="elevators_number" id="elevators_number" class="validate @error('elevators_number') invalid @enderror"  
               value="@if(isset($address)){{ $address->elevators_number }}@else{{ old('elevators_number') }}@endif" @if(isset($address) || old('elevators_number') != null) placeholder="" @endif required></input>
        <label for="elevators_number" class="">{{__('Broj liftova')}}</label>
    </div>
</div>
<div class="row"><!--Start 'maticni' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>assignment_ind</i>
        <input type="text" name="floors_number" id="floors_number" class="validate @error('floors_number') invalid @enderror"  
               value="@if(isset($address)){{ $address->floors_number }}@else{{ old('floors_number') }}@endif" @if(isset($address) || old('floors_number') != null) placeholder="" @endif required></input>
        <label for="floors_number" class="">{{__('Broj etaža')}}</label>
    </div>
</div>
<div class="row"><!--Start 'status' form field-->
    <div class="input-field col s12 m6 l6">
        <i class='material-icons prefix'>assignment_ind</i>
        <select id="roof_type" name="roof_type">
            <option value="kosi" @if((isset($address) && $address->roof_type == 'kosi') || old('roof_type') == 'kosi') selected="selected" @endif>{{__('Kosi')}}</option>
            <option value="ravan" @if((isset($address) && $address->roof_type == 'ravan') || old('roof_type') == 'ravan') selected="selected" @endif>{{__('Ravan')}}</option>
        </select>
        <label>{{__('Tip krova')}}</label>
    </div>
</div>
<div class="row"><!--Start 'status' form field-->
    <div class="input-field col s12 m6 l6">
        <i class='material-icons prefix'>assignment_ind</i>
        <select id="lightning_rod" name="lightning_rod">
            <option value="1" @if((isset($address) && $address->lightning_rod == 1) || old('lightning_rod') == 1) selected="selected" @endif>{{__('Ima')}}</option>
            <option value="0" @if((isset($address) && $address->lightning_rod == 0) || old('lightning_rod') == 0) selected="selected" @endif>{{__('Nema')}}</option>
        </select>
        <label>{{__('Gromobran')}}</label>
    </div>
</div>
<div class="row"><!--Start 'status' form field-->
    <div class="input-field col s12 m6 l6">
        <i class='material-icons prefix'>assignment_ind</i>
        <select id="district_heating" name="district_heating">
            <option value="1" @if((isset($address) && $address->district_heating == 1) || old('district_heating') == 1) selected="selected" @endif>{{__('Ima')}}</option>
            <option value="0" @if((isset($address) && $address->district_heating == 0) || old('district_heating') == 0) selected="selected" @endif>{{__('Nema')}}</option>
        </select>
        <label>{{__('Daljinsko grejanje')}}</label>
    </div>
</div>
<div class="row"><!--Start 'status' form field-->
    <div class="input-field col s12 m6 l6">
        <i class='material-icons prefix'>assignment_ind</i>
        <select id="cellar" name="cellar">
            <option value="1" @if((isset($address) && $address->cellar == 1) || old('cellar') == 1) selected="selected" @endif>{{__('Ima')}}</option>
            <option value="0" @if((isset($address) && $address->cellar == 0) || old('cellar') == 0) selected="selected" @endif>{{__('Nema')}}</option>
        </select>
        <label>{{__('Podrum')}}</label>
    </div>
</div>
<div class="row"><!--Start 'status' form field-->
    <div class="input-field col s12 m6 l6">
        <i class='material-icons prefix'>assignment_ind</i>
        <select id="attic" name="attic">
            <option value="1" @if((isset($address) && $address->attic == 1) || old('attic') == 1) selected="selected" @endif>{{__('Ima')}}</option>
            <option value="0" @if((isset($address) && $address->attic == 0) || old('attic') == 0) selected="selected" @endif>{{__('Nema')}}</option>
        </select>
        <label>{{__('Tavan')}}</label>
    </div>
</div>
<div class="row"><!--Start 'status' form field-->
    <div class="input-field col s12 m6 l6">
        <i class='material-icons prefix'>assignment_ind</i>
        <select id="shelter" name="shelter">
            <option value="1" @if((isset($address) && $address->shelter == 1) || old('shelter') == 1) selected="selected" @endif>{{__('Ima')}}</option>
            <option value="0" @if((isset($address) && $address->shelter == 0) || old('shelter') == 0) selected="selected" @endif>{{__('Nema')}}</option>
        </select>
        <label>{{__('Sklonište')}}</label>
    </div>
</div>
<div class="row"><!--Start 'pib' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>assignment</i>
        <input type="text" name="energy_passport" id="energy_passport" class="validate @error('energy_passport') invalid @enderror"  
               value="@if(isset($address)){{ $address->energy_passport }}@else{{ old('energy_passport') }}@endif" @if(isset($address) || old('energy_passport') != null) placeholder="" @endif></input>
        <label for="energy_passport" class="">{{__('Energetski pasoš')}}</label>
    </div>
</div>
@endif
<div class="row"><!--Start submit button-->
    <div class="col s12 m6">
        <button type="submit" class="btn cyan waves-effect waves-light right">{{__('Sačuvaj')}}
            <i class="material-icons right">send</i>
        </button>
    </div>
</div>