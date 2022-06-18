@extends('admin.layouts.master')

@section('title', 'User Edit')

@section('heading', 'User Edit')

@section('breadcrumbs', Breadcrumbs::render('admin::user.edit'))

@section('contents')

    <div class="card">
        <div class="card-body">

            <form action="{{ route('admin::user.update', ['id' => $user->id]) }}" method="post">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control" value="{{ $user->email }}">
                </div>

                <input type="hidden" name="auth_id" value="{{$user->id}}">

                <div class="form-group">
                    <label>Roles</label>
                    <select class="form-control select2" name="roles[]" multiple="multiple">
                        @php
                            $userRole = $user->roles->pluck('id')->toArray();
                        @endphp
                        @foreach($roles as $role)
                            <option value="{{$role->id}}" {{ in_array($role->id, $userRole) ? 'selected': '' }}>{{$role->role_name}}</option>
                        @endforeach
                    </select>
                </div>

                @include('admin.partials.permission_all_btn')
                <br>
                <hr>

                @include('admin.partials.permissions', ['abilities' => $abilities, 'selectedPermissions' => $user->abilities])


                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-success">Update</button>
            </form>


        </div>
    </div>

@endsection

