@extends('admin.layouts.layout')

@section('vendorCss')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/css/jquery.dataTables.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/extensions/Responsive/css/responsive.dataTables.min.css')}}"/>
@stop

@section('pageCss')
<link rel="stylesheet" type="text/css" href="{{asset('css/datatables.css')}}"/>
<style>
    td.details-control {
	background: url('../dticons/details_open.png') no-repeat center center;
	cursor: pointer;
    }
    tr.shown td.details-control {
            background: url('../dticons/details_close.png') no-repeat center center;
    }
    tr.loading td {
            text-align: center;
    }
</style>
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
                    <h5 class="breadcrumbs-title mt-0 mb-0"><span>{{__('Programi održavanja')}}</span></h5>
                </div>
                <div class="col s12 m6 l6 right-align-md">
                    <ol class="breadcrumbs mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ url('admin/') }}">Dash</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ url('admin/programs') }}">{{__('Programi održavanja')}}</a>
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
                                    {!! Form::open(array('method' => 'DELETE', 'id' => 'programForm', 'role' => 'form')) !!}
                                    {!! Form::submit(null, ['id' => 'programButton', 'class' => 'btn btn-primary createEditButton', 'style' => 'display: none;']) !!}
                                    {!! Form::close() !!}
                                    <div class="row">
                                        <div class="col s12">
                                            <input type='hidden' id='confirmQuestion' value='{{__('Da li ste sigurni da želite da obrišete ovu analizu?')}}'/>
                                            <input type="hidden" id="base_url" value="{{url('/')}}"/>
                                            <table id="datatable" class="display table-responsive">
                                                <thead>
                                                    <tr>
                                                        <th data-order="{{ $num + 1 }}">&nbsp;&nbsp;&nbsp;#</th>
                                                        <th style="max-width: 20px"></th>
                                                        <th>{{__('Skupština')}}</th>
                                                        <th>{{__('Upravnik')}}</th>
                                                        <th>{{__('Datum')}}</th>
                                                        <th>{{__('Element')}}</th>
                                                        <th>{{__('Stanje')}}</th>
                                                        <th>{{__('Izvođač')}}</th>
                                                        <th>{{__('Prioritet')}}</th>
                                                        <th>{{__('Proveren')}}</th>
                                                        <!--<th></th>-->
                                                        <th style="min-width: 85px">{{__('Akcije')}}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($programs as $num => $program)
                                                    <tr id="{{ $program->id }}" class="gradeX">
                                                        <td>&nbsp;&nbsp;&nbsp;{{ $num + 1 }}</td>
                                                        <td class='details-control' style="max-width: 20px"></td>
                                                        <td>{{ $program->council }}</td>
                                                        <td>{{ Auth::user()->name }}</td>
                                                        <td>{{ date('d.m.Y',strtotime($program->date)) }}</td>
                                                        <td>{{ $program->name }}</td>
                                                        <td>{{ $program->reported_condition }}</td>
                                                        <td>{{ $program->contractor }}</td>
                                                        <td>{{ $program->priority }}</td>
                                                        <td>
                                                            @if($program->element_date != null)
                                                            {{ date('d.m.Y', strtotime($program->element_date)) }}
                                                            @endif
                                                        </td>
                                                        <td style='white-space: nowrap; vertical-align: middle'>
                                                            <a href="{{url('/admin/offers/'.$program->id.'/create')}}" class="btn-floating btn-small tooltipped waves-effect waves-light gradient-45deg-light-blue-cyan" data-position="top" data-tooltip="{{__('Dodaj ponudu')}}">
                                                                <i class="material-icons">add</i></a>
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
<script src="{{ asset('/js/allprograms.js') }}"></script>
@stop


