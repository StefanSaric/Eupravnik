@csrf
@if(isset($contract))
    <input type="hidden" id="contract_id" name="contract_id" value="{{$contract->id}}">
@endif
<input type="hidden" id="council_id" name="council_id" value="{{$council->id}}">
<div class="row"><!--Start 'partner' form field-->
    <div class="input-field col s12 m6 l6">
        <i class='material-icons prefix'>group</i>
        <select name="partner_id" id="partner_id" class="form-control" required>
            <option value="" disabled selected>{{__('Izaberite')}}</option>
            @foreach($partners as $partner)
                <option value="{{ $partner->id }}" @if(isset($contract))@if($contract->partner_id == $partner->id) selected="selected" @endif @endif>{{ $partner->name }}</option>
            @endforeach
        </select>
        <label for="partner_id" class="">{{__('Partner')}}</label>
    </div>
</div>
<div class="row"><!--Start 'description' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>location_city</i>
        <input type="text" name="description" id="description" class="validate @error('description') invalid @enderror"
               value="@if(isset($contract)){{ $contract->description }}@else{{ old('description') }}@endif" @if(isset($contract) || old('description') != null) placeholder="" @endif required></input>
        <label for="description" class="">{{__('Opis')}}</label>
    </div>
</div>
<div class="row"><!--Start 'date_from' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>date_range</i>
        <input type="text" name="date_from" id="date_from" class="datepicker validate @error('date_from') invalid @enderror"
               value="@if(isset($contract)){{ $contract->date_from }}@else{{ old('date_from') }}@endif"
               @if(isset($contract) || old('date_from') != null) placeholder="" @endif
               required></input>
        <label for="date_from" class="">{{__('Datum od')}}</label>
    </div>
</div>
<div class="row"><!--Start 'date_to' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>date_range</i>
        <input type="text" name="date_to" id="date_to" class="datepicker validate @error('date_to') invalid @enderror"
               value="@if(isset($contract)){{ $contract->date_to }}@else{{ old('date_to') }}@endif"
               @if(isset($contract) || old('date_to') != null) placeholder="" @endif
               required></input>
        <label for="date_to" class="">{{__('Datum do')}}</label>
    </div>
</div>
<div class="row"><!--Start 'price' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>location_city</i>
        <input type="number" name="price" id="price" class="validate @error('price') invalid @enderror"
               value="@if(isset($contract)){{ $contract->price }}@else{{ old('price') }}@endif" @if(isset($contract) || old('price') != null) placeholder="" @endif required></input>
        <label for="price" class="">{{__('Cena')}}</label>
    </div>
</div>
<div class="row"><!--Start 'group' form field-->
    <div class="input-field col s12 m6 l6">
        <i class='material-icons prefix'>assignment_ind</i>
        <select id="group" name="group">
            <option value="Grupa Stanova" @if(isset($contract) && $contract->group == 'group') selected="selected" @endif>{{__('Grupa Stanova')}}</option>
            <option value="Svi Stanovi" @if(isset($contract) && $contract->group == 'all') selected="selected" @endif>{{__('Svi Stanovi')}}</option>
        </select>
        <label>{{__('Grupa')}}</label>
    </div>
</div>
<div class="row"><!--Start submit button-->
    <div class="col s12 m6">
        <button type="submit" class="btn cyan waves-effect waves-light right">{{__('Sačuvaj')}}
            <i class="material-icons right">send</i>
        </button>
    </div>
</div>
