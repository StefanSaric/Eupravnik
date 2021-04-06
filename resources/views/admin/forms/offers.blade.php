@csrf
@if(isset($offer))
    <input type="hidden" id="offer_id" name="offer_id" value="{{$offer->id}}">
@endif
<div class="row"><!--Start 'Skupstina' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>business</i>
        <select name="partner_id" id="partner_id" class="form-control" required>
            @foreach($partners as $partner)
                <option value="{{ $partner->id }}">{{ $partner->name }}</option>
            @endforeach
        </select>
        <label for="partner_id" class="">{{__('Partner')}}</label>
    </div>
</div>
<div class="row"><!--Start 'Datum' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>date_range</i>
        <input type="text" name="date" id="date" class="datepicker validate @error('date') invalid @enderror"
               value="@if(isset($offer)){{ $offer->date }}@else{{ old('date') }}@endif"
               @if(isset($offer) || old('date') != null) placeholder="" @endif
               required></input>
        <label for="date" class="">{{__('Datum')}}</label>
    </div>
</div>
<div class="row"><!--Start 'Cena' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>attach_money</i>
        <input type="number" name="price" id="price" class="validate @error('price') invalid @enderror"
               value="@if(isset($offer)){{$offer->price}}@else{{old('price')}}@endif" @if(isset($offer) || old('price') != null) placeholder="" @endif required></input>
        <label for="price" class="">{{__('Cena')}}</label>
    </div>
</div>
<div class="row"><!--Start 'description' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>description</i>
        <textarea type="text" name="description" id="description" class="materialize-textarea validate @error('description') invalid @enderror"
               value="@if(!isset($offer)){{old('description')}}@endif" @if(isset($offer) || old('description') != null) placeholder="" @endif required></textarea>
        <label for="description" class="">{{__('Opis')}}</label>
    </div>
</div>
<div class="row"><!--Start 'Dokument' form field-->
    <div class="input-field col s12">
        <i class='material-icons prefix'>attach_file</i>
        <label for="documents" class="">{{__('Dodati Dokument')}}</label>
        <div style="margin-top: 60px">
            <input type="file" name="documents[]" id="documents" class="file-upload" accept="application/pdf" multiple>
        </div>
    </div>
</div>
<div class="row"><!--Start submit button-->
    <button type="submit" class="btn cyan waves-effect waves-light right">{{__('Sačuvaj')}}
        <i class="material-icons right">send</i>
    </button>
</div>
