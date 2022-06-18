@extends('admin.layouts.master')

@section('title', 'Users List')

@section('heading', 'Users List')

@section('breadcrumbs', Breadcrumbs::render('admin::user.index'))
@section('buttons')

@if(auth_admin()->canDo('user.create'))
    <a href="{{ route('admin::user.create') }}" class="btn btn-sm btn-primary">Create</a>
@endif

@endsection

@section('modal')

<x-confirm-modal form-id="disable_user_form" id="disable_user_confirm_modal" title="Disable User" deny="Close" confirm="Yes">
    <p>Do you really want to disable this user?</p>
    <form id="disable_user_form" method="post">

        @method('put')
        @csrf
    </form>
</x-confirm-modal>




<x-confirm-modal form-id="enable_user_form" id="enable_user_confirm_modal" title="Enable User" deny="Close" confirm="Yes">
    <p>Do you really want to enable this user?</p>
    <form id="enable_user_form" method="post">

        @method('put')
        @csrf
    </form>
</x-confirm-modal>



@endsection

@section('contents')

    <div class="card">
    <div class="card-header">
        <h4></h4>
        <div class="card-header-action">

            <form>
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request()->get('search') }}" title="search using name,email,designation">
                    <div class="input-group-btn">
                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>

    </div>
        <div class="card-body">
            <!-- <div class="float-right">
                <form>
                    <div class="input-group">
                        <input type="text" class="form-control table_search" name="search" placeholder="Search" value="{{ request()->get('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div> -->
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        @if(auth_admin()->canDo('user.update'))
                        <th scope="col" style="width: 25%;">Action</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($users as $user)
                        <tr>
                            <th scope="row">{{ item_sl($loop->index, $users->currentPage(), $users->perPage()) }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <div class="buttons">
                                    @if(auth_admin()->canDo(['user.update', 'user.view']))
                                        <!-- <x-btn-ico url="#" icon="fa-eye" size="sm" type="info">View</x-btn-ico> -->
                                    @endif

                                    @if(auth_admin()->canDo('user.update'))
                                        <x-btn-ico url="{{route('admin::user.edit', [$user->id])}}" icon="fa-pencil-alt" size="sm" type="warning">Edit</x-btn-ico>

                                        @if (auth()->user()->id !== $user->id )
                                            @if($user?->status == \JoulesLabs\IllumineAdmin\Enum\Admin\UserStatus::ACTIVE()->getValue())
                                            <x-btn-ico class="disable_user_button"  icon="fas fa-times-circle" size="sm" type="primary" data-toggle="modal" data-target="#disable_user_confirm_modal" data-url="{{route('admin::user.disable', [$user->id])}}" data-backdrop="static" data-keyboard="false" >Disable</x-btn-ico>
                                            @elseif($user?->status == \JoulesLabs\IllumineAdmin\Enum\Admin\UserStatus::INACTIVE()->getValue())
                                            <x-btn-ico class="enable_user_button"  icon="fas fa-check-circle" size="sm" type="secondary" data-toggle="modal" data-target="#enable_user_confirm_modal" data-url="{{route('admin::user.enable', [$user->id])}}" data-backdrop="static" data-keyboard="false" >Enable</x-btn-ico>
                                            @endif
                                        @endif

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
            {{ $users->links() }}

        </div>
    </div>

@endsection


@push('scripts')
<script type="text/javascript">



    $('.disable_user_button').click(function(e) {

        let formAction = $(this).attr('data-url');

        $('#disable_user_form').attr('action', formAction);

    });

    $('.enable_user_button').click(function(e) {

        let formAction = $(this).attr('data-url');

        $('#enable_user_form').attr('action', formAction);

    });


</script>
@endpush
