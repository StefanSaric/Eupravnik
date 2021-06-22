@extends('admin.layouts.layout')

@section('vendorCss')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/css/jquery.dataTables.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/extensions/Responsive/css/responsive.dataTables.min.css')}}"/>
@stop

@section('pageCss')
<link rel="stylesheet" type="text/css" href="{{asset('css/datatables.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('css/councilshow.css')}}"/>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
      integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
      crossorigin=""/>
@stop

@section('content')
@if(Session::has('message'))
<input id="message" type="hidden" value="{{ Session::get('message') }}" />
@endif
<input id="latitude" type="hidden" value="{{ $council->latitude }}" />
<input id="longitude" type="hidden" value="{{ $council->longitude }}" />
<input id="council_name" type="hidden" value="{{ $council->name }}" />
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
                                <!---------- INFO start ---------->
                                <div id="addresses">
                                    <div class='row grey lighten-4'>
                                        <div class='col s10 m10 l10'>
                                            <h5>{{__('Osnovni podaci skupštine stanara')}}</h5>
                                        </div>
                                        <div class="col s12 m2 l2" style="padding-top: 1rem">
                                            <a href="{{url('/admin/councils/'.$council->id.'/edit')}}" class="btn-floating btn-small tooltipped mb-6 waves-effect waves-light gradient-45deg-green-teal" data-position="top" data-tooltip="{{__('Uredi skupštinu')}}">
                                                <i class="material-icons">create</i></a>
                                        </div>
                                    </div>
                                    <div class="row" style="padding-top: 2rem; padding-bottom: 2rem">
                                        <div class="col s12 m5">
                                            <table class="striped compact">
                                                <thead>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td width="1%"><i class='material-icons prefix'>domain</i></td>
                                                        <td width="50%"><strong>{{__('Skupština:')}}</strong></td>
                                                        <td class="users-view-username">{{$council->name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class='material-icons prefix'>featured_play_list</i></td>
                                                        <td><strong>{{__('Skraćeno ime:')}}</strong></td>
                                                        <td class="users-view-name">{{$council->short_name}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col s12 m5">
                                            <table class="striped">
                                                <thead>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td width="1%"><i class='material-icons prefix'>location_city</i></td>
                                                        <td width="50%"><strong>{{__('Mesto:')}}</strong></td>
                                                        <td class="users-view-username">{{$council->city}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class='material-icons prefix'>location_city</i></td>
                                                        <td><strong>{{__('Naselje:')}}</strong></td>
                                                        <td class="users-view-name">{{$council->area}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class='row grey lighten-4'>
                                        <div class='col s10 m10 l10'>
                                            <h5>@if(count($addresses) == 1 ) {{__('Adresa')}} @else {{__('Adrese')}} @endif</h5>
                                        </div>
                                        <div class='col s2 m2 l2'>
                                            <a href="{{url('/admin/councils/addAddress/'.$council->id)}}" class="btn-floating btn-small tooltipped waves-effect waves-light gradient-45deg-light-blue-cyan c-show-inline-button" data-position="top" data-tooltip="{{__('Dodaj adresu')}}">
                                                <i class="material-icons">add</i></a>
                                        </div>
                                    </div>
                                    <div>
                                        @foreach($addresses as $key => $address)
                                        <div class='row address-blocks grey lighten-5' style="margin-top: 1rem; margin-left: 3rem; margin-right: 3rem" data-counter="{{($key+1)}}" data-address="{{$address->address}}, {{$council->city}}">
                                            <div class='col s10 m10 l10'>
                                                <h5>@if(count($addresses) > 1) {{$key +1 . '.'}} @endif{{$address->address}}</h5>
                                            </div>
                                            <div class='col s2 m2 l2'>
                                                <a href="{{url('/admin/councils/editAddress/'.$address->id)}}" class="btn-floating btn-small tooltipped waves-effect waves-light gradient-45deg-green-teal c-show-inline-button" data-position="top" data-tooltip="{{__('Uredi adresu')}}">
                                                    <i class="material-icons">create</i></a>
                                                <a href='{{url('/admin/councils/deleteAddress/'.$address->id)}}' class="btn-floating btn-small tooltipped waves-effect waves-light gradient-45deg-red-pink c-show-inline-button" data-position="top" data-tooltip="{{__('Obriši adresu')}}">
                                                    <i class="material-icons">delete</i></a>
                                            </div>
                                        </div>
                                        <div style="margin-left: 4rem">
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
                                                    <text style="font-weight: bold; color: black">{{__('Energetski pasoš: ')}}</text>{{ $address->energy_passport }}
                                                </div>
                                                <div class='col s12 m4 l4'></div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class='row'>
                                    </div>
                                    <div class='row grey lighten-4' style="margin-top: 1rem">
                                        <div class='col s10 m10 l10'>
                                            <h5>{{__('Mapa')}}</h5>
                                        </div>
                                        <div class='col s2 m2 l2'>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div id="myleafletmap" style="height: 500px"></div>
                                    </div>
                                </div>
                                <!---------- PROSTORI start ---------->
                                <div id="units">
                                    <div class='row grey lighten-4'>
                                        <div class='col s10 m10 l10'>
                                            <h5>{{__('Prostori')}}</h5>
                                        </div>
                                        <div class='col s2 m2 l2'>
                                            <a href="{{url('/admin/councils/addSpace/'.$council->id)}}" class="btn-floating btn-small tooltipped waves-effect waves-light gradient-45deg-light-blue-cyan c-show-inline-button" data-position="top" data-tooltip="{{__('Dodaj prostor')}}">
                                                <i class="material-icons">add</i></a>
                                        </div>
                                    </div>
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
                                                    <th>{{__('Status')}}</th>
                                                    <th style="min-width: 85px">{{__('Akcije')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($spaces as $num => $space)
                                                <tr id="{{ $space->id }}" class="gradeX">
                                                    <td>&nbsp;&nbsp;&nbsp;{{ $num + 1 }}</td>
                                                    <td>{{ $space->representative }}</td>
                                                    <td>{{ $space->phone }}</td>
                                                    <td>{{ $space->email }}</td>
                                                    <td>{{ $space->floor_number }}</td>
                                                    <td>{{ $space->apartment_number }}</td>
                                                    <td>{{ $space->household_members_number }}</td>
                                                    <td>{{ $space->type }}</td>
                                                    <td>{{ $space->status }}</td>
                                                    <td>
                                                        <a href="{{url('/admin/councils/editSpace/'.$space->id)}}" class="btn-floating btn-small tooltipped waves-effect waves-light gradient-45deg-green-teal c-show-inline-button" data-position="top" data-tooltip="{{__('Uredi prostor')}}">
                                                            <i class="material-icons">create</i></a>
                                                        <a href='{{url('/admin/councils/deleteSpace/'.$space->id)}}' class="btn-floating btn-small tooltipped waves-effect waves-light gradient-45deg-red-pink c-show-inline-button" data-position="top" data-tooltip="{{__('Obriši prostor')}}">
                                                            <i class="material-icons">delete</i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!---------- UGOVORI start ---------->
                                <div id="contracts">
                                    <div class='row grey lighten-4'>
                                        <div class='col s10 m10 l10'>
                                            <h5>{{__('Ugovori')}}</h5>
                                        </div>
                                        <div class='col s2 m2 l2'>
                                            <a href="{{url('/admin/councils/addContract/'.$council->id)}}" class="btn-floating btn-small tooltipped waves-effect waves-light gradient-45deg-light-blue-cyan c-show-inline-button" data-position="top" data-tooltip="{{__('Dodaj ugovor')}}">
                                            <i class="material-icons">add</i></a>
                                        </div>
                                    </div>
                                    <div class='row' >
                                        <table id="contractstable" class="display table-responsive multitables">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;&nbsp;&nbsp;#</th>
                                                    <th>{{__('Partner')}}</th>
                                                    <th>{{__('Opis')}}</th>
                                                    <th>{{__('Važi od')}}</th>
                                                    <th>{{__('Važi do')}}</th>
                                                    <th>{{__('Ugovorena Cena')}}</th>
                                                    <th>{{__('Stvarna Cena')}}</th>
                                                    <th>{{__('Stanovi')}}</th>
                                                    <th style="min-width: 85px">{{__('Akcije')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($contracts as $num => $contract)
                                                <tr id="{{ $contract->id }}" class="gradeX">
                                                    <td>&nbsp;&nbsp;&nbsp;{{ $num + 1 }}</td>
                                                    <td>{{ $contract->partner }}</td>
                                                    <td>{{ $contract->description }}</td>
                                                    <td>{{ $contract->date_from }}</td>
                                                    <td>{{ $contract->date_to }}</td>
                                                    <td>{{ $contract->price }}</td>
                                                    <td>{{ $contract->real_price }}</td>
                                                    <td>{{ $contract->group }}</td>
                                                    <td>
                                                        <a href="{{url('/admin/councils/addContract/'.$council->id)}}" class="btn-floating btn-small tooltipped mb-6 waves-effect waves-light gradient-45deg-green-teal" data-position="top" data-tooltip="{{__('Uredi ugovor')}}">
                                                            <i class="material-icons">create</i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!---------- NALOZI start ---------->
                                <div id="assignments">
                                    <div class='row grey lighten-4'>
                                        <div class='col s10 m10 l10'>
                                            <h5>{{__('Nalozi')}}</h5>
                                        </div>
                                        <!--<div class='col s2 m2 l2'>
                                            <a href="{{url('/admin/councils/addAssignment/'.$council->id)}}" class="btn-floating btn-small tooltipped waves-effect waves-light gradient-45deg-light-blue-cyan c-show-inline-button" data-position="top" data-tooltip="{{__('Dodaj nalog')}}">
                                            <i class="material-icons">add</i></a>
                                        </div>-->
                                    </div>
                                    <div class='row' >
                                        <table id="assignmentstable" class="display table-responsive">
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
                                                        <a href="#" class="btn-floating btn-small tooltipped mb-6 waves-effect waves-light gradient-45deg-green-teal" data-position="top" data-tooltip="{{__('Uredi nalog')}}">
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
                                                        <a href="#" class="btn-floating btn-small tooltipped mb-6 waves-effect waves-light gradient-45deg-green-teal" data-position="top" data-tooltip="{{__('Uredi nalog')}}">
                                                            <i class="material-icons">create</i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!---------- FAKTURISANJE start ---------->
                                <div id="bills">
                                    <div class='row grey lighten-4'>
                                        <div class='col s10 m10 l10'>
                                            <h5>{{__('Servisi za fakturisanje')}}</h5>
                                        </div>
                                        <div class='col s2 m2 l2'>
                                            <a href="{{url('/admin/councils/addBill/'.$council->id)}}" class="btn-floating btn-small tooltipped waves-effect waves-light gradient-45deg-light-blue-cyan c-show-inline-button" data-position="top" data-tooltip="{{__('Dodaj fakturu')}}">
                                                <i class="material-icons">add</i></a>
                                        </div>
                                    </div>
                                    <div class='row'>
                                        <table id="billstable" class="display">
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
                                                        <a href="{{url('/admin/councils/editBill/'.$bill->id)}}" class="btn-floating btn-small tooltipped mb-6 waves-effect waves-light gradient-45deg-green-teal c-show-inline-button" data-position="top" data-tooltip="{{__('Uredi fakturu')}}">
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
                                <!---------- TRANSAKCIJE start ---------->
                                <div id="transactions">
                                    <div class='row grey lighten-4'>
                                        <div class='col s10 m10 l10'>
                                            <h5>{{__('Troškovi i prihodi')}}</h5>
                                        </div>
                                        <div class='col s2 m2 l2'>
                                            <a href="{{url('/admin/councils/addTransaction/'.$council->id)}}" class="btn-floating btn-small tooltipped waves-effect waves-light gradient-45deg-light-blue-cyan c-show-inline-button" data-position="top" data-tooltip="{{__('Dodaj fakturu')}}">
                                                <i class="material-icons">add</i></a>
                                        </div>
                                    </div>
                                    <div class='row' >
                                        <table id="transactionstable" class="display table-responsive">
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
                                                        <a href="{{url('/admin/councils/editTransaction/'.$transaction->id)}}" class="btn-floating btn-small tooltipped mb-6 waves-effect waves-light gradient-45deg-green-teal" data-position="top" data-tooltip="{{__('Uredi nalog')}}">
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
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <!---------- OBAVESTENJA start ---------->
                                <div id="announcements">
                                    <div class='row grey lighten-4'>
                                        <div class='col s10 m10 l10'>
                                            <h5>{{__('Obaveštenja')}}</h5>
                                        </div>
                                        <div class='col s2 m2 l2'>
                                            <a href="{{url('/admin/councils/addAnnouncement/'.$council->id)}}" class="btn-floating btn-small tooltipped waves-effect waves-light gradient-45deg-light-blue-cyan c-show-inline-button" data-position="top" data-tooltip="{{__('Dodaj obaveštenje')}}">
                                                <i class="material-icons">add</i></a>
                                        </div>
                                    </div>
                                    <div class='row' >
                                        <table id="announcementstable" class="display table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;&nbsp;&nbsp;#</th>
                                                    <th>{{__('Naslov')}}</th>
                                                    <th>{{__('Datum')}}</th>
                                                    <th>{{__('Poslat email')}}</th>
                                                    <th style="min-width: 85px">{{__('Akcije')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($announcements as $announcement)
                                                <tr class="gradeX">
                                                    <td>&nbsp;&nbsp;&nbsp;</td>
                                                    <td>{{ $announcement->name }}</td>
                                                    <td>{{ date('d.m.Y.', strtotime($announcement->date))}}</td>
                                                    <td>@if($announcement->email_sent == 1){{__('Da')}}
                                                        @else{{__('Ne')}}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{url('/admin/councils/editAnnouncement/'.$announcement->id)}}" class="btn-floating btn-small tooltipped mb-6 waves-effect waves-light gradient-45deg-green-teal" data-position="top" data-tooltip="{{__('Uredi obaveštenje')}}">
                                                            <i class="material-icons">create</i></a>
                                                        <a href="{{url('/admin/councils/announcementToPDF/'.$announcement->id)}}" target="__blank" class="btn-floating btn-small tooltipped mb-6 waves-effect waves-light gradient-45deg-red-pink" data-position="top" data-tooltip="{{__('Prikazi PDF')}}">
                                                            <i class="material-icons">picture_as_pdf</i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        </table>
                                    </div>
                                </div>
                                <!---------- SEDNICE start ---------->
                                <div id='meetings'>
                                    <div class='row   grey lighten-4' >
                                        <div class='col s10 m10 l10'>
                                            <h5>{{__('Sednice')}}</h5>
                                        </div>
                                        <div class='col s2 m2 l2'>
                                            <a href="{{url('/admin/councils/addMeeting/'.$council->id)}}" class="btn-floating btn-small tooltipped waves-effect waves-light gradient-45deg-light-blue-cyan c-show-inline-button" data-position="top" data-tooltip="{{__('Dodaj sednicu')}}">
                                                <i class="material-icons">add</i></a>
                                        </div>
                                    </div>
                                    <div class='row' >
                                        <table id="meetingstable" class="display table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;&nbsp;&nbsp;#</th>
                                                    <th>{{__('Datum')}}</th>
                                                    <th>{{__('Vreme')}}</th>
                                                    <th>{{__('Sazvao')}}</th>
                                                    <th>{{__('Obaveštenje')}}</th>
                                                    <th style="min-width: 85px">{{__('Akcije')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($meetings as $key => $meeting)
                                                <tr class="gradeX">
                                                    <td>&nbsp;&nbsp;&nbsp;{{($key+1)}}</td>
                                                    <td>{{date('d.m.Y', strtotime($meeting->date))}}</td>
                                                    <td>{{$meeting->time}}</td>
                                                    <td>{{Auth::user()->name}}</td>
                                                    <td>@if($meeting->is_announced)
                                                        @if($meeting->email_sent)
                                                        {{__('E-mail')}}
                                                        @else
                                                        {{__('Kreirano')}}
                                                        @endif
                                                        @else
                                                        {{__('Nema')}}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{url('/admin/councils/editMeeting/'.$meeting->id)}}" class="btn-floating btn-small tooltipped mb-6 waves-effect waves-light gradient-45deg-green-teal" data-position="top" data-tooltip="{{__('Uredi sednicu')}}">
                                                            <i class="material-icons">create</i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
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
<script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
        integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
crossorigin=""></script>
<script src="{{ asset('/js/showcouncils.js') }}"></script>
@stop

