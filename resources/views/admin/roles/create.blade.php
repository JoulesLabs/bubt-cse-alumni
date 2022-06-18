@extends('admin.layouts.master')

@section('title', 'Role Create')

@section('heading', 'Role Create')

@section('breadcrumbs', Breadcrumbs::render('admin::role.create'))

@section('contents')

    <div class="card">
        <div class="card-body">

            <form action="{{route('admin::role.store')}}" method="post">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="role_name" class="form-control">
                </div>


                @include('admin.partials.permission_all_btn')
                <br>
                <hr>

                @include('admin.partials.permissions', ['abilities' => $abilities, 'disable' => false])

                @csrf
                <button type="submit" class="btn btn-success">Save</button>
            </form>
        </div>
    </div>

@endsection
