@csrf
@if(isset($worker))
    <input type="hidden" id="worker_id" name="worker_id" value="{{$worker->id}}">
@endif
<div class="row"><!--Start 'email' form field-->
    <div class="input-field col s12 m6 l6">
        <i class='material-icons prefix'>email</i>
        <input type="text" name="email" id="email" class="validate @error('email') invalid @enderror"
               value="@if(isset($worker)){{$worker->email}}@else{{old('email')}}@endif" @if(isset($worker) || old('email') != null) placeholder="" @endif required></input>
        <label for="email" class="">{{__('E-mail')}}</label>
    </div>
</div>
<div class="row"><!--Start 'Manager' form field-->
    <div class="input-field col s12 m6 l6">
        <i class='material-icons prefix'>group</i>
        <select name="type_id" id="type_id" class="form-control" required>
            @foreach($types as $type)
                <option value="{{ $type->id }}" @if(isset($worker))@if($worker->type_id == $type->id) selected="selected" @endif @endif>{{ $type->name }}</option>
            @endforeach
        </select>
        <label for="type_id" class="">{{__('Tip Radnika')}}</label>
    </div>
</div>
<div class="row"><!--Start 'First name' form field-->
    <div class="input-field col s12 m6 l6">
        <i class='material-icons prefix'>account_circle</i>
        <input type="text" name="first_name" id="first_name" class="validate @error('first_name') invalid @enderror"
               value="@if(isset($worker)){{ $worker->first_name }}@else{{ old('first_name') }}@endif" @if(isset($worker) || old('first_name') != null) placeholder="" @endif required></input>
        <label for="first_name" class="">{{__('Ime')}}</label>
    </div>
</div>
<div class="row"><!--Start 'Last name' form field-->
    <div class="input-field col s12 m6 l6">
        <i class='material-icons prefix'>account_circle</i>
        <input type="text" name="last_name" id="last_name" class="validate @error('last_name') invalid @enderror"
               value="@if(isset($worker)){{ $worker->last_name }}@else{{ old('last_name') }}@endif" @if(isset($worker) || old('last_name') != null) placeholder="" @endif required></input>
        <label for="last_name" class="">{{__('Prezime')}}</label>
    </div>
</div>
<div class="row"><!--Start 'Address' form field-->
    <div class="input-field col s12 m6 l6">
        <i class='material-icons prefix'>contact_mail</i>
        <input type="text" name="address" id="address" class="validate @error('address') invalid @enderror"
               value="@if(isset($worker)){{ $worker->address }}@else{{ old('address') }}@endif" @if(isset($worker) || old('address') != null) placeholder="" @endif required></input>
        <label for="address" class="">{{__('Adresa')}}</label>
    </div>
</div>
<div class="row"><!--Start 'Telephone' form field-->
    <div class="input-field col s12 m6 l6">
        <i class='material-icons prefix'>phone</i>
        <input type="text" name="telephone" id="telephone" class="validate @error('telephone') invalid @enderror"
               value="@if(isset($worker)){{ $worker->telephone }}@else{{ old('telephone') }}@endif" @if(isset($worker) || old('telephone') != null) placeholder="" @endif required></input>
        <label for="telephone" class="">{{__('Telefon')}}</label>
    </div>
</div>
<div class="row"><!--Start 'Licence' form field-->
    <div class="input-field col s12 m6 l6">
        <i class='material-icons prefix'>business_center</i>
        <input type="text" name="licence" id="licence" class="validate @error('licence') invalid @enderror"
               value="@if(isset($worker)){{ $worker->licence }}@else{{ old('licence') }}@endif" @if(isset($worker) || old('licence') != null) placeholder="" @endif required></input>
        <label for="licence" class="">{{__('Licenca')}}</label>
    </div>
</div>
<div class="row"><!--Start submit button-->
    <div class="col s12 m6">
        <button type="submit" class="btn cyan waves-effect waves-light right">{{__('Sačuvaj')}}
            <i class="material-icons right">send</i>
        </button>
    </div>
</div>
