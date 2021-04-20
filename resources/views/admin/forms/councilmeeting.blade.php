@csrf
@if(isset($meeting))
<input type="hidden" id="meeting_id" name="meeting_id" value="{{$meeting->id}}">
@endif
<input type="hidden" id="council_id" name="council_id" value="{{$council->id}}">
<div class="row"><!--Start 'name' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>date_range</i>
        <input type="text" name="date" id="date" class="datepicker validate @error('date') invalid @enderror"
               value="@if(isset($meeting)){{ $meeting->date }}@else{{ old('date') }}@endif" 
               @if(isset($meeting) || old('date') != null) placeholder="" @endif
               required></input>
        <label for="date" class="">{{__('Datum')}}</label>
    </div>
</div>
<div class="row">
    <div class="input-field col s6 m6"><!--Start 'Time_from' form field-->
        <i class='material-icons prefix'>access_time</i>
        <input type="text" name="time" id="time" class="timepicker"
               value="@if(isset($meeting)){{ $meeting->time }}@else{{ old('time') }}@endif" 
               @if(isset($meeting) || old('time') != null) placeholder="" @endif
               required></input>
        <label for="time" class="">{{__('Vreme')}}</label>
    </div>
</div>
@if(!isset($meeting))
<div class="row"><!--Start 'status' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>assignment_ind</i>
        <select id="type" name="type">
            <option value="0" @if(isset($meeting) && $meeting->is_announced == 0) selected="selected" @endif>{{__('Samo dodaj sastanak')}}</option>
            <option value="1" @if(isset($meeting) && $meeting->is_announced == 1 && $meeting->email_sent == 0) selected="selected" @endif>{{__('Dodaj sastanak i obaveštenje')}}</option>
            <option value="2" @if(isset($meeting) && $meeting->email_sent == 1) selected="selected" @endif>{{__('Dodajs sastanak, obaveštenje i pošalji email')}}</option>
        </select>
        <label>{{__('Akcije')}}</label>
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