@php
$_show_msg = false;
if (isset($errors)) {
    if ($errors->any() || session()->has('_status')) {
    $_show_msg = true;
}

    $_alert_type = 'alert-success';
    if ($errors->any()) {
        $_alert_type = 'alert-danger';
        $_alert_msg = $errors->first();
    }

}

if (session()->get('_status') == 'error') {
    $_alert_type = 'alert-danger';
}

if (session()->has('_msg')) {
    $_alert_msg = session()->get('_msg', 'Something went wrong!');
}
@endphp

@if($_show_msg)
<div class="alert {{$_alert_type}} alert-dismissible show fade" style="text-align: center">
    <div class="alert-body">
        <button class="close" data-dismiss="alert">
            <span>×</span>
        </button>

        {{$_alert_msg}}
    </div>
</div>
@endif
