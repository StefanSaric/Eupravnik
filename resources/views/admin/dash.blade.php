@extends('admin.layouts.layout')

@section('vendorCss')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/fullcalendar/css/fullcalendar.min.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('vendors/fullcalendar/daygrid/daygrid.min.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('vendors/fullcalendar/timegrid/timegrid.min.css')}}"/>
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
                    <h5 class="breadcrumbs-title mt-0 mb-0"><span>Dashboard</span></h5>
                </div>
                <div class="col s12 m6 l6 right-align-md">
                    <ol class="breadcrumbs mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ url('admin/') }}">Dash</a>
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
                        <input type="hidden" id="docId" value="{{Auth::user()->id}}"/>
                        <div id="clendar" class="card">
                            <div class="card-content">
                                <h4 class="card-title">{{__('Kalendar')}}</h4>
                                <div id='calendar-preview'></div>
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
<script src="{{ asset('/vendors/fullcalendar/lib/jquery-ui.min.js') }}"></script>
<script src="{{ asset('/vendors/fullcalendar/lib/moment.min.js') }}"></script>
<script src="{{ asset('/vendors/fullcalendar/js/fullcalendar.min.js') }}"></script>
<script src="{{ asset('/vendors/fullcalendar/interaction/interaction.min.js') }}"></script>
<script src="{{ asset('/vendors/fullcalendar/daygrid/daygrid.min.js') }}"></script>
<script src="{{ asset('/vendors/fullcalendar/timegrid/timegrid.min.js') }}"></script>
<script src="{{ asset('/vendors/fullcalendar/locales/sr.js') }}"></script>
@stop
@section('pageScripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var docId = $('#docId').val();
        var calendarEl = document.getElementById('calendar-preview');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            height: 550,
            plugins: ['dayGrid','timeGrid', 'interaction'],
            defaultView: 'dayGridMonth',
            firstDay: 1,
            locale: 'sr',
            slotLabelFormat:{
                hour: '2-digit',
                minute: '2-digit',
                hour12: false
            },
            events: window.location + '/getAppointments/' + docId,
            eventClick: function(eventInfo){
                //alert(eventInfo.event.id);
                window.location = window.location + '/appointments/' +eventInfo.event.id + '/show';

            },
        });

        calendar.render();
    });
</script>
@stop
