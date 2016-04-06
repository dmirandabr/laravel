@extends('layouts.master')
@section('content')
    <div class="row story-page">
        <div class="col-md-12">
            <h1>{{ $story['title'] }}</h1>
            <div class="author">By {{ $story['author']['name'] }} • Bankrate.com</div>
        </div>
        <div class="col-md-12">
            {!! $story['content'] !!}
        </div>
    </div>
@stop