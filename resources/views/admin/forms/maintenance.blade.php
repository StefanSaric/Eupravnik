@csrf
@if(isset($one_maintenance))
    <input type="hidden" id="maintenance_id" name="maintenance_id" value="{{$one_maintenance->id}}">
    <input type="hidden" id="group_id" name="group_id" value="{{$group_id}}">
    <input type="hidden" id="user_id" name="user_id" value="{{$user_id}}">
@else
    <input type="hidden" id="user_id" name="user_id" value="{{$user->id}}">
@endif
<div class="row"><!--Start 'Skupstina' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>business</i>
        <select name="council_id" id="council_id" class="form-control" required>
            @foreach($councils as $council)
                <option value="{{ $council->id }}" @if(isset($one_maintenance))@if($council_id == $council->id) selected="selected" @endif @endif>{{ $council->name }}</option>
            @endforeach
        </select>
        <label for="council_id" class="">{{__('Skupština')}}</label>
    </div>
</div>
<!--<div class="row">Start 'user_id' form field
    <div class="input-field col s12">
        <i class='material-icons prefix'>person</i>
        <input type="text" name="user_id" id="user_id" class="validate @error('user_id') invalid @enderror"
               value="@if(isset($one_maintenance)){{ $user_id }}@else{{ $user->id }}@endif" @if(isset($user) || old('name') != null) placeholder="" @endif disabled=""></input>
        <label for="user_id" class="">{{__('Upravnik')}}</label>
    </div>
</div>-->
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
<!-- If CREATE then the button that adds maintenance elements is added
     If EDIT then element of maintenance is added -->
@if(isset($one_maintenance))
    @foreach($maintenances_in_group as $num => $maintenance_in_group)
        <div id="element_{{$num}}" class="card z-depth-0  grey lighten-4">
            <div class="card-content">
                <div class="card-title row">
                    <div class="col s6 m6 l6">
                        <h5 class="card-title">Element analize</h5>
                    </div>
                    <div class="col s6 m6 l6" style="text-align: right">
                        <button type="button" class="remove-element mb-1 btn-small waves-effect waves-light red accent-2" id="remove-element_{{$num}}">
                            <i class="material-icons">clear</i>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6 l6">
                    <i class='material-icons prefix'>dashboard</i>
                        <select name="maintenance[{{$num}}][name]" id="maintenance[{{$num}}][name]" class="" required>
                            <option value="" disabled selected>Naziv elementa</option>
                            <option value="stepenice" @if($maintenance_in_group->name == 'stepenice') selected="selected" @endif>{{__('Stepenice')}}</option>
                            <option value="podrum" @if($maintenance_in_group->name == 'podrum') selected="selected" @endif>{{__('Podrum')}}</option>
                            <option value="lift" @if($maintenance_in_group->name == 'lift') selected="selected" @endif>{{__('Lift')}}</option>
                        </select>
                    </div>
                    <div class="col s12 m1 l1">
                    </div>
                    <div class="input-field col s12 m4 l4">
                    <i class='material-icons prefix'>star</i>
                        <select name="maintenance[{{$num}}][priority]" id="maintenance[{{$num}}][priority]" class="" required>
                            <option value="" disabled selected>Prioritet</option>
                            <option value="nizak" @if($maintenance_in_group->priority == 'nizak') selected="selected" @endif>{{__('Nizak')}}</option>
                            <option value="srednji" @if($maintenance_in_group->priority == 'srednji') selected="selected" @endif>{{__('Srednji')}}</option>
                            <option value="visok" @if($maintenance_in_group->priority == 'visok') selected="selected" @endif>{{__('Visok')}}</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6 l6">
                        <i class='material-icons prefix'>build</i>
                        <input type="text" name="maintenance[{{$num}}][reported_condition]" id = "maintenance[{{$num}}][reported_condition]" class="form-control"  placeholder="Stanje" 
                               value="{{$maintenance_in_group->reported_condition}}" required />
                    </div>
                    <div class="input-field col s12 m1 l1">
                    </div>
                    <div class="input-field col s12 m4 l4">
                        <i class='material-icons prefix'>date_range</i>
                        <input type="text" name="maintenance[{{$num}}][element_date]" id="maintenance[{{$num}}][element_date]" placeholder="Datum provere" class="datepicker" 
                               value="{{$maintenance_in_group->element_date}}" required></input>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6 l6">
                        <i class='material-icons prefix'>work</i>
                        <input type="text" name="maintenance[{{$num}}][contractor]" id = "maintenance[{{$num}}][contractor]" class="form-control"  placeholder="Izvođač" 
                               value="{{$maintenance_in_group->contractor}}" required />
                    </div>
                    <div class="col s12 m2 l2">
                    </div>
                    <div class="input-field col s12 m3 l3">
                        <label for="maintenance[{{$num}}][type_check]">
                            <input type="checkbox" name="maintenance[{{$num}}][type_check]" id="maintenance[{{$num}}][type_check]"
                                   @if($maintenance_in_group->is_checked == true) checked disabled="" @endif/>
                            <span>Prosledi u program održavanja?</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif
<div class="row"><!--Start add button-->
    <div id="add-boxes-old-unused">
        <input type="hidden" id="numofmaintenance" name="numofmaintenance" @if(isset($maintenance)) value="{{count($maintenance)}}" @elseif(isset($maintenances_in_group)) value="{{count($maintenances_in_group)}}" @else value="0" @endif>
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
