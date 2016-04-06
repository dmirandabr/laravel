@extends('layouts.full')
@section('content')
    <div class="row mortgage-rate-table">
        <div class="col-md-12">
            <h1>Mortgage Rates</h1>
        </div>
        <div class="col-md-12">
            <div class="left">
                @include('mortgage.partials.search_form')
            </div>
            <div id="mortgage-rate-tables" class="center"></div>
            <div class="right">
                @include('mortgage.partials.right')
            </div>
        </div>
    </div>
@stop