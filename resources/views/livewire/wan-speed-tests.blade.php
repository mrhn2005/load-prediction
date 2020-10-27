<div>

    <header>
        <h2>WAN speed tests <small>Past 24hours</small></h2>
    </header>

    <div wire:ignore wire:key={{ $chart_id }}>
        @if($chart)
            {!! $chart->container() !!}
        @endif
    </div>
    <input wire:model="message" type="text">
</div>

@if($chart)
    @push('scripts')
        {!! $chart->script() !!}
    @endpush
@endif
