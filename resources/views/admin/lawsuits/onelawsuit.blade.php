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
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>{{__('Tuzba za: ') . $lawsuit->council_name}}</span></h5>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ url('admin/') }}">Dash</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ url('admin/lawsuits') }}">{{__('Tuzbe')}}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">{{__('Tuzba za: ') . $lawsuit->council_name}}</a>
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
                                                <h4 class="card-title">{{__('Tabelarni prikaz')}}</h4>
                                            </div>
                                            <div class="col s12 m6 l6">
                                                <p class='pull-right'></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="datatablolder">
                                        <div class="row">
                                            <div class="col s12">
                                                <table id="datatable" class="display table-responsive">
                                                    <thead>
                                                    <tr>
                                                        <th>{{__('Broj Tužbe')}}</th>
                                                        <th>{{__('Naziv Skupštine')}}</th>
                                                        <th>{{__('Obveznik')}}</th>
                                                        <th>{{__('Izvršitelj')}}</th>
                                                        <th>{{__('Datum od')}}</th>
                                                        <th>{{__('Datum do')}}</th>
                                                        <th>{{__('Cena')}}</th>
                                                        <th>{{__('Status')}}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr id="{{ $lawsuit->id }}" class="gradeX">
                                                            <td>{{ $lawsuit->id }}</td>
                                                            <td>{{ $lawsuit->council_name }}</td>
                                                            <td>{{ $lawsuit->partner_name }}</td>
                                                            <td>{{ $lawsuit->enforcer_name }}</td>
                                                            <td>{{ $lawsuit->date_from }}</td>
                                                            <td>{{ $lawsuit->date_to }}</td>
                                                            <td>{{ $lawsuit->price }}</td>
                                                            <td>{{ $lawsuit->status }}</td>
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
    </div>
@stop

@section('vendorScripts')
    <script src="{{ asset('/vendors/data-tables/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('/vendors/data-tables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>
@stop

@section('pageScripts')
    <script src="{{ asset('/js/datatable.js') }}"></script>
    <script src="{{ asset('/js/users.js') }}"></script>
@stop
