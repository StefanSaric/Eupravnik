@csrf
@if(isset($one_maintenance))
    <input type="hidden" id="maintenance_id" name="maintenance_id" value="{{$one_maintenance->id}}">
@endif
<div class="row"><!--Start 'Skupstina' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>business</i>
        <select name="council_id" id="council_id" class="form-control" required>
            @foreach($councils as $council)
                <option value="{{ $council->id }}">{{ $council->name }}</option>
            @endforeach
        </select>
        <label for="council_id" class="">{{__('Skupština')}}</label>
    </div>
</div>
<div class="row"><!--Start 'user_id' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>person</i>
        <input type="text" name="user_id" id="user_id" class="validate @error('user_id') invalid @enderror"
               value="@if(isset($one_maintenance)){{ $user_name }}@else{{ $user->name }}@endif" @if(isset($user) || old('name') != null) placeholder="" @endif></input>
        <label for="user_id" class="">{{__('Upravnik')}}</label>
    </div>
</div>
<div class="row"><!--Start 'Date' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>date_range</i>
        <input type="text" name="date" id="date" class="datepicker validate @error('date') invalid @enderror"
               value="@if(isset($one_maintenance)){{ $one_maintenance->date }}@else{{ old('date') }}@endif" 
               @if(isset($one_maintenance) || old('date') != null) placeholder="" @endif
               required></input>
        <label for="date" class="">{{__('Datum')}}</label>
    </div>
</div>
<div class="row"><!--Start add button-->
    <div id="add-boxes-old-unused">
        <input type="hidden" id="numofmaintenance" name="numofmaintenance" @if(isset($maintenance)) value="{{count($maintenance)}}" @else value="0" @endif>
        <div class="input-field col s12">
            <button type="button" class="btn cyan waves-effect waves-light left" id="addMaintenance" >{{__('Dodaj element')}}
                <i class="material-icons left">add</i>
            </button>
        </div>
    </div>
</div>
<div id="add-boxes">
</div>
<div class="row"><!--Start submit button-->
    <div class="input-field col s12">
        <button type="submit" class="btn cyan waves-effect waves-light right">{{__('Sačuvaj')}}
            <i class="material-icons right">send</i>
        </button>
    </div>
</div>
