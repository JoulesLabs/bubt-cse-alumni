
<div class="card">

    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">A/C no.</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Cycle Number</th>
                        <th scope="col">Interval</th>
                        <th scope="col">Days Count</th>
                        <th scope="col">Consistency Count</th>
                        <th scope="col">Accumulated Profit</th>
                        <th scope="col">Withdrawable Amount</th>
                        <th scope="col">Profit Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tradingCycles as $trading)
                    <tr>
                        <th scope="row">{{ item_sl($loop->index, $tradingCycles->currentPage(), $tradingCycles->perPage()) }}</th>
                        <td>{{ $trading->tradingAccount->broker_number }}</td>
                        <td>{{ $trading->start_date }}</td>
                        <td>{{ $trading->end_date }}</td>

                        <td>
                            @if($trading?->status == \App\Enum\TradingCycleStatus::INACTIVE()->getValue())
                            <span class="badge badge-warning">Inactive</span>
                            @elseif($trading?->status == \App\Enum\TradingCycleStatus::ACTIVE()->getValue())
                            <span class="badge badge-success">Active</span>
                            @endif
                        </td>
                        <td>{{ $trading->cycle_number }}</td>
                        <td>{{ $trading->interval }}</td>
                        <td>{{ $trading->days_count }}</td>
                        <td>{{ $trading->consistency_cycle_count }}</td>
                        <td>{{ $trading->accumulated_profit }}</td>
                        <td>{{ $trading->withdrawable_amount }}</td>
                        <td>{{ $trading->profit }}</td>



                    </tr>
                    @empty
                    <tr>
                        <td colspan="18" align="center" style="color: #AA7777;">No data found!</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        </div>




    </div>
    <div class="card-footer text-right">
        {{ $tradingCycles->links() }}
    </div>

</div>
