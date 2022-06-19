<!DOCTYPE html>
<html lang="en">

<head>
    @include('app.partials.head')
</head>

<body>
<main class="d-flex w-100">
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">
                    <div class="text-center mt-4">
                        @include('app.components.flash-message')
                    </div>
                    <div class="text-center mt-4">
                        <h1 class="h2">Get started</h1>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-4">
                                <form method="post" action="/signup">
                                    <div class="mb-3">
                                        <label class="form-label">Full Name</label>
                                        <input class="form-control form-control-lg" required type="text" name="name"
                                               value="{{ old('name') }}"
                                               placeholder="Enter your name"/>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input class="form-control form-control-lg" required type="email" name="email"
                                               value="{{ old('email') }}"
                                               placeholder="Enter your email"/>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input class="form-control form-control-lg" required type="password"
                                               name="password"
                                               placeholder="Enter password"/>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Mobile</label>
                                        <input class="form-control form-control-lg" required type="text" name="mobile"
                                               value="{{ old('mobile') }}"
                                               placeholder="Enter your mobile number"/>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Intake</label>
                                        <input class="form-control form-control-lg" required type="number" name="intake"
                                               value="{{ old('intake') }}"
                                               placeholder="Enter intake"/>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Shift</label>
                                        <select class="form-control" name="shift" required>
                                            <option value="">Choose</option>
                                            @foreach(\App\Enums\UserShift::array() as $value=>$name)
                                                <option value="{{$value}}"
                                                        @if(old('shift') == $value) selected @endif>{{$name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Reference</label>
                                        <div class="input-group input-group-lg">
                                            <select name="reference_by" class="form-select dropdown"
                                                    style="width: 25%;">
                                                <option selected>By ...</option>
                                                <option value="email"
                                                        @if(old('reference_by') == 'email') selected @endif>Email
                                                </option>
                                                <option value="mobile"
                                                        @if(old('reference_by') == 'mobile') selected @endif>Mobile
                                                </option>
                                                <option value="id" @if(old('reference_by') == 'id') selected @endif>
                                                    Alumni ID
                                                </option>
                                            </select>
                                            <input name="reference" type="text" value="{{ old('reference') }}"
                                                   class="form-control form-control-lg" style="width: 75%;"
                                                   aria-label="Text input with dropdown button">
                                        </div>
                                    </div>
                                    <div class="text-center mt-3">
                                        @csrf
                                        <button type="submit" class="btn btn-lg btn-primary">Sign up</button>
                                    </div>
                                    <div class="d-block mt-4">
                                        <label for="password" class="control-label">Already have account?</label>
                                        <a href="/login">
                                            Login Here!
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>

<script src="js/app.js"></script>

</body>

</html>
