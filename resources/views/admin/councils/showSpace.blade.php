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
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>{{__('Prostor')}}</span></h5>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ url('admin/') }}">Dash</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ url('admin/councils') }}">{{__('Skupština')}}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">{{__('Prostor')}}</a>
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
                                                        <th>{{__('Adresa')}}</th>
                                                        <th>{{__('Tip')}}</th>
                                                        <th>{{__('Obveznik')}}</th>
                                                        <th>{{__('Telefon')}}</th>
                                                        <th>{{__('Email')}}</th>
                                                        <th>{{__('Sprat')}}</th>
                                                        <th>{{__('Stan')}}</th>
                                                        <th>{{__('Broj članova')}}</th>
                                                        <th>{{__('Prijavljena površina')}}</th>
                                                        <th>{{__('Ukupno zaduženje')}}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr id="{{ $space->id }}" class="gradeX">
                                                        <td>{{ $council_address->address }}</td>
                                                        <td>{{ $space->type }}</td>
                                                        <td>{{ $space->representative }}</td>
                                                        <td>{{ $space->phone }}</td>
                                                        <td>{{ $space->email }}</td>
                                                        <td>{{ $space->floor_number }}</td>
                                                        <td>{{ $space->apartment_number }}</td>
                                                        <td>{{ $space->household_members_number }}</td>
                                                        <td>{{ $space->reported_area_size }}</td>
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
