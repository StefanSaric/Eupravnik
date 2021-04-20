@csrf
@if(isset($lawsuit))
    <input type="hidden" id="lawsuit_id" name="lawsuit_id" value="{{$lawsuit->id}}">
@endif
<div class="row"><!--Start 'Council' form field-->
    <div class="input-field col s12 m6 l6">
        <i class='material-icons prefix'>group</i>
        <select name="council_id" id="council_id" class="form-control" required>
            <option value="" disabled selected>{{__('Izaberite')}}</option>
            @foreach($councils as $council)
                <option value="{{ $council->id }}" @if(isset($lawsuit))@if($lawsuit->council_id == $council->id) selected="selected" @endif @endif>{{ $council->name }}</option>
            @endforeach
        </select>
        <label for="council_id" class="">{{__('Skupstina')}}</label>
    </div>
</div>
<div class="row"><!--Start 'Partner' form field-->
    <div class="input-field col s12 m6 l6">
        <i class='material-icons prefix'>group</i>
        <select name="partner_id" id="partner_id" class="form-control" required>
            <option value="" disabled selected>{{__('Izaberite')}}</option>
            @foreach($partners as $partner)
                <option value="{{ $partner->id }}" @if(isset($lawsuit))@if($lawsuit->partner_id == $partner->id) selected="selected" @endif @endif>{{ $partner->name }}</option>
            @endforeach
        </select>
        <label for="partner_id" class="">{{__('Obveznik')}}</label>
    </div>
</div>
<div class="row"><!--Start 'Izvršitelj' form field-->
    <div class="input-field col s12 m6 l6">
        <i class='material-icons prefix'>group</i>
        <select name="enforcer_id" id="enforcer_id" class="form-control" required>
            <option value="" disabled selected>{{__('Izaberite')}}</option>
            @foreach($enforcers as $enforcer)
                <option value="{{ $enforcer->id }}" @if(isset($lawsuit))@if($lawsuit->enforcer_id == $enforcer->id) selected="selected" @endif @endif>{{ $enforcer->name }}</option>
            @endforeach
        </select>
        <label for="enforcer_id" class="">{{__('Izvršitelj')}}</label>
    </div>
</div>
<div class="row"><!--Start 'Datum od' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>event</i>
        <input type="text" name="date_from" id="date_from" class="datepicker validate @error('date_from') invalid @enderror"
               value="@if(isset($lawsuit)){{ $lawsuit->date_from }}@else{{ old('date_from') }}@endif"
               @if(isset($lawsuit) || old('date_from') != null) placeholder="" @endif
               required></input>
        <label for="date_from" class="">{{__('Datum od')}}</label>
    </div>
</div>
<div class="row"><!--Start 'Datum do' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>event</i>
        <input type="text" name="date_to" id="date_to" class="datepicker validate @error('date_to') invalid @enderror"
               value="@if(isset($lawsuit)){{ $lawsuit->date_to }}@else{{ old('date_to') }}@endif"
               @if(isset($lawsuit) || old('date_to') != null) placeholder="" @endif
               required></input>
        <label for="date_to" class="">{{__('Datum do')}}</label>
    </div>
</div>
<div class="row"><!--Start 'Cena' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>attach_money</i>
        <input type="number" name="price" id="price" class="validate @error('price') invalid @enderror"
               value="@if(isset($lawsuit)){{$lawsuit->price}}@else{{old('price')}}@endif" @if(isset($lawsuit) || old('price') != null) placeholder="" @endif required min="0"></input>
        <label for="price" class="">{{__('Cena')}}</label>
    </div>
</div>
<div class="row"><!--Start 'status' form field-->
    <div class="input-field col s12 m6 l6">
        <i class='material-icons prefix'>verified_user</i>
        <select id="status" name="status">
            <option value="" disabled selected>{{__('Izaberite')}}</option>
            <option value="Kreirana" @if(isset($lawsuit)) selected="selected" @endif>{{__('Kreirana')}}</option>
            <option value="Prosleđena" @if(isset($lawsuit)) selected="selected" @endif>{{__('Prosleđena')}}</option>
            <option value="Regulisana" @if(isset($lawsuit)) selected="selected" @endif>{{__('Regulisana')}}</option>
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
