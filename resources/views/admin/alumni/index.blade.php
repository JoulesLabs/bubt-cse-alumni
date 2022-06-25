@extends('admin.layouts.master')

@section('title', 'Alumni List')

@section('heading', 'Alumni List')

@section('breadcrumbs', Breadcrumbs::render('admin::alumni.index'))
@section('buttons')

@if(auth_admin()->canDo('alumni.create'))
    <a href="{{ route('admin::alumni.create') }}" class="btn btn-sm btn-primary">Create</a>
@endif

@endsection

@section('modal')

<x-confirm-modal form-id="disable_user_form" id="disable_user_confirm_modal" title="Disable User" deny="Close" confirm="Yes">
    <p>Do you really want to <strong>block</strong> this alumni?</p>
    <form id="disable_user_form" method="post">

        @method('put')
        @csrf
    </form>
</x-confirm-modal>




<x-confirm-modal form-id="enable_user_form" id="enable_user_confirm_modal" title="Enable User" deny="Close" confirm="Yes">
    <p>Do you really want to <strong>unblock</strong> this alumni?</p>
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
                        <th scope="col">Mobile</th>
                        <th scope="col">Intake</th>
                        <th scope="col">Status</th>
                        @if(auth_admin()->canDo('user.update'))
                        <th scope="col" style="width: 25%;">Action</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($alumni as $student)
                        <tr>
                            <th scope="row">{{ item_sl($loop->index, $alumni->currentPage(), $alumni->perPage()) }}</th>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->mobile }}</td>
                            <td>{{ $student->information->intake }} ({{ \App\Enums\UserShift::from($student->information->shift)->name }})</td>
                            @php
                                $classes = [
                                    \App\Enums\UserStatus::draft->value => 'badge-warning',
                                    \App\Enums\UserStatus::approved->value => 'badge-success',
                                    \App\Enums\UserStatus::blocked->value => 'badge-danger',
                                ];

                                $class = $classes[$student->status] ?? 'badge-secondary';

                            @endphp
                            <td><span class="badge {{$class}}">{{ \App\Enums\UserStatus::from($student->status)->name }}</span></td>
                            <td>
                                <div class="buttons">
                                    @if(auth_admin()->canDo(['user.update', 'user.view']))
                                        <!-- <x-btn-ico url="#" icon="fa-eye" size="sm" type="info">View</x-btn-ico> -->
                                    @endif

                                    @if(auth_admin()->canDo('alumni.update'))
                                        <x-btn-ico url="{{route('admin::user.edit', [$student->id])}}" icon="fa-pencil-alt" size="sm" type="warning">Edit</x-btn-ico>
                                        @if($student->status == \App\Enums\UserStatus::approved->value)
                                        <x-btn-ico class="disable_user_button"  icon="fas fa-times-circle" size="sm" type="danger" data-toggle="modal" data-target="#disable_user_confirm_modal" data-url="{{route('admin::alumni.change-status', [$student->id, 'status'=> \App\Enums\UserStatus::blocked->value])}}" data-backdrop="static" data-keyboard="false" >Block</x-btn-ico>
                                        @elseif($student->status == \App\Enums\UserStatus::blocked->value)
                                        <x-btn-ico class="enable_user_button"  icon="fas fa-check-circle" size="sm" type="success" data-toggle="modal" data-target="#enable_user_confirm_modal" data-url="{{route('admin::alumni.change-status', [$student->id, 'status'=> \App\Enums\UserStatus::approved->value])}}" data-backdrop="static" data-keyboard="false" >Unblock</x-btn-ico>
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
            {{ $alumni->links() }}

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
