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
                <form method="post" action="{{route("user.update", ['id'=>Auth::id()])}}">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body text-center">
                                    <img
                                            src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                                            alt="avatar"
                                            class="rounded-circle img-fluid" style="width: 150px;">
                                </div>
                            </div>

                            <div class="card mb-4 mb-lg-0">
                                <div class="card-body p-0">
                                    <ul class="list-group list-group-flush rounded-3 p-3 mb-2">
                                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                            <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                                            <p class="mb-0">
                                                <input type="url" value="{{$user?->information?->facebook}}"
                                                       name="facebook" placeholder="Enter facebook account link">
                                            </p>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                            <i class="fab fa-linkedin-in fa-lg" style="color: #55acee;"></i>
                                            <p class="mb-0">
                                                <input type="url" value="{{$user?->information?->linkedin}}"
                                                       name="linkedin" placeholder="Enter linkedin account link">
                                            </p>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                            <i class="fab fa-github fa-lg" style="color: #ac2bac;"></i>
                                            <p class="mb-0">
                                                <input type="url" value="{{$user?->information?->github}}" name="github"
                                                       placeholder="Enter github account link">
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="d-flex p-3">
                                        {{--                                    <a href="{{route("user.edit")}}" class="btn btn-primary ml-auto p-2">Edit</a>--}}
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Full Name</p>
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="text-muted mb-0 form-control form-control-lg" required
                                                   type="text" name="name"
                                                   value="{{$user?->name}}"
                                            />
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Email</p>
                                        </div>
                                        <div class="col-sm-6 mr-auto">
                                            <input class="text-muted mb-0 form-control form-control-lg" required
                                                   type="email" name="email"
                                                   value="{{$user?->email}}"
                                            />
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Mobile</p>
                                        </div>
                                        <div class="col-sm-6 mr-auto">
                                            <input class="text-muted mb-0 form-control form-control-lg" required
                                                   type="number" name="mobile"
                                                   value="{{$user?->mobile}}"
                                            />
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Address</p>
                                        </div>
                                        <div class="col-sm-6 mr-auto">
                                            <input class="text-muted mb-0 form-control form-control-lg"
                                                   type="text" name="lives"
                                                   value="{{$user?->information?->lives}}"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="card mb-4 mb-md-0">
                                    <div class="card-body">
                                        <p class="mb-4"><span
                                                    class="text-primary font-weight-bold me-1">Information</span>
                                        </p>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Reference</p>
                                            </div>
                                            <div class="col-sm-6 mr-auto">
                                                <input class="text-muted mb-0 form-control form-control-lg" required
                                                       type="text" name="reference" readonly
                                                       value="{{App\Models\User::where('email', $user?->information?->reference)->get()->first()->name}}"
                                                />
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Intake</p>
                                            </div>
                                            <div class="col-sm-6 mr-auto">
                                                <input class="text-muted mb-0 form-control form-control-lg" required
                                                       type="number" name="intake"
                                                       value="{{$user?->information?->intake}}"
                                                />
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Shift</p>
                                            </div>
                                            <div class="col-sm-6 mr-auto">
                                                <select class="form-control" name="shift" required>
                                                    @foreach(\App\Enums\UserShift::array() as $value=>$name)
                                                        <option
                                                                value="{{$value}}" {{$user?->information?->shift == $value ? 'selected' : ''}}
                                                        >{{$name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Passing Year</p>
                                            </div>
                                            <div class="col-sm-6 mr-auto">
                                                <input class="text-muted mb-0 form-control form-control-lg" required
                                                       type="date" name="passing_year"
                                                       value="{{date('Y-m-d',strtotime($user?->information?->passing_year))}}"
                                                />
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">University ID</p>
                                            </div>
                                            <div class="col-sm-6 mr-auto">
                                                <input class="text-muted mb-0 form-control form-control-lg" required
                                                       type="text" name="university_id"
                                                       value="{{$user?->information?->university_id}}"
                                                />
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Current Job Designation</p>
                                            </div>
                                            <div class="col-sm-6 mr-auto">
                                                <input class="text-muted mb-0 form-control form-control-lg" required
                                                       type="text" name="current_job_designation"
                                                       value="{{$user?->information?->current_job_designation}}"
                                                />
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Current Company</p>
                                            </div>
                                            <div class="col-sm-6 mr-auto">
                                                <input class="text-muted mb-0 form-control form-control-lg" required
                                                       type="text" name="current_company"
                                                       value="{{$user?->information?->current_company}}"
                                                />
                                            </div>
                                        </div>
                                        <div class="col-sm-3 ml-auto mt-4">
                                            <input type="submit" value="Update" class="ml-auto btn btn-info ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>

        @include('app.partials.footer')
    </div>
</div>

@include('app.partials.scripts')

</body>

</html>
