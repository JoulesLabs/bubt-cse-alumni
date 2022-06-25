@extends('admin.layouts.master')

@section('title', 'Alumni Member Requests')

@section('heading', 'Alumni Member Requests')

@section('breadcrumbs', Breadcrumbs::render('admin::alumni.requests'))
@section('buttons')

@if(auth_admin()->canDo('alumni.create'))
    <a href="{{ route('admin::alumni.create') }}" class="btn btn-sm btn-primary">Create</a>
@endif

@endsection

@section('modal')

<x-confirm-modal form-id="enable_user_form" id="enable_user_confirm_modal" title="Approve Request" deny="Close" confirm="Yes">
    <p>Do you really want to <strong>approve</strong> this request?</p>
    <form id="enable_user_form" method="post">

        @method('put')
        @csrf
    </form>
</x-confirm-modal>


<x-confirm-modal form-id="disable_user_form" id="disable_user_confirm_modal" title="Decline Request" deny="Close" confirm="Yes">
    <p>Do you really want to <strong>decline</strong> this request?</p>
    <form id="disable_user_form" method="post">

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
                        <th scope="col">Referer</th>
                        <th scope="col">Status</th>
                        @if(auth_admin()->canDo('user.update'))
                        <th scope="col" style="width: 25%;">Action</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($members as $member)
                        <tr>
                            <th scope="row">{{ item_sl($loop->index, $members->currentPage(), $members->perPage()) }}</th>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->mobile }}</td>
                            <td>{{ $member->intake }} ({{ \App\Enums\UserShift::from($member->shift)->name }})</td>
                            <td>{{ $member->referer->name }}</td>
                            @php
                                $classes = [
                                    \App\Enums\MemberRequestStatus::pending->value => 'badge-warning',
                                    \App\Enums\MemberRequestStatus::referer_accepted->value => 'badge-warning',
                                    \App\Enums\MemberRequestStatus::referer_declined->value => 'badge-dark',
                                    \App\Enums\MemberRequestStatus::declined->value => 'badge-danger',
                                ];

                                $class = $classes[$member->status] ?? 'badge-secondary';

                            @endphp
                            <td><span class="badge {{$class}}">{{ \App\Enums\MemberRequestStatus::from($member->status)->name }}</span></td>
                            <td>
                                <div class="buttons">
                                    @if(auth_admin()->canDo(['user.update', 'user.view']))
                                        <!-- <x-btn-ico url="#" icon="fa-eye" size="sm" type="info">View</x-btn-ico> -->
                                    @endif

                                    @if(auth_admin()->canDo('alumni.verify'))
                                        @if($member->status == \App\Enums\MemberRequestStatus::referer_accepted->value)
                                        <x-btn-ico class="enable_user_button"  icon="fas fa-times-circle" size="sm" type="success" data-toggle="modal" data-target="#enable_user_confirm_modal" data-url="{{route('admin::alumni.requests.change-status', [$member->id, 'status'=> \App\Enums\MemberRequestStatus::approved->value])}}" data-backdrop="static" data-keyboard="false" >Approve</x-btn-ico>
                                        @endif
                                        <x-btn-ico class="disable_user_button"  icon="fas fa-check-circle" size="sm" type="danger" data-toggle="modal" data-target="#disable_user_confirm_modal" data-url="{{route('admin::alumni.requests.change-status', [$member->id, 'status'=> \App\Enums\MemberRequestStatus::declined->value])}}" data-backdrop="static" data-keyboard="false" >Decline</x-btn-ico>

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
            {{ $members->links() }}

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
