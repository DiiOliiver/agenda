<div class="card">
    @if(!empty($header))
        <div class="card-header text-white bg-dark mb-1">{{ $header }}</div>
    @endif
    <div class="card-body">
        {{ $slot }}
    </div>
</div>
