@extends('portal.layout')

@section('content')
    <div class="top">
        <h2 style="margin:0;">Products</h2>
        <a class="btn" href="{{ route('portal.create') }}">+ New product</a>
    </div>

    <div class="card">
        @if($discounts->isEmpty())
            <p class="muted" style="margin:0;">No products yet. Add your first one.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Store</th>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Off</th>
                        <th>Final</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($discounts as $d)
                        <tr>
                            <td>{{ $d->store }}</td>
                            <td>{{ $d->item }} @if($d->category)<span class="tag">{{ $d->category }}</span>@endif</td>
                            <td>${{ number_format($d->price, 2) }}</td>
                            <td class="off">{{ $d->percent_off }}%</td>
                            <td>${{ number_format($d->final_price, 2) }}</td>
                            <td>
                                <div class="actions">
                                    <a class="btn ghost" href="{{ route('portal.edit', $d) }}">Edit</a>
                                    <form method="POST" action="{{ route('portal.destroy', $d) }}" onsubmit="return confirm('Delete this product?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn danger" type="submit">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
