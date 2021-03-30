@csrf
@if(isset($maintenance))
    <input type="hidden" id="worker_id" name="worker_id" value="{{$maintenance->id}}">
@endif
<div class="row"><!--Start 'Skupstina' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>Skupstina</i>
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
        <i class='material-icons prefix'>User</i>
        <input type="text" name="user_id" id="user_id" class="validate @error('user_id') invalid @enderror"
               value="{{$user->name}}"></input>
        <label for="user_id" class="">{{__('Upravnik')}}</label>
    </div>
</div>
<div class="row"><!--Start 'Date' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>Date</i>
        <input type="date" name="date" id="date" class="validate @error('date') invalid @enderror"
               value="{{date("Y-m-d")}}" required></input>
        <label for="date" class="">{{__('Datum')}}</label>
    </div>
</div>
<div class="row"><!--Start add button-->
    <div id="add-boxes">
        <input type="hidden" id="numofmaintenance" name="numofmaintenance" @if(isset($maintenance)) value="{{count($maintenance)}}" @else value="0" @endif>
        <div class="input-field col s12">
            <button type="button" class="btn cyan waves-effect waves-light left" id="addMaintenance" >{{__('Dodaj')}}
                <i class="material-icons left">add</i>
            </button>
        </div>
    </div>
</div>
<div class="row"><!--Start submit button-->
    <div class="input-field col s12">
        <button type="submit" class="btn cyan waves-effect waves-light right">{{__('Sačuvaj')}}
            <i class="material-icons right">send</i>
        </button>
    </div>
</div>
