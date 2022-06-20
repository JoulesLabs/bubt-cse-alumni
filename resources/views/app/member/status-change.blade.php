@extends('app.layouts.main')

@section('heading', 'Member Requests')
@section('sub_heading', "List of all member requests")
@section('contents')
    <div class="card flex-fill">
        <div class="card-header">
            <h5 class="card-title mb-0">Members</h5>
        </div>
        <div class="card-body text-center">
            <h4 class=" mb-0">{{ $member->name }}</h4>
            <div class="text-muted mb-2">
                <i class="align-middle" data-feather="phone"></i> <span class=" align-middle">
                    <a href="tel:{{$member->mobile}}">{{ $member->mobile }}</a>
                </span>&nbsp;&nbsp;
                <i class="align-middle" data-feather="mail"></i> <span class=" align-middle">
                    <a href="mailto:{{$member->email}}">{{ $member->email }}</a>
                </span>
            </div>

            <div>
                <span class="badge bg-warning">{{ $member->intake }} intake</span>
                <span class="badge bg-warning">{{ \App\Enums\UserShift::from($member->shift)->name }} shift</span>
            </div>
            <br><br>
            <form action="{{ route('member.status.change.submit', ['id'=>$member->id, 'status' => $status]) }}" method="post">
                <div class="form-group">
                    <textarea name="referer_note" id="referer_note" class="form-control" rows="5" placeholder="Add note here"></textarea>
                </div>
                @csrf
                <button type="submit" class="btn btn-{{$class}}">{{ ucfirst($status) }}</button>
            </form>
        </div>

    </div>

@endsection
