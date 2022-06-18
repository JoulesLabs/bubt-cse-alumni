@foreach($abilities as $module => $permissions)

    <h4>{{ucfirst($module)}}</h4>
    <div class="row" {{ isset($disable) && $disable ? 'disabled' : ''}}>

        @foreach($permissions as $permission)
                @php
                    $ability = $module . '.' . $permission;
                    if (!isset($selectedPermissions)) {
                        $selectedPermissions = [];
                    }
                @endphp
                <div class="col col-md-3">
                    <div class="form-group">
                        <label class="form-label">{{ $permission }}</label><br>
                        <div class="selectgroup w-100">
                            <label class="selectgroup-item">
                                <input type="radio" name="permissions[{{$module}}][{{$permission}}]" value="false" class="selectgroup-input Deny" {{ \Illuminate\Support\Arr::get($selectedPermissions, $ability) === false ? 'checked': '' }}>
                                <span class="selectgroup-button btn_checked_deny">Deny</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="permissions[{{$module}}][{{$permission}}]" value="" class="selectgroup-input Default" {{ \Illuminate\Support\Arr::get($selectedPermissions, $ability) === null ? 'checked': '' }}>
                                <span class="selectgroup-button btn_checked_def">Default</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="permissions[{{$module}}][{{$permission}}]" value="true" class="selectgroup-input Allow" {{ \Illuminate\Support\Arr::get($selectedPermissions, $ability) === true ? 'checked': '' }}>
                                <span class="selectgroup-button btn_checked_allow">Allow</span>
                            </label>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
@endforeach
