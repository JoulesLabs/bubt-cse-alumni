@extends('admin.layouts.master')

@section('title', 'Role Edit')

@section('heading', 'Role Edit')

@section('breadcrumbs', Breadcrumbs::render('admin::role.edit'))

@section('contents')

    <div class="card">
        <div class="card-body">

            <form action="{{route('admin::role.update', ['id' => $role->id])}}" method="post">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="role_name" class="form-control" value="{{ $role->role_name }}">
                </div>
                
                @include('admin.partials.permission_all_btn')

                <br>
                <hr>

                    @include('admin.partials.permissions', ['abilities' => $abilities, 'selectedPermissions' => $role->permission_array, 'disable' => false])

                @method('put')
                @csrf
                <button type="submit" class="btn btn-success">Save</button>
            </form>
        </div>
    </div>

@endsection

