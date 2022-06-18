@extends('admin.layouts.master')

@section('title', 'Password Change')

@section('heading', 'Password Change')

@section('breadcrumbs', Breadcrumbs::render('admin::user.change_password_page'))

@section('contents')

    <div class="card">
        <div class="card-body">

            <form action="{{route('admin::user.change_password')}}" method="post">
                <div class="form-group">
                    <label>Current Password</label>
                    <input type="password" name="current_password" class="form-control">
                </div>
                <div class="form-group">
                    <label>New Password</label>
                    <input type="password" name="new_password"  class="form-control">
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="new_password_confirmation"  class="form-control">
                </div>                          

                
                @csrf
                <button type="submit" class="btn btn-success">Save</button>
            </form>
        </div>
    </div>

@endsection
