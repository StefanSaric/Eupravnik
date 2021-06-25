@csrf
@if(isset($firm))
    <input type="hidden" id="id" name="id" value="{{$firm->id}}">
    <input type="hidden" id="user_id" name="user_id" value="{{$firm->user_id}}">
@endif
<div class="row"><!--Start 'Name' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>account_circle</i>
        <input type="text" name="name" id="name" class="validate @error('name') invalid @enderror"
               value="@if(isset($firm)){{ $firm->name }}@else{{ old('name') }}@endif" @if(isset($firm) || old('name') != null) placeholder="" @endif required></input>
        <label for="name" class="">{{__('Naziv')}}</label>
    </div>
</div>
<div class="row"><!--Start 'Address' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>location_city</i>
        <input type="text" name="address" id="address" class="validate @error('address') invalid @enderror"
               value="@if(isset($firm)){{ $firm->address }}@else{{ old('address') }}@endif" @if(isset($firm) || old('address') != null) placeholder="" @endif required></input>
        <label for="address" class="">{{__('Adresa')}}</label>
    </div>
</div>
<div class="row"><!--Start 'City' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>location_city</i>
        <input type="text" name="city" id="city" class="validate @error('city') invalid @enderror"
               value="@if(isset($firm)){{$firm->city}}@else{{old('city')}}@endif" @if(isset($firm) || old('city') != null) placeholder="" @endif required></input>
        <label for="city" class="">{{__('Mesto')}}</label>
    </div>
</div>
<div class="row"><!--Start 'Post' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>drafts</i>
        <input type="text" name="post" id="post" class="validate @error('post') invalid @enderror"
               value="@if(isset($firm)){{$firm->post}}@else{{old('post')}}@endif" @if(isset($firm) || old('post') != null) placeholder="" @endif required></input>
        <label for="post" class="">{{__('Pošta')}}</label>
    </div>
</div>
<div class="row"><!--Start 'Phone' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>phone</i>
        <input type="text" name="phone" id="phone" class="validate @error('phone') invalid @enderror"
               value="@if(isset($firm)){{$firm->phone}}@else{{old('phone')}}@endif" @if(isset($firm) || old('phone') != null) placeholder="" @endif required></input>
        <label for="phone" class="">{{__('Telefon')}}</label>
    </div>
</div>
<div class="row"><!--Start 'email' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>email</i>
        <input type="text" name="email" id="email" class="validate @error('email') invalid @enderror"
               value="@if(isset($firm)){{$firm->email}}@else{{old('email')}}@endif" @if(isset($firm) || old('email') != null) placeholder="" @endif required></input>
        <label for="email" class="">{{__('E-mail')}}</label>
    </div>
</div>
<div class="row"><!--Start 'pib' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>email</i>
        <input type="text" name="pib" id="pib" class="validate @error('pib') invalid @enderror"
               value="@if(isset($firm)){{$firm->pib}}@else{{old('pib')}}@endif" @if(isset($firm) || old('pib') != null) placeholder="" @endif required></input>
        <label for="pib" class="">{{__('PIB')}}</label>
    </div>
</div>
<div class="row"><!--Start 'id_number' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>document</i>
        <input type="text" name="id_number" id="id_number" class="validate @error('id_number') invalid @enderror"
               value="@if(isset($firm)){{$firm->id_number}}@else{{old('id_number')}}@endif" @if(isset($firm) || old('id_number') != null) placeholder="" @endif required></input>
        <label for="id_number" class="">{{__('Matični Broj')}}</label>
    </div>
</div>
<div class="row"><!--Start 'account' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>payment</i>
        <input type="text" name="account" id="account" class="validate @error('account') invalid @enderror"
               value="@if(isset($firm)){{$firm->account}}@else{{old('account')}}@endif" @if(isset($firm) || old('account') != null) placeholder="" @endif required></input>
        <label for="account" class="">{{__('Račun')}}</label>
    </div>
</div>
<div class="row"><!--Start 'account' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>vpn_key</i>
        <input type="password" name="password" id="password" class="validate @error('password') invalid @enderror"
               value="@if(isset($firm)){{$firm->password}}@else{{old('password')}}@endif" @if(isset($firm) || old('password') != null) placeholder="" @endif required></input>
        <label for="password" class="">{{__('Šifra')}}</label>
    </div>
</div>
<div class="row"><!--Start 'account' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>monetization_on</i>
        <input type="number" name="percentage" id="percentage" class="validate @error('percentage') invalid @enderror"
               value="@if(isset($firm)){{$firm->percentage}}@else{{old('percentage')}}@endif" @if(isset($firm) || old('percentage') != null) placeholder="" @endif required></input>
        <label for="percentage" class="">{{__('Procenat naplate usluga')}}</label>
    </div>
</div>
<div class="row"><!--Start submit button-->
    <div class="col s12">
        <button type="submit" class="btn cyan waves-effect waves-light right">{{__('Sačuvaj')}}
            <i class="material-icons right">send</i>
        </button>
    </div>
</div>
