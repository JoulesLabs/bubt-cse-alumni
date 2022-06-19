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
            <!-- Personal Information -->
            <form action="">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Personal Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name" class="form-label">Name</label>
                            <input name="name" id="name" type="text" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input name="email" id="email" type="text" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="mobile" class="form-label">Mobile</label>
                            <input name="mobile" id="mobile" type="text" class="form-control" placeholder="Mobile">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="card-primary btn btn-primary right">Save</button>
                    </div>
                </div>
            </form>

            <!-- Change Password -->
            <form action="">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Change Password</h5>
                    </div>
                    <div class="card-body">
                            <div class="form-group">
                                <label for="old-password" class="form-label">Old Password</label>
                                <input name="old-password" id="old-password" type="password" class="form-control" placeholder="Old Password">
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-label">Password</label>
                                <input name="password" id="password" type="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input name="password_confirmation" id="password_confirmation" type="password" class="form-control" placeholder="Confirm Password">
                            </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="card-primary btn btn-primary right">Save</button>
                    </div>
                </div>
            </form>

            <!-- Professional Information -->
            <form action="">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Professional Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name" class="form-label">Designation</label>
                            <input name="name" id="name" type="text" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="company" class="form-label">Company</label>
                            <select name="" id="company" class="form-control">
                            </select>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="card-primary btn btn-primary right">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('#company').select2({
                placeholder: 'Select a company',
                ajax: {
                    url: '{{ route('api:companies') }}',
                    dataType: 'json',
                    data: function(params) {
                        // console.log(params);
                        return {
                            q: params.term
                        };
                    },

                    processResults: function(data) {
                        // console.log(data);
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            })
                        };
                    }
                    // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                }
            });
        }).on("select2:select", function(e) {

                console.log(e.params.data);

        });
    </script>
@endpush
