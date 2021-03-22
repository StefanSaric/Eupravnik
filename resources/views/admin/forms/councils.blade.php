@csrf
@if(isset($council))
<input type="hidden" id="council_id" name="council_id" value="{{$council->id}}">
@endif
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
<div class="row"><!--Start submit button-->
    <div class="col s12 m6">
        <button type="submit" class="btn cyan waves-effect waves-light right">{{__('Sačuvaj')}}
            <i class="material-icons right">send</i>
        </button>
    </div>
</div>