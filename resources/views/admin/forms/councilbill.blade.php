@csrf
@if(isset($bill))
<input type="hidden" id="bill_id" name="bill_id" value="{{$bill->id}}">
@endif
<input type="hidden" id="council_id" name="council_id" value="{{$council->id}}">
<div class="row"><!--Start 'name' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>date_range</i>
        <input type="text" name="date" id="date" class="datepicker validate @error('date') invalid @enderror"
               value="@if(isset($bill)){{ $bill->date }}@else{{ old('date') }}@endif" 
               @if(isset($bill) || old('date') != null) placeholder="" @endif
               required></input>
        <label for="date" class="">{{__('Datum')}}</label>
    </div>
</div>
<div class="row"><!--Start 'short_name' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>featured_play_list</i>
        <input type="text" name="partner" id="partner" class="validate @error('partner') invalid @enderror"  
               value="@if(isset($bill)){{ $bill->partner }}@else{{ old('partner') }}@endif" @if(isset($bill) || old('partner') != null) placeholder="" @endif required></input>
        <label for="partner" class="">{{__('Partner')}}</label>
    </div>
</div>
<div class="row"><!--Start 'city' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>location_city</i>
        <input type="number" name="amount" id="amount" class="validate @error('amount') invalid @enderror"  
               value="@if(isset($bill)){{ $bill->amount }}@else{{ old('amount') }}@endif" @if(isset($bill) || old('amount') != null) placeholder="" @endif required></input>
        <label for="amount" class="">{{__('Cena')}}</label>
    </div>
</div>
<div class="row"><!--Start 'status' form field-->
    <div class="input-field col s12 m6 l6">
        <i class='material-icons prefix'>assignment_ind</i>
        <select id="type" name="type">
            <option value="income" @if(isset($bill) && $bill->type == 'income') selected="selected" @endif>{{__('Prihod')}}</option>
            <option value="payment" @if(isset($bill) && $bill->type == 'payment') selected="selected" @endif>{{__('Plaćanje')}}</option>
        </select>
        <label>{{__('Tip')}}</label>
    </div>
</div>
<div class="row"><!--Start submit button-->
    <div class="col s12 m6">
        <button type="submit" class="btn cyan waves-effect waves-light right">{{__('Sačuvaj')}}
            <i class="material-icons right">send</i>
        </button>
    </div>
</div>