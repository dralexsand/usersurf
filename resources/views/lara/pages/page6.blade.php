@extends('lara.layouts.master')

@php
    $title = "Page 6";
@endphp

@section('headerScripts')
    @parent
@endsection

@section('title', $title)

@section('content')

    <h4>Content</h4>

@endsection

@section('footerScripts')
    @parent
@endsection
