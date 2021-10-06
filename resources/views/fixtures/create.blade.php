<?php

?>
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card-body">
            <form method="POST" action="{{route('fixtures.store')}}">
                @include('fixtures.forms.form')
            </form>
        </div>
    </div>
@endsection
