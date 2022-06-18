@extends('admin.layouts.master')

@section('title', 'Role List')

@section('heading', 'Role List')

@section('breadcrumbs', Breadcrumbs::render('admin::role.index'))
@section('buttons')

@if(auth_admin()->canDo('role.create'))
<a href="{{ route('admin::role.create') }}" class="btn btn-sm btn-primary">Create</a>
@endif

@endsection

@section('contents')

<div class="card">
    <!-- <div class="card-header">
        <h4></h4>
        <div class="card-header-action">

            <form>
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request()->get('search') }}" title="">
                    <div class="input-group-btn">
                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>

    </div> -->

    <div class="card-body">
        
        <div class="table-responsive">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        @if(auth_admin()->canDo('role.update'))
                        <th scope="col" style="width: 15%;">Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse($roles as $role)
                    <tr>
                        <th scope="row">{{ item_sl($loop->index, $roles->currentPage(), $roles->perPage()) }}</th>
                        <td>{{ $role->role_name }}</td>
                        <td>
                            <div class="buttons">
                                @if(auth_admin()->canDo('role.update'))
                                <x-btn-ico url="{{route('admin::role.edit', [$role->id])}}" icon="fa-pencil-alt" size="sm" type="warning">Edit</x-btn-ico>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" align="center" style="color: #AA7777;">No data found!</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
        {{ $roles->links() }}

    </div>
</div>

@endsection