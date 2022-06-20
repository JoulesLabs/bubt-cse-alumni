@extends('app.layouts.main')

@section('heading', 'Member Requests')
@section('sub_heading', "List of all member requests")
@section('contents')
    <div class="card flex-fill">
        <div class="card-header">
            <h5 class="card-title mb-0">Members</h5>
        </div>
        <div class="card-body">
            <table class="table table-hover my-0">
                <thead>
                <tr>
                    <th>Name</th>
                    <th class="d-none d-xl-table-cell">Mobile</th>
                    <th class="d-none d-xl-table-cell">Intake</th>
                    <th class="d-none d-xl-table-cell">Shift</th>
                    <th>Status</th>
                    <th class="d-none d-md-table-cell">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($members as $member)
                    <tr>
                        <td>{{ $member->name }}</td>
                        <td class="d-none d-xl-table-cell">{{ $member->mobile }}</td>
                        <td class="d-none d-xl-table-cell">{{ $member->intake }}</td>
                        <td class="d-none d-xl-table-cell">{{ \App\Enums\UserShift::from($member->shift)->value }}</td>
                        <td>
                            @php
                                $statusClass = [
                                        \App\Enums\MemberRequestStatus::pending->value => 'bg-warning',
                                        \App\Enums\MemberRequestStatus::referer_accept->value => 'bg-success',
                                        \App\Enums\MemberRequestStatus::declined->value => 'bg-danger',
                                ];
                            @endphp
                            <span class="badge {{ $statusClass[$member->status] }}">{{ \App\Enums\MemberRequestStatus::from($member->status)->name }}
                            </span></td>
                        <td class="d-none d-md-table-cell">
                            <a href="" class="btn btn-success btn-sm">Accept</a>
                            <a href="" class="btn btn-danger btn-sm">Decline</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
