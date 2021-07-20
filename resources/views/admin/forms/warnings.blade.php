@csrf
@if(isset($warning))
    <input type="hidden" id="warning_id" name="warning_id" value="{{$warning->id}}">
@endif
<input type="hidden" id="base_url" value="{{url('/')}}"/>
<div class="row"><!--Start 'Council' form field-->
    <div class="input-field col s12 m6 l6">
        <i class='material-icons prefix'>group</i>
        <select name="council_id" id="council_id" class="form-control">
            <option value="" disabled selected>{{__('Izaberite')}}</option>
            @foreach($councils as $council)
                <option value="{{ $council->id }}" @if(isset($warning))@if($warning->council_id == $council->id) selected="selected" @endif @endif>{{ $council->name }}</option>
            @endforeach
        </select>
        <label for="council_id" class="">{{__('Skupstina')}}</label>
    </div>
</div>
<div class="row" id="address_div"><!--Start 'Address' form field-->
    <div class="input-field col s12 m6 l6">
        <i class='material-icons prefix'>group</i>
        <select name="address_id" id="address_id" class="form-control">
            @if(isset($warning))
                @foreach($addresses as $address)
                    <option id="address_id" value="{{ $address->id }}" @if(isset($warning))@if($warning->address_id == $address->id) selected="selected" @endif @endif>{{ $address->address}}</option>
                @endforeach
            @else
                <option value="" disabled selected>Izaberite</option>
            @endif
        </select>
        <label for="address_id" class="">Adresa</label>
    </div>
</div>
<div class="row"><!--Start 'Obveznik' form field-->
    <div class="input-field col s12 m6 l6">
        <i class='material-icons prefix'>group</i>
        <select name="space_id" id="space_id" class="form-control">
            @if(isset($warning))
                @foreach($spaces as $space)
                    <option id="space_id" value="{{ $space->id }}" @if(isset($warning))@if($warning->space_id == $space->id) selected="selected" @endif @endif>{{ $space->representative}} - Sprat: {{$space->floor_number}} - Stan: {{$space->apartment_number}}</option>
                @endforeach
            @else
                <option value="" disabled selected>{{__('Izaberite')}}</option>
            @endif
        </select>
        <label for="space_id" class="">{{__('Obveznik')}}</label>
    </div>
</div>
<div class="row"><!--Start 'Datum od' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>event</i>
        <input type="text" name="date_from" id="date_from" class="datepicker validate @error('date_from') invalid @enderror"
               value="@if(isset($warning)){{ $warning->date_from }}@else{{ old('date_from') }}@endif"
               @if(isset($warning) || old('date_from') != null) placeholder="" @endif
               required></input>
        <label for="date_from" class="">{{__('Datum od')}}</label>
    </div>
</div>
<div class="row"><!--Start 'Datum do' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>event</i>
        <input type="text" name="date_to" id="date_to" class="datepicker validate @error('date_to') invalid @enderror"
               value="@if(isset($warning)){{ $warning->date_to }}@else{{ old('date_to') }}@endif"
               @if(isset($warning) || old('date_to') != null) placeholder="" @endif
               required></input>
        <label for="date_to" class="">{{__('Datum do')}}</label>
    </div>
</div>
<div class="row"><!--Start 'Cena' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>attach_money</i>
        <input type="number" name="price" id="price" class="validate @error('price') invalid @enderror"
               value="@if(isset($warning)){{$warning->price}}@else{{old('price')}}@endif" @if(isset($warning) || old('price') != null) placeholder="" @endif required min="0"></input>
        <label for="price" class="">{{__('Cena')}}</label>
    </div>
</div>
<div class="row"><!--Start 'status' form field-->
    <div class="input-field col s12 m6 l6">
        <i class='material-icons prefix'>verified_user</i>
        <select id="status" name="status">
            <option value="" disabled selected>{{__('Izaberite')}}</option>
            <option value="Kreirana" @if(isset($warning)) selected="selected" @endif>{{__('Kreirana')}}</option>
            <option value="Prosleđena" @if(isset($warning)) selected="selected" @endif>{{__('Prosleđena')}}</option>
            <option value="Regulisana" @if(isset($warning)) selected="selected" @endif>{{__('Regulisana')}}</option>
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
