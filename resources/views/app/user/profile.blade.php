@extends('app.layouts.main')

@section('heading', 'Profile')
@section('sub_heading', $user->name)
@section('contents')
    <div class="row">
        <div class="col-md-4 col-xl-3">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title mb-0">Profile Details</h5>
                </div>
                <div class="card-body text-center">
                    <img
                        src="{{ $user->avatar }}"
                        alt="Christina Mason"
                        class="img-fluid rounded-circle mb-2"
                        width="128"
                        height="128"
                    />
                    <h5 class="mb-0">{{ $user->name }}</h5>
                    <div class="text-muted mb-2">
                        <i>
                            {{ $user->information->designation ?? '' }}</i>
                        <a href="{{ $user->information->company?->website ?? '#' }}" target="_blank">
                            {{ $user->information->company?->name ? ', ' . $user->information->company?->name : '' }}
                        </a>
                    </div>

                    <div>
                        <a class="btn btn-primary btn-sm" href="#">Follow</a>
                        <a class="btn btn-primary btn-sm" href="#"
                        ><span data-feather="message-square"></span> Message</a
                        >
                    </div>
                </div>
                <hr class="my-0" />
                <div class="card-body">
                    <h5 class="h6 card-title">Skills</h5>
                    @foreach($user->tags as $skill)
                        <a href="#" class="badge bg-primary me-1 my-1">{{ $skill->name }}</a>
                    @endforeach

                </div>
                <hr class="my-0" />
                <div class="card-body">
                    <h5 class="h6 card-title">About</h5>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-1">
                        <span
                            data-feather="briefcase"
                            class="feather-sm me-1"
                        ></span>
                            {{ $user->information->alumni_role ?? \App\Enums\AlumniRole::member }}
                        </li>
                        <li class="mb-1">
                        <span
                            data-feather="home"
                            class="feather-sm me-1"
                        ></span>
                            Lives in <a href="#">{{ $user->information->lives }}</a>
                        </li>
                    </ul>
                </div>
                <hr class="my-0" />
                <div class="card-body">
                    <h5 class="h6 card-title">Social Links</h5>
                    <ul class="list-unstyled mb-0">
                        @if($user->information->facebook)
                        <li class="mb-1">
                            <span data-feather="facebook" class="feather-sm me-1"></span>
                            <a target="_blank" href="{{ $user->information->facebook }}">Facebook</a>
                        </li>
                        @endif
                        @if($user->information->linkedin)
                        <li class="mb-1">
                            <span data-feather="linkedin" class="feather-sm me-1"></span>
                            <a target="_blank" href="{{ $user->information->linkedin }}">LinkedIn</a>
                        </li>
                        @endif

                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-8 col-xl-9">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Activities</h5>
                </div>
                <div class="card-body h-100">
                    <div class="d-flex align-items-start">
                        <img
                            src="img/avatars/avatar-5.jpg"
                            width="36"
                            height="36"
                            class="rounded-circle me-2"
                            alt="Vanessa Tucker"
                        />
                        <div class="flex-grow-1">
                            <small class="float-end text-navy">5m ago</small>
                            <strong>Vanessa Tucker</strong> started following
                            <strong>Christina Mason</strong><br />
                            <small class="text-muted">Today 7:51 pm</small><br />
                        </div>
                    </div>

                    <hr />
                    <div class="d-flex align-items-start">
                        <img
                            src="img/avatars/avatar.jpg"
                            width="36"
                            height="36"
                            class="rounded-circle me-2"
                            alt="Charles Hall"
                        />
                        <div class="flex-grow-1">
                            <small class="float-end text-navy">30m ago</small>
                            <strong>Charles Hall</strong> posted something on
                            <strong>Christina Mason</strong>'s timeline<br />
                            <small class="text-muted">Today 7:21 pm</small>

                            <div class="border text-sm text-muted p-2 mt-1">
                                Etiam rhoncus. Maecenas tempus, tellus eget
                                condimentum rhoncus, sem quam semper libero, sit amet
                                adipiscing sem neque sed ipsum. Nam quam nunc, blandit
                                vel, luctus pulvinar, hendrerit id, lorem. Maecenas
                                nec odio et ante tincidunt tempus. Donec vitae sapien
                                ut libero venenatis faucibus. Nullam quis ante.
                            </div>

                            <a href="#" class="btn btn-sm btn-danger mt-1"
                            ><i class="feather-sm" data-feather="heart"></i>
                                Like</a
                            >
                        </div>
                    </div>

                    <hr />
                    <div class="d-flex align-items-start">
                        <img
                            src="img/avatars/avatar-4.jpg"
                            width="36"
                            height="36"
                            class="rounded-circle me-2"
                            alt="Christina Mason"
                        />
                        <div class="flex-grow-1">
                            <small class="float-end text-navy">1h ago</small>
                            <strong>Christina Mason</strong> posted a new blog<br />

                            <small class="text-muted">Today 6:35 pm</small>
                        </div>
                    </div>

                    <hr />
                    <div class="d-flex align-items-start">
                        <img
                            src="img/avatars/avatar-2.jpg"
                            width="36"
                            height="36"
                            class="rounded-circle me-2"
                            alt="William Harris"
                        />
                        <div class="flex-grow-1">
                            <small class="float-end text-navy">3h ago</small>
                            <strong>William Harris</strong> posted two photos on
                            <strong>Christina Mason</strong>'s timeline<br />
                            <small class="text-muted">Today 5:12 pm</small>

                            <div class="row g-0 mt-1">
                                <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                    <img
                                        src="img/photos/unsplash-1.jpg"
                                        class="img-fluid pe-2"
                                        alt="Unsplash"
                                    />
                                </div>
                                <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                    <img
                                        src="img/photos/unsplash-2.jpg"
                                        class="img-fluid pe-2"
                                        alt="Unsplash"
                                    />
                                </div>
                            </div>

                            <a href="#" class="btn btn-sm btn-danger mt-1"
                            ><i class="feather-sm" data-feather="heart"></i>
                                Like</a
                            >
                        </div>
                    </div>

                    <hr />
                    <div class="d-flex align-items-start">
                        <img
                            src="img/avatars/avatar-2.jpg"
                            width="36"
                            height="36"
                            class="rounded-circle me-2"
                            alt="William Harris"
                        />
                        <div class="flex-grow-1">
                            <small class="float-end text-navy">1d ago</small>
                            <strong>William Harris</strong> started following
                            <strong>Christina Mason</strong><br />
                            <small class="text-muted">Yesterday 3:12 pm</small>

                            <div class="d-flex align-items-start mt-1">
                                <a class="pe-3" href="#">
                                    <img
                                        src="img/avatars/avatar-4.jpg"
                                        width="36"
                                        height="36"
                                        class="rounded-circle me-2"
                                        alt="Christina Mason"
                                    />
                                </a>
                                <div class="flex-grow-1">
                                    <div class="border text-sm text-muted p-2 mt-1">
                                        Nam quam nunc, blandit vel, luctus pulvinar,
                                        hendrerit id, lorem. Maecenas nec odio et ante
                                        tincidunt tempus.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr />
                    <div class="d-flex align-items-start">
                        <img
                            src="img/avatars/avatar-4.jpg"
                            width="36"
                            height="36"
                            class="rounded-circle me-2"
                            alt="Christina Mason"
                        />
                        <div class="flex-grow-1">
                            <small class="float-end text-navy">1d ago</small>
                            <strong>Christina Mason</strong> posted a new blog<br />
                            <small class="text-muted">Yesterday 2:43 pm</small>
                        </div>
                    </div>

                    <hr />
                    <div class="d-flex align-items-start">
                        <img
                            src="img/avatars/avatar.jpg"
                            width="36"
                            height="36"
                            class="rounded-circle me-2"
                            alt="Charles Hall"
                        />
                        <div class="flex-grow-1">
                            <small class="float-end text-navy">1d ago</small>
                            <strong>Charles Hall</strong> started following
                            <strong>Christina Mason</strong><br />
                            <small class="text-muted">Yesterdag 1:51 pm</small>
                        </div>
                    </div>

                    <hr />
                    <div class="d-grid">
                        <a href="#" class="btn btn-primary">Load more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
