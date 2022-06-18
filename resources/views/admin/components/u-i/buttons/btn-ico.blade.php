<a href="{{$url ?? '#'}}" id="{{ $id }}" class="btn btn-{{$size ?? 'md'}} btn-icon icon-left btn-{{ $type ?? 'primary' }} {{ $class }}" {{ $attributes }}>
    <i class="fa {{$icon}}"></i> {{$slot}}
</a>
