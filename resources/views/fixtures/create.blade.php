<?php

?>
@extends('layouts.app')
@section('content')
    <div class="container">
    <div class="card-body">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <form method="POST" action="{{route('fixtures.store')}}">
                @include('fixtures.forms.form')
            </form>
        </div>
    </div>
@endsection
