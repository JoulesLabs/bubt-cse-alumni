@extends('admin.layouts.master')

@section('title', 'User Create')

@section('heading', 'User Create')

@section('breadcrumbs', Breadcrumbs::render('admin::user.create'))

@section('contents')

    <div class="card">
        <div class="card-body">

                @include('admin.users._create-form')


        </div>
    </div>

@endsection

