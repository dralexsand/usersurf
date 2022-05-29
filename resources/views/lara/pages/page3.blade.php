@extends('lara.layouts.master')

@php
    $title = "Page 3";
@endphp

@section('headerScripts')
    @parent
@endsection

@section('title', $title)

@section('content')
    <div class="card">
        <div class="card-header">
            {{ $title }}
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <h1>Welcome to the {{ $title }}</h1>
                </footer>
            </blockquote>
        </div>
    </div>

    <hr class="pt-8">
    @include('lara.components.demodata')
@endsection

@section('footerScripts')
    @parent
@endsection
