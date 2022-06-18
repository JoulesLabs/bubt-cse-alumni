@extends('admin.layouts.master')

@section('title', 'Password Reset')

@section('heading', 'Reset User Password ')

@section('breadcrumbs', Breadcrumbs::render('admin::user.change_password_page'))

@section('contents')

    <div class="card">
        <div class="card-body">

            <form action="{{route('admin::user.change_password_by_admin',$userId)}}" method="post">

                <div class="form-group">
                    <label>New Password</label>
                    <input type="password" name="new_password"  class="form-control">
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="new_password_confirmation"  class="form-control">
                </div>

                @csrf
                <button type="submit" class="btn btn-info">Update</button>
            </form>
        </div>
    </div>

@endsection
