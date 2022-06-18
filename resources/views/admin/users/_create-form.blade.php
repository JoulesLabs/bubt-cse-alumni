<form action="{{ route('admin::user.store') }}" method="post">
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
    </div>

    <div class="form-group">
        <label for="">Email</label>
        <input type="text" name="email" class="form-control" value="{{ old('email') }}">
    </div>


    <div class="form-group">
        <label for="">Password</label>
        <input type="password" name="password" class="form-control">
    </div>


    <div class="form-group">
        <label>Roles</label>
        <select class="form-control select2" name="roles[]" multiple="multiple">
            @foreach($roles as $role)
                <option value="{{$role->id}}">{{$role->role_name}}</option>
            @endforeach
        </select>
    </div>

    @csrf
    <button type="submit" class="btn btn-success">Create</button>
</form>
