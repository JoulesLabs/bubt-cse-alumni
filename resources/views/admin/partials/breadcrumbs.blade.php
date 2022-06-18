@if (count($breadcrumbs))

    <div class="section-header-breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)

            @if ($breadcrumb->url && !$loop->last)
                <div class="breadcrumb-item"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></div>
            @else
                <div class="breadcrumb-item active">{{ $breadcrumb->title }}</div>
            @endif

        @endforeach
    </div>

@endif
