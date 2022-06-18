<form action="{{route('user::create')}}" method="get">
    <div class="form-group">
        <label>Search</label>
        <input type="text" name="search" class="form-control" placeholder="Search by email">
    </div>

    <button type="submit" class="btn btn-success">Search</button>
</form>
