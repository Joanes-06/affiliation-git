@extends('front.layout_dashboard')

@section('content')
    <div class="container">
        <h2>Historique des retraits</h2>

        @if($transactions->count() > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Montant</th>
                        <th>Statut</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $transaction)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ number_format($transaction->amount / 100, 2) }} XOF</td>
                            <td>{{ ucfirst($transaction->status) }}</td>
                            <td>{{ \Carbon\Carbon::parse($transaction->created_at)->format('d/m/Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Aucune transaction trouvée.</p>
        @endif
    </div>
@endsection
