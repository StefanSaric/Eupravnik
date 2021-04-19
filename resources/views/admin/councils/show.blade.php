@extends('admin.layouts.layout')

@section('vendorCss')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/css/jquery.dataTables.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/extensions/Responsive/css/responsive.dataTables.min.css')}}"/>
@stop

@section('pageCss')
<link rel="stylesheet" type="text/css" href="{{asset('css/datatables.css')}}"/>
@stop

@section('content')
@if(Session::has('message'))
<input id="message" type="hidden" value="{{ Session::get('message') }}" />
@endif

<div class="row">
    <div id="breadcrumbs-wrapper" data-image="{{asset('images/breadcrumb-bg.jpg')}}">
        <!-- Search for small screen-->
        <div class="container">
            <div class="row">
                <div class="col s12 m6 l6">
                    <h5 class="breadcrumbs-title mt-0 mb-0"><span>{{__('Skupštine stanara')}}</span></h5>
                </div>
                <div class="col s12 m6 l6 right-align-md">
                    <ol class="breadcrumbs mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ url('admin/') }}">Dash</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ url('admin/councils') }}">{{__('Skupštine stanara')}}</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ url('admin/councils/show/'.$council->id) }}">{{ $council->name }}</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="col s12">
        <div class="container">
            <div class="section">
                <div class="row">
                    <div class="col s12">
                        <div id="clendar" class="card">
                            <div class="card-content">
                                <div class="card-title">
                                    <div class="row">
                                        <div class="col s12 m6 l6">
                                            <h4 class="card-title">{{$council->name}}</h4>
                                        </div>
                                        <div class="col s12 m6 l6">
                                            <p class='pull-right'></p>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="card-tabs">
                                <ul class="tabs tabs-fixed-width">
                                    <li class="tab">
                                        <a href="#addresses" @if($acttab == 'addresses') class="active" @endif>Info</a>
                                    </li>
                                    <li class="tab">
                                        <a href="#units" @if($acttab == 'units') class="active" @endif>Prostori</a>
                                    </li>
                                    <li class="tab">
                                        <a href="#contracts" @if($acttab == 'contracts') class="active" @endif>Ugovori</a>
                                    </li>
                                    <li class="tab">
                                        <a href="#bills" @if($acttab == 'bills') class="active" @endif>Fakturisanje</a>
                                    </li>
                                    <li class="tab">
                                        <a href="#transactions" @if($acttab == 'transactions') class="active" @endif>Transakcije</a>
                                    </li>
                                    <li class="tab">
                                        <a href="#assignments" @if($acttab == 'assignments') class="active" @endif>Nalozi</a>
                                    </li>
                                    <li class="tab">
                                        <a href="#announcements" @if($acttab == 'announcements') class="active" @endif>Obaveštenja</a>
                                    </li>
                                    <li class="tab">
                                        <a href="#meetings" @if($acttab == 'meetings') class="active" @endif>Sednice</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-content">
                                <div id="addresses">
                                    <div class='row'>
                                        <div class='col s12 m6 l6'>
                                            <text style="font-weight: bold; color: black">{{__('Skupština: ')}}</text>{{ $council->name }}
                                        </div>
                                        <div class='col s12 m6 l6'>
                                            <text style="font-weight: bold; color: black">{{__('Skraćeno ime: ')}}</text>{{ $council->short_name }}
                                        </div>
                                    </div>
                                    <div class='row'>
                                        <div class='col s12 m6 l6'>
                                            <text style="font-weight: bold; color: black">{{__('Mesto: ')}}</text>{{ $council->city }}
                                        </div>
                                        <div class='col s12 m6 l6'>
                                            <text style="font-weight: bold; color: black">{{__('Naselje: ')}}</text>{{ $council->area }}
                                        </div>
                                    </div>
                                    @foreach($addresses as $key => $address)
                                    <div class='row' style="background-color: #f2f2f2">
                                        <div class='col s10 m10 l10'>
                                            <h5>{{__('Adresa')}}@if(count($addresses)>1){{' '.($key+1)}}@endif: {{$address->address}}</h5>
                                        </div>
                                        <div class='col s2 m2 l2'>
                                            <a href="{{url('/admin/councils/editAddress/'.$address->id)}}" class="btn-floating btn-small tooltipped waves-effect waves-light gradient-45deg-green-teal" data-position="top" data-tooltip="{{__('Uredi adresu')}}">
                                                                    <i class="material-icons">create</i></a>
                                            <a href='{{url('/admin/councils/deleteAddress/'.$address->id)}}' class="btn-floating btn-small tooltipped waves-effect waves-light gradient-45deg-red-pink" data-position="top" data-tooltip="{{__('Obriši adresu')}}">
                                                <i class="material-icons">delete</i></a>
                                        </div>
                                    </div>
                                    <div class='row'> 
                                        <div class='col s12 m12 l12'>
                                            <text style="font-weight: bold; color: black">{{__('Status zaštite: ')}}</text>{{ $address->protection_status }}
                                        </div>
                                    </div>
                                    <div class='row'>
                                        <div class='col s12 m4 l4'>
                                            <text style="font-weight: bold; color: black">{{__('Površina: ')}}</text>{{ $address->area_size }}
                                        </div>
                                        <div class='col s12 m4 l4'>
                                            <text style="font-weight: bold; color: black">{{__('Godina izgradnje: ')}}</text>{{ $address->built_year }}
                                        </div>
                                        <div class='col s12 m4 l4'>
                                            <text style="font-weight: bold; color: black">{{__('Broj etaža: ')}}</text>{{ $address->floors_number }}
                                        </div>
                                    </div>
                                    <div class='row'>
                                        <div class='col s12 m4 l4'>
                                            <text style="font-weight: bold; color: black">{{__('Broj liftova: ')}}</text>{{ $address->elevators_number }}
                                        </div>
                                        <div class='col s12 m4 l4'>
                                            <text style="font-weight: bold; color: black">{{__('Tip krova: ')}}</text>{{ $address->roof_type }}
                                        </div>
                                        <div class='col s12 m4 l4'>
                                            <text style="font-weight: bold; color: black">{{__('Gromobran: ')}}</text>@if($address->lightning_road){{__('ima')}}@else{{__('nema')}}@endif
                                        </div>
                                    </div>
                                    <div class='row'>
                                        <div class='col s12 m4 l4'>
                                            <text style="font-weight: bold; color: black">{{__('Daljinsko grejanje: ')}}</text>@if($address->district_heating){{__('ima')}}@else{{__('nema')}}@endif
                                        </div>
                                        <div class='col s12 m4 l4'>
                                            <text style="font-weight: bold; color: black">{{__('Podrum: ')}}</text>@if($address->cellar){{__('ima')}}@else{{__('nema')}}@endif
                                        </div>
                                        <div class='col s12 m4 l4'>
                                            <text style="font-weight: bold; color: black">{{__('Tavan: ')}}</text>@if($address->attic){{__('ima')}}@else{{__('nema')}}@endif
                                        </div>
                                    </div>
                                    <div class='row'>
                                        <div class='col s12 m4 l4'>
                                            <text style="font-weight: bold; color: black">{{__('Sklonište: ')}}</text>@if($address->shelter){{__('ima')}}@else{{__('nema')}}@endif
                                        </div>
                                        <div class='col s12 m6 l6'>
                                            <text style="font-weight: bold; color: black">{{__('Energetski pasoš: ')}}</text>{{ $council->energy_passport }}
                                        </div>
                                        <div class='col s12 m4 l4'></div>
                                    </div>
                                    @endforeach
                                    <div class='row'>
                                        <div class='col s12 m12 l12'>
                                            <a href="{{url('/admin/councils/addAddress/'.$council->id)}}" class="btn cyan waves-effect waves-light tooltipped" data-position="top" data-tooltip="{{__('Dodaj adresu')}}">
                                                            +</a>
                                        </div>
                                    </div>
                                </div>
                                <div id="units">
                                    <div class='row' >
                                        <table id="unitstable" class="display table-responsive multitables">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;&nbsp;&nbsp;#</th>
                                                    <th>{{__('Obveznik')}}</th>
                                                    <th>{{__('Telefon')}}</th>
                                                    <th>{{__('E-mail')}}</th>
                                                    <th>{{__('Sprat')}}</th>
                                                    <th>{{__('Stan')}}</th>
                                                    <th>{{__('Br.članova')}}</th>
                                                    <th>{{__('Tip')}}</th>
                                                    <th>{{__('Aktivan')}}</th>
                                                    <th style="min-width: 85px">{{__('Akcije')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="gradeX">
                                                    <td>&nbsp;&nbsp;&nbsp;</td>
                                                    <td>Petar Petrović</td>
                                                    <td>+38173100100</td>
                                                    <td>neki@nesto.rs</td>
                                                    <td>I</td>
                                                    <td>1</td>
                                                    <td>2</td>
                                                    <td>Stambeni</td>
                                                    <td>Da</td>
                                                    <td>
                                                        <a href="#" class="btn tooltipped mb-6 waves-effect waves-light gradient-45deg-green-teal" data-position="top" data-tooltip="{{__('Uredi prostor')}}">
                                                            <i class="material-icons">create</i></a>
                                                    </td>
                                                </tr> 
                                                <tr class="gradeX">
                                                    <td>&nbsp;&nbsp;&nbsp;</td>
                                                    <td>Mika MikiĆ</td>
                                                    <td>+38173200200</td>
                                                    <td>drugi@nesto.rs</td>
                                                    <td>I</td>
                                                    <td>2</td>
                                                    <td>1</td>
                                                    <td>Stambeni</td>
                                                    <td>Da</td>
                                                    <td>
                                                        <a href="#" class="btn tooltipped mb-6 waves-effect waves-light gradient-45deg-green-teal" data-position="top" data-tooltip="{{__('Uredi prostor')}}">
                                                            <i class="material-icons">create</i></a>
                                                    </td>
                                                </tr> 
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id="contracts">
                                    <div class='row' >
                                        <table id="contractstable" class="display table-responsive multitables">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;&nbsp;&nbsp;#</th>
                                                    <th>{{__('Partner')}}</th>
                                                    <th>{{__('Kontakt tel.')}}</th>
                                                    <th>{{__('Održavanje')}}</th>
                                                    <th>{{__('Važi od')}}</th>
                                                    <th>{{__('Važi do')}}</th>
                                                    <th style="min-width: 85px">{{__('Akcije')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="gradeX">
                                                    <td>&nbsp;&nbsp;&nbsp;</td>
                                                    <td>Test radionica</td>
                                                    <td>123-456</td>
                                                    <td>Održavanje lifta</td>
                                                    <td>10.03.2020.</td>
                                                    <td>11.04.2021.</td>
                                                    <td>
                                                        <a href="#" class="btn tooltipped mb-6 waves-effect waves-light gradient-45deg-green-teal" data-position="top" data-tooltip="{{__('Uredi ugovor')}}">
                                                            <i class="material-icons">create</i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id="assignments">
                                    <div class='row' >
                                        <table id="assignmentstable" class="display table-responsive multitables">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;&nbsp;&nbsp;#</th>
                                                    <th>{{__('Status')}}</th>
                                                    <th>{{__('Opis')}}</th>
                                                    <th>{{__('Datum')}}</th>
                                                    <th>{{__('Tip')}}</th>
                                                    <th>{{__('Partner')}}</th>
                                                    <th style="min-width: 85px">{{__('Akcije')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="gradeX">
                                                    <td>&nbsp;&nbsp;&nbsp;</td>
                                                    <td>Završen</td>
                                                    <td>Popravka lampe u hodniku</td>
                                                    <td>20.03.2021.</td>
                                                    <td>Intervencija</td>
                                                    <td>Test radionica</td>
                                                    <td>
                                                        <a href="#" class="btn tooltipped mb-6 waves-effect waves-light gradient-45deg-green-teal" data-position="top" data-tooltip="{{__('Uredi nalog')}}">
                                                            <i class="material-icons">create</i></a>
                                                    </td>
                                                </tr> 
                                                @foreach($assignments as $assignment)
                                                <tr class="gradeX">
                                                    <td>&nbsp;&nbsp;&nbsp;</td>
                                                    <td>@if($assignment->status == 1){{__('Dodeljen')}}
                                                        @elseif($assignment->status == 2){{__('U toku')}}
                                                        @elseif($assignment->status == 3){{__('Završen')}}
                                                        @else{{__('Dodeljen')}}
                                                        @endif
                                                    </td>
                                                    <td>{{ $assignment->name }}</td>
                                                    <td>{{ date('d.m.Y.', strtotime($assignment->date)) }}</td>
                                                    <td>@if($assignment->type == 'assignment'){{__('Iz programa')}}
                                                        @else{{__('Intervencija')}}
                                                        @endif
                                                    </td>
                                                    <td>{{$assignment->contractor}}</td>
                                                    <td>
                                                        <a href="#" class="btn tooltipped mb-6 waves-effect waves-light gradient-45deg-green-teal" data-position="top" data-tooltip="{{__('Uredi nalog')}}">
                                                            <i class="material-icons">create</i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id="bills">
                                    <div class='row' style="background-color: #f2f2f2">
                                        <div class='col s10 m10 l10'>
                                            <h5>{{__('Servisi za fakturisanje')}}</h5>
                                        </div>
                                        <div class='col s2 m2 l2'>
                                            <a href="{{url('/admin/councils/addBill/'.$council->id)}}" class="btn-floating btn-small tooltipped waves-effect waves-light gradient-45deg-cyan-cyan" data-position="top" data-tooltip="{{__('Dodaj fakturu')}}">
                                                                    +</a>
                                        </div>
                                    </div>
                                    <div class='row'>
                                        <table id="billstable" class="display table-responsive multitables">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;&nbsp;&nbsp;#</th>
                                                    <th>{{__('Datum')}}</th>
                                                    <th>{{__('Partner')}}</th>
                                                    <th>{{__('Iznos')}}</th>
                                                    <th>{{__('Tip')}}</th>
                                                    <th>{{__('Status')}}</th>
                                                    <th style="min-width: 85px">{{__('Akcije')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($bills as $bill)
                                                <tr class="gradeX">
                                                    <td>&nbsp;&nbsp;&nbsp;</td>
                                                    <td>{{ date('d.m.Y.', strtotime($bill->date))}}</td>
                                                    <td>{{ $bill->partner }}</td>
                                                    <td>{{ $bill->amount }}</td>
                                                    <td>@if($bill->type == 'income'){{__('Prihod')}}
                                                        @else{{__('Trošak')}}
                                                        @endif
                                                    </td>
                                                    <td>@if($bill->state == 'unpaied'){{__('Neplaćen')}}
                                                        @elseif($bill->state == 'partly'){{__('U otplati')}}
                                                        @else {{__('Plaćen')}}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{url('/admin/councils/editBill/'.$bill->id)}}" class="btn tooltipped mb-6 waves-effect waves-light gradient-45deg-green-teal" data-position="top" data-tooltip="{{__('Uredi fakturu')}}">
                                                            <i class="material-icons">create</i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div id="transactions">
                                    <div class='row' style="background-color: #f2f2f2">
                                        <div class='col s10 m10 l10'>
                                            <h5>{{__('Troškovi i prihodi')}}</h5>
                                        </div>
                                        <div class='col s2 m2 l2'>
                                            <a href="{{url('/admin/councils/addTransaction/'.$council->id)}}" class="btn-floating btn-small tooltipped waves-effect waves-light gradient-45deg-cyan-cyan" data-position="top" data-tooltip="{{__('Dodaj fakturu')}}">
                                                                    +</a>
                                        </div>
                                    </div>
                                    <div class='row' >
                                        <table id="transactionstable" class="display table-responsive multitables">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;&nbsp;&nbsp;#</th>
                                                    <th>{{__('Datum')}}</th>
                                                    <th>{{__('Iznos')}}</th>
                                                    <th>{{__('Tip')}}</th>
                                                    <th>{{__('Napomena')}}</th>
                                                    <th style="min-width: 85px">{{__('Akcije')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($transactions as $transaction)
                                                <tr class="gradeX">
                                                    <td>&nbsp;&nbsp;&nbsp;</td>
                                                    <td>{{ date('d.m.Y.', strtotime($transaction->date))}}</td>
                                                    <td>{{ $transaction->amount }}</td>
                                                    <td>@if($transaction->type == 'income'){{__('Prihod')}}
                                                        @else{{__('Trošak')}}
                                                        @endif
                                                    </td>
                                                    <td>{{$transaction->note}}</td>
                                                    <td>
                                                        <a href="{{url('/admin/councils/editTransaction/'.$transaction->id)}}" class="btn tooltipped mb-6 waves-effect waves-light gradient-45deg-green-teal" data-position="top" data-tooltip="{{__('Uredi nalog')}}">
                                                            <i class="material-icons">create</i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id="announcements">
                                    <div class='row' >
                                        <table id="announcementstable" class="display table-responsive multitables">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;&nbsp;&nbsp;#</th>
                                                    <th>{{__('Naslov')}}</th>
                                                    <th>{{__('Datum')}}</th>
                                                    <th>{{__('Email')}}</th>
                                                    <th>{{__('Okačeno')}}</th>
                                                    <th style="min-width: 85px">{{__('Akcije')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="gradeX">
                                                    <td>&nbsp;&nbsp;&nbsp;</td>
                                                    <td>Čišćenje snega</td>
                                                    <td>20.03.2021.</td>
                                                    <td>Poslat</td>
                                                    <td>Ne</td>
                                                    <td>
                                                        <a href="#" class="btn tooltipped mb-6 waves-effect waves-light gradient-45deg-green-teal" data-position="top" data-tooltip="{{__('Uredi nalog')}}">
                                                            <i class="material-icons">create</i></a>
                                                    </td>
                                                </tr> 
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id='meetings'>
                                    <div class='row' >
                                        <table id="meetingstable" class="display table-responsive multitables">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;&nbsp;&nbsp;#</th>
                                                    <th>{{__('Datum')}}</th>
                                                    <th>{{__('Sazvao')}}</th>
                                                    <th>{{__('Obaveštenja')}}</th>
                                                    <th style="min-width: 85px">{{__('Akcije')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="gradeX">
                                                    <td>&nbsp;&nbsp;&nbsp;</td>
                                                    <td>20.03.2021.</td>
                                                    <td>{{Auth::user()->name}}</td>
                                                    <td>Poslato</td>
                                                    <td>
                                                        <a href="#" class="btn tooltipped mb-6 waves-effect waves-light gradient-45deg-green-teal" data-position="top" data-tooltip="{{__('Uredi nalog')}}">
                                                            <i class="material-icons">create</i></a>
                                                    </td>
                                                </tr> 
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('vendorScripts')
<script src="{{ asset('/vendors/data-tables/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('/vendors/data-tables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>
@stop

@section('pageScripts')
<script src="{{ asset('/js/showcouncils.js') }}"></script>
@stop

