@csrf
@if(isset($duty))
    <input type="hidden" id="duty_id" name="duty_id" value="{{$duty->id}}">
@endif
<div class="row"><!--Start 'name' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>short_text</i>
        <input type="text" name="name" id="name" class="validate @error('name') invalid @enderror"  
               value="@if(isset($duty)){{ $duty->name }}@else{{ old('name') }}@endif" @if(isset($duty) || old('name') != null) placeholder="" @endif ></input>
        <label for="name" class="">{{__('Naziv')}}</label>
    </div>
</div>
<div class="row"><!--Start 'description' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>event_note</i>
        <textarea type="text" name="description" id="description" class="materialize-textarea validate @error('description') invalid @enderror"
            value="@if(isset($duty)){{$duty->description}}@else{{old('description')}}@endif" @if(isset($duty) || old('description') != null) placeholder="" @endif required>@if(isset($duty)){{$duty->description}}@else{{old('description')}}@endif</textarea>
        <label for="description" class="">{{__('Opis')}}</label>
    </div>
</div>
<div class="row">
    <div class="input-field col s12 m5 l5"><!--Start 'Date_from' form field-->
        <i class='material-icons prefix'>date_range</i>
        <input type="text" name="date_from" id="date_from" class="datepicker validate @error('date') invalid @enderror"
               value="@if(isset($duty)){{ $duty->date_from }}@else{{ old('date_from') }}@endif" 
               @if(isset($duty) || old('date_from') != null) placeholder="" @endif
               required></input>
        <label for="date_from" class="">{{__('Datum od')}}</label>
    </div>
    <div class="col s11 m2 l2">
    </div>
    <div class="input-field col s12 m5 l5"><!--Start 'Time_from' form field-->
        <i class='material-icons prefix'>access_time</i>
        <input type="text" name="time_from" id="time_from" class="timepicker"
               value="@if(isset($duty)){{ $duty->time_from }}@else{{ old('time_from') }}@endif" 
               @if(isset($duty) || old('time_from') != null) placeholder="" @endif
               required></input>
        <label for="date_from" class="">{{__('Vreme od')}}</label>
    </div>
</div>
<div class="row">
    <div class="input-field col s12 m5 l5"><!--Start 'Date_to' form field-->
        <i class='material-icons prefix'>date_range</i>
        <input type="text" name="date_to" id="date_to" class="datepicker validate @error('date') invalid @enderror"
               value="@if(isset($duty)){{ $duty->date_to }}@else{{ old('date_to') }}@endif" 
               @if(isset($duty) || old('date_to') != null) placeholder="" @endif
               required></input>
        <label for="date_to" class="">{{__('Datum do')}}</label>
    </div>
    <div class="col s11 m2 l2">
    </div>
    <div class="input-field col s12 m5 l5"><!--Start 'Time_to' form field-->
        <i class='material-icons prefix'>access_time</i>
        <input type="text" name="time_to" id="time_to" class="timepicker"
               value="@if(isset($duty)){{ $duty->time_to }}@else{{ old('time_to') }}@endif" 
               @if(isset($duty) || old('time_to') != null) placeholder="" @endif
               required></input>
        <label for="time_to" class="">{{__('Vreme do')}}</label>
    </div>
</div>
<div class="row"><!--Start 'Is_private' form field-->
    <div class="input-field col s12 m11 l11">
        <i class='material-icons prefix'>portrait</i>
        <label for="is_private">
            <input type="checkbox" name="is_private" id="is_private"
                   @if(isset($duty) && $duty->is_private == true) checked @endif/>
            <span>{{__('Privatna obaveza') . '?'}}</span>
        </label>
    </div>
</div>
<div class="row"><!--Start submit button-->
    <div class="input-field col s12">
        <button type="submit" class="btn cyan waves-effect waves-light right">{{__('Sačuvaj')}}
            <i class="material-icons right">send</i>
        </button>
    </div>
</div>


