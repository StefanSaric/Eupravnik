@csrf
@if(isset($role))
<input type="hidden" id="role_id" name="role_id" value="{{$role->id}}">
@endif
<div class="row"><!--Start 'name' form field-->
    <div class="input-field col s12 m6">
        <i class='material-icons prefix'>security</i>
        <input type="text" name="name" id="name" class="validate @error('name') invalid @enderror"  
               value="@if(isset($role)){{ $role->name }}@else{{ old('name') }}@endif" @if(isset($role) || old('name') != null) placeholder="" @endif required></input>
        <label for="name" class="">{{__('Ime')}}</label>
    </div>
</div>
<div class="row"><!--Start submit button-->
    <div class="col s12 m6">
    <button type="submit" class="btn cyan waves-effect waves-light right">{{__('Sačuvaj')}}
        <i class="material-icons right">send</i>
    </button>
    </div>
</div>
