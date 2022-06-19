<?php
    $msg = session('msg');
    $type = session('type');
?>
@if ($type == \App\Enums\MsgType::success)
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $msg }}</strong>
    </div>
@endif

@if ($type == \App\Enums\MsgType::error)
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $msg }}</strong>
    </div>
@endif
