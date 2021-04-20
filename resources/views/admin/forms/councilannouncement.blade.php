@csrf
@if(isset($announcement))
<input type="hidden" id="announcement_id" name="announcement_id" value="{{$announcement->id}}">
@endif
<input type="hidden" id="council_id" name="council_id" value="{{$council->id}}">
<div class="row"><!--Start 'name' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>date_range</i>
        <input type="text" name="date" id="date" class="datepicker validate @error('date') invalid @enderror"
               value="@if(isset($announcement)){{ $announcement->date }}@else{{ old('date') }}@endif" 
               @if(isset($announcement) || old('date') != null) placeholder="" @endif
               required></input>
        <label for="date" class="">{{__('Datum')}}</label>
    </div>
</div>
<div class="row"><!--Start 'short_name' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>featured_play_list</i>
        <input type="text" name="name" id="name" class="validate @error('name') invalid @enderror"  
               value="@if(isset($announcement)){{ $announcement->name }}@else{{ old('name') }}@endif" @if(isset($announcement) || old('name') != null) placeholder="" @endif required></input>
        <label for="name" class="">{{__('Naziv')}}</label>
    </div>
</div>
<div class="row"><!--Start 'description' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>event_note</i>
        <textarea type="text" name="greeting" id="greeting" class="materialize-textarea validate @error('greeting') invalid @enderror"
            value="@if(isset($announcement)){{$announcement->greeting}}@else{{old('greeting')}}@endif" @if(isset($announcement) || old('greeting') != null) placeholder="" @endif required>@if(isset($announcement)){{$announcement->greeting}}@else{{old('greeting')}}@endif</textarea>
        <label for="greeting" class="">{{__('Pozdrav')}}</label>
    </div>
</div>
<div class="row"><!--Start 'description' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>event_note</i>
        <textarea type="text" name="content" id="note" class="materialize-textarea validate @error('content') invalid @enderror"
            value="@if(isset($announcement)){{$announcement->content}}@else{{old('content')}}@endif" @if(isset($announcement) || old('content') != null) placeholder="" @endif required>@if(isset($announcement)){{$announcement->content}}@else{{old('content')}}@endif</textarea>
        <label for="content" class="">{{__('Sadržaj')}}</label>
    </div>
</div>
<div class="row"><!--Start 'description' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>event_note</i>
        <textarea type="text" name="signature" id="signature" class="materialize-textarea validate @error('signature') invalid @enderror"
            value="@if(isset($announcement)){{$announcement->signature}}@else{{old('signature')}}@endif" @if(isset($announcement) || old('signature') != null) placeholder="" @endif required>@if(isset($announcement)){{$announcement->signature}}@else{{old('signature')}}@endif</textarea>
        <label for="signature" class="">{{__('Potpis')}}</label>
    </div>
</div>
<div class="row"><!--Start submit button-->
    <div class="col s12 m6">
        <button type="submit" class="btn cyan waves-effect waves-light right">{{__('Sačuvaj')}}
            <i class="material-icons right">send</i>
        </button>
    </div>
</div>