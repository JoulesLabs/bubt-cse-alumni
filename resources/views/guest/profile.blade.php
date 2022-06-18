<!DOCTYPE html>
<html lang="en">

<head>
    @include('app.partials.head')
</head>

<body>
<div class="wrapper">
    @include('app.partials.nav')

    <div class="main">
        @include('app.partials.top')

        <section style="background-color: #eee;">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                                     alt="avatar"
                                     class="rounded-circle img-fluid" style="width: 150px;">
                                <h5 class="my-3">{{$user?->name}}</h5>
                                <p class="text-muted mb-4">{{$user?->address}}</p>
                            </div>
                        </div>
                        <div class="card mb-4 mb-lg-0">
                            <div class="card-body p-0">
                                @if(!blank($user->information->facebook) || !blank($user->information->linkedin) || !blank($user->information->github))
                                    <ul class="list-group list-group-flush rounded-3 p-3 mb-2">
                                        @if(!blank($user->information->facebook))
                                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                                <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                                                <p class="mb-0 ml-3 mr-auto">
                                                    <a href="{{$user?->information?->facebook}}">{{$user?->information?->facebook}}</a>
                                                </p>
                                            </li>
                                        @endif
                                        @if(!blank($user->information->linkedin))
                                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                                <i class="fab fa-linkedin-in fa-lg" style="color: #55acee;"></i>
                                                <p class="mb-0 ml-3 mr-auto">
                                                    <a href="{{$user?->information?->linkedin}}">{{$user?->information?->linkedin}}</a>
                                                </p>
                                            </li>
                                        @endif
                                        @if(!blank($user->information->github))
                                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                                <i class="fab fa-github fa-lg" style="color: #ac2bac;"></i>
                                                <p class="mb-0 ml-3 mr-auto">
                                                    <a href="{{$user?->information?->github}}">{{$user?->information?->github}}</a>
                                                </p>
                                            </li>
                                        @endif
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                @if(Auth::user()->admin == 1)
                                    <div class="d-flex p-3">
                                        <a href="{{route("user.edit", ['id' => Auth::user()->id])}}"
                                           class="btn btn-primary ml-auto p-2">Edit</a>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Full Name</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{$user?->name}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{$user?->email}}</p>
                                    </div>
                                </div>
                                @if(Auth::user()->admin == 1)
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Mobile</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{$user?->mobile}}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Address</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{$user->information->lives}}</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div>
                            <div class="card mb-4 mb-md-0">
                                <div class="card-body">
                                    <p class="mb-4"><span class="text-primary font-weight-bold me-1">Information</span>
                                    </p>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Reference</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">
                                                <a href="/user/{{App\Models\User::where('email', $user->information->reference)->get()->first()->id}}/profile">
                                                    {{App\Models\User::where('email', $user->information->reference)->get()->first()->name}}
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Intake</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{$user?->information?->intake}}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Shift</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{\App\Enums\UserShift::from($user?->information?->shift)->name}}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Passing Year</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{
                                                    Carbon\Carbon::parse($user?->information?->passing_year)->isoFormat('MMM Do YYYY')
                                            }}</p>
                                        </div>
                                    </div>
                                    @if(Auth::user()->admin == 1)
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">University ID</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0">{{$user?->information?->university_id}}</p>
                                            </div>
                                        </div>
                                    @endif
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Current Job Designation</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{$user?->information?->current_job_designation}}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Current Company</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{$user?->information?->current_company}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('app.partials.footer')
    </div>
</div>

@include('app.partials.scripts')

</body>

</html>
