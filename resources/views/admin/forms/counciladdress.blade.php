@csrf
@if(isset($address))
<input type="hidden" id="council_address_id" name="council_address_id" value="{{$address->id}}">
@endif
<input type="hidden" id="council_id" name="council_id" value="{{$council->id}}">
<div class="row"><!--Start 'name' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>domain</i>
        <input type="text" name="address" id="address" class="validate @error('address') invalid @enderror"  
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
        <i class='material-icons prefix'>calendar</i>
        <input type="text" name="built_year" id="built_year" class="validate @error('built_year') invalid @enderror"  
               value="@if(isset($address)){{ $address->built_year }}@else{{ old('built_year') }}@endif" @if(isset($address) || old('built_year') != null) placeholder="" @endif required></input>
        <label for="built_year" class="">{{__('Godina izgradnje')}}</label>
    </div>
</div>
<div class="row"><!--Start 'short_name' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>featured_play_list</i>
        <input type="text" name="short_name" id="short_name" class="validate @error('short_name') invalid @enderror"  
               value="@if(isset($address)){{ $address->short_name }}@else{{ old('short_name') }}@endif" @if(isset($address) || old('short_name') != null) placeholder="" @endif required></input>
        <label for="short_name" class="">{{__('Oznaka')}}</label>
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




<div class="row"><!--Start 'pib' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>assignment</i>
        <input type="text" name="energy_passport" id="energy_passport" class="validate @error('energy_passport') invalid @enderror"  
               value="@if(isset($address)){{ $address->energy_passport }}@else{{ old('energy_passport') }}@endif" @if(isset($address) || old('energy_passport') != null) placeholder="" @endif required></input>
        <label for="energy_passport" class="">{{__('Energetski pasoš')}}</label>
    </div>
</div>
<div class="row"><!--Start submit button-->
    <div class="col s12 m6">
        <button type="submit" class="btn cyan waves-effect waves-light right">{{__('Sačuvaj')}}
            <i class="material-icons right">send</i>
        </button>
    </div>
</div>