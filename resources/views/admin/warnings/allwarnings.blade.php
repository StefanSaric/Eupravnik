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
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>{{__('Opomene')}}</span></h5>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ url('admin/') }}">Dash</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ url('admin/warnings') }}">{{__('Opomene')}}</a>
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
                                        {!! Form::open(array('method' => 'DELETE', 'id' => 'enforcerForm', 'role' => 'form')) !!}
                                        {!! Form::submit(null, ['id' => 'enforcerButton', 'class' => 'btn btn-primary createEditButton', 'style' => 'display: none;']) !!}
                                        {!! Form::close() !!}
                                        <div class="row">
                                            <div class="col s12">
                                                <input type='hidden' id='confirmQuestion' value='{{__('Da li ste sigurni da želite da obrišete ovog izvršitelja?')}}'/>
                                                <table id="datatable" class="display table-responsive">
                                                    <thead>
                                                    <tr>
                                                        <th>{{__('Broj opomene')}}</th>
                                                        <th>{{__('Skupstina')}}</th>
                                                        <th>{{__('Adresa')}}</th>
                                                        <th>{{__('Obveznik')}}</th>
                                                        <th>{{__('Sprat')}}</th>
                                                        <th>{{__('Stan')}}</th>
                                                        <th>{{__('Period')}}</th>
                                                        <th>{{__('Platiti do')}}</th>
                                                        <th>{{__('Iznos')}}</th>
                                                        <th>{{__('Status')}}</th>
                                                        <th style="min-width: 85px">{{__('Akcije')}}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($warnings as $num => $warning)
                                                        <tr id="{{ $warning->id }}" class="gradeX">
                                                            <td data-order="{{ $num + 1 }}">&nbsp;&nbsp;&nbsp;{{ $num + 1 }}</td>
                                                            <td>{{ $warning->council_name }}</td>
                                                            <td>{{ $warning->address_name }}</td>
                                                            <td>{{ $warning->representative }}</td>
                                                            <td>{{ $warning-> floor_number }}</td>
                                                            <td>{{ $warning->apartment_number }}</td>
                                                            <td>{{ $warning->date_from }}</td>
                                                            <td>{{ $warning->date_to }}</td>
                                                            <td>{{ $warning->price }}</td>
                                                            <td>{{ $warning->status }}</td>
                                                            <td style='white-space: nowrap; vertical-align: middle'>
                                                                <a href="{{url('/admin/warnings/'.$warning->id.'/show')}}" class="btn-floating btn-small tooltipped waves-effect waves-light gradient-45deg-light-blue-cyan" data-position="top" data-tooltip="{{__('Pogledaj tužbu')}}">
                                                                    <i class="material-icons">search</i></a>
                                                                <a href="{{url('/admin/warnings/'.$warning->id.'/edit')}}" class="btn-floating btn-small tooltipped waves-effect waves-light gradient-45deg-light-blue-cyan" data-position="top" data-tooltip="{{__('Štampaj')}}">
                                                                    <i class="material-icons">add_to_photos</i></a>
                                                                <a href="{{url('/admin/warnings/'.$warning->id.'/edit')}}" class="btn-floating btn-small tooltipped waves-effect waves-light gradient-45deg-green-teal" data-position="top" data-tooltip="{{__('Izmeni tužbu')}}">
                                                                    <i class="material-icons">create</i></a>
                                                                <a href="{{url('/admin/warnings/'.$warning->id.'/delete')}}" class="btn-floating btn-small tooltipped waves-effect waves-light gradient-45deg-red-pink" data-position="top" data-tooltip="{{__('Obriši tužbu')}}">
                                                                    <i class="material-icons">delete</i></a>
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
    </div>
@stop

@section('vendorScripts')
    <script src="{{ asset('/vendors/data-tables/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('/vendors/data-tables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>
@stop

@section('pageScripts')
    <script src="{{ asset('/js/datatable.js') }}"></script>
@stop
