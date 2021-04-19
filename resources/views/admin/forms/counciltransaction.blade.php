@csrf
@if(isset($transaction))
<input type="hidden" id="transaction_id" name="transaction_id" value="{{$transaction->id}}">
@endif
<input type="hidden" id="council_id" name="council_id" value="{{$council->id}}">
<div class="row"><!--Start 'name' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>date_range</i>
        <input type="text" name="date" id="date" class="datepicker validate @error('date') invalid @enderror"
               value="@if(isset($transaction)){{ $transaction->date }}@else{{ old('date') }}@endif" 
               @if(isset($transaction) || old('date') != null) placeholder="" @endif
               required></input>
        <label for="date" class="">{{__('Datum')}}</label>
    </div>
</div>
<div class="row"><!--Start 'city' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>location_city</i>
        <input type="number" name="amount" id="amount" class="validate @error('amount') invalid @enderror"  
               value="@if(isset($transaction)){{ $transaction->amount }}@else{{ old('amount') }}@endif" @if(isset($transaction) || old('amount') != null) placeholder="" @endif required></input>
        <label for="amount" class="">{{__('Cena')}}</label>
    </div>
</div>
<div class="row"><!--Start 'status' form field-->
    <div class="input-field col s12 m6 l6">
        <i class='material-icons prefix'>assignment_ind</i>
        <select id="type" name="type">
            <option value="income" @if(isset($transaction) && $transaction->type == 'income') selected="selected" @endif>{{__('Prihod')}}</option>
            <option value="payment" @if(isset($transaction) && $transaction->type == 'payment') selected="selected" @endif>{{__('Plaćanje')}}</option>
        </select>
        <label>{{__('Tip')}}</label>
    </div>
</div>
<div class="row"><!--Start 'description' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>event_note</i>
        <textarea type="text" name="note" id="note" class="materialize-textarea validate @error('note') invalid @enderror"
            value="@if(isset($transaction)){{$transaction->note}}@else{{old('note')}}@endif" @if(isset($transaction) || old('note') != null) placeholder="" @endif required>@if(isset($transaction)){{$transaction->note}}@else{{old('note')}}@endif</textarea>
        <label for="note" class="">{{__('Napmena')}}</label>
    </div>
</div>
<div class="row"><!--Start submit button-->
    <div class="col s12 m6">
        <button type="submit" class="btn cyan waves-effect waves-light right">{{__('Sačuvaj')}}
            <i class="material-icons right">send</i>
        </button>
    </div>
</div>