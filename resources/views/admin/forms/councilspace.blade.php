@csrf
@if(isset($space))
<input type="hidden" id="space_id" name="space_id" value="{{$space->id}}">
@endif
<input type="hidden" id="council_id" name="council_id" value="{{$council->id}}">
<div class="row"><!--Start 'council_address_id' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>markunread_mailbox</i>
        <select id="council_address_id" name="council_address_id">
            <option disabled="">{{__('Izaberite')}}</option>
            @foreach($council_addresses as $council_address)
            <option value="{{$council_address->id}}" @if(isset($space) && $space->council_address_id == $council_address->id) selected="selected" @endif>{{ $council_address->address }}</option>
            @endforeach
        </select>
        <label>{{__('Izaberi adresu skupštine stanara')}}</label>
    </div>
</div>
<div class="row"><!--Start 'representative' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>person</i>
        <input type="text" name="representative" id="representative" class="validate @error('representative') invalid @enderror"  
               value="@if(isset($space)){{ $space->representative }}@else{{ old('representative') }}@endif" @if(isset($space) || old('representative') != null) placeholder="" @endif required></input>
        <label for="representative" class="">{{__('Obveznik')}}</label>
    </div>
</div>
<div class="row"><!--Start 'phone' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>contact_phone</i>
        <input type="text" name="phone" id="phone" class="validate @error('phone') invalid @enderror"  
               value="@if(isset($space)){{ $space->phone }}@else{{ old('phone') }}@endif" @if(isset($space) || old('phone') != null) placeholder="" @endif required></input>
        <label for="phone" class="">{{__('Telefon')}}</label>
    </div>
</div>
<div class="row"><!--Start 'email' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>contact_mail</i>
        <input type="text" name="email" id="email" class="validate @error('email') invalid @enderror"  
               value="@if(isset($space)){{ $space->email }}@else{{ old('email') }}@endif" @if(isset($space) || old('email') != null) placeholder="" @endif required></input>
        <label for="email" class="">{{__('E-mail')}}</label>
    </div>
</div>
<div class="row"><!--Start 'floor_number' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>more_vert</i>
        <input type="text" name="floor_number" id="floor_number" class="validate @error('floor_number') invalid @enderror"  
               value="@if(isset($space)){{ $space->floor_number }}@else{{ old('floor_number') }}@endif" @if(isset($space) || old('floor_number') != null) placeholder="" @endif required></input>
        <label for="floor_number" class="">{{__('Sprat')}}</label>
    </div>
</div>
<div class="row"><!--Start 'apartment_number' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>more_horiz</i>
        <input type="text" name="apartment_number" id="apartment_number" class="validate @error('apartment_number') invalid @enderror"  
               value="@if(isset($space)){{ $space->apartment_number }}@else{{ old('apartment_number') }}@endif" @if(isset($space) || old('apartment_number') != null) placeholder="" @endif required></input>
        <label for="apartment_number" class="">{{__('Broj stana')}}</label>
    </div>
</div>
<div class="row"><!--Start 'household_members_number' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>group</i>
        <input type="text" name="household_members_number" id="household_members_number" class="validate @error('household_members_number') invalid @enderror"  
               value="@if(isset($space)){{ $space->household_members_number }}@else{{ old('household_members_number') }}@endif" @if(isset($space) || old('household_members_number') != null) placeholder="" @endif required></input>
        <label for="household_members_number" class="">{{__('Broj članova')}}</label>
    </div>
</div>
<div class="row"><!--Start 'reported_area_size' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>flip_to_front</i>
        <input type="text" name="reported_area_size" id="reported_area_size" class="validate @error('reported_area_size') invalid @enderror"  
               value="@if(isset($space)){{ $space->reported_area_size }}@else{{ old('reported_area_size') }}@endif" @if(isset($space) || old('reported_area_size') != null) placeholder="" @endif required></input>
        <label for="reported_area_size" class="">{{__('Prijavljena površina')}}</label>
    </div>
</div>
<div class="row"><!--Start 'on_site_area_size' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>flip_to_back</i>
        <input type="text" name="on_site_area_size" id="on_site_area_size" class="validate @error('on_site_area_size') invalid @enderror"  
               value="@if(isset($space)){{ $space->on_site_area_size }}@else{{ old('on_site_area_size') }}@endif" @if(isset($space) || old('on_site_area_size') != null) placeholder="" @endif required></input>
        <label for="on_site_area_size" class="">{{__('Zatečena površina')}}</label>
    </div>
</div>
<div class="row"><!--Start 'type' form field-->
    <div class="input-field col s12 m6 l6">
        <i class='material-icons prefix'>view_quilt</i>
        <select id="type" name="type">
            <option value="" disabled selected>{{__('Izaberite')}}</option>
            <option value="stambeni" @if((isset($space) && $space->type == 'stambeni') || old('type') == 'stambeni') selected="selected" @endif>{{__('Stambeni')}}</option>
            <option value="poslovni" @if((isset($space) && $space->type == 'poslovni') || old('type') == 'poslovni') selected="selected" @endif>{{__('Poslovni')}}</option>
        </select>
        <label>{{__('Tip')}}</label>
    </div>
</div>
<div class="row"><!--Start 'status' form field-->
    <div class="input-field col s12 m6 l6">
        <i class='material-icons prefix'>verified_user</i>
        <select id="status" name="status">
            <option value="" disabled selected>{{__('Izaberite')}}</option>
            <option value="aktivan" @if((isset($space) && $space->status == 'active') || old('status') == 'active') selected="selected" @endif>{{__('Aktivan')}}</option>
            <option value="neaktivan" @if((isset($space) && $space->status == 'inactive') || old('status') == 'inactive') selected="selected" @endif>{{__('Neaktivan')}}</option>
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

