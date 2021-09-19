@extends('layouts.app')

@section('content')

<chart :user="{{$user}}" ref="chart"></chart>

@endsection
