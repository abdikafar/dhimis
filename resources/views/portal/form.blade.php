@extends('portal.layout')

@section('content')
    @php $editing = $discount->exists; @endphp
    <div class="top">
        <h2 style="margin:0;">{{ $editing ? 'Edit product' : 'New product' }}</h2>
        <a class="muted" href="{{ route('portal.index') }}">&larr; Back</a>
    </div>

    <div class="card">
        <form method="POST" action="{{ $editing ? route('portal.update', $discount) : route('portal.store') }}">
            @csrf
            @if($editing) @method('PUT') @endif

            <div class="row">
                <div>
                    <label for="store">Store</label>
                    <input id="store" name="store" value="{{ old('store', $discount->store) }}">
                    @error('store')<div class="error">{{ $message }}</div>@enderror
                </div>
                <div>
                    <label for="item">Item</label>
                    <input id="item" name="item" value="{{ old('item', $discount->item) }}">
                    @error('item')<div class="error">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="row">
                <div>
                    <label for="price">Price (USD)</label>
                    <input id="price" name="price" type="number" step="0.01" value="{{ old('price', $discount->price) }}">
                    @error('price')<div class="error">{{ $message }}</div>@enderror
                </div>
                <div>
                    <label for="percent_off">Percent off (%)</label>
                    <input id="percent_off" name="percent_off" type="number" value="{{ old('percent_off', $discount->percent_off) }}">
                    @error('percent_off')<div class="error">{{ $message }}</div>@enderror
                </div>
            </div>

            <label for="category">Category</label>
            <input id="category" name="category" value="{{ old('category', $discount->category) }}">
            @error('category')<div class="error">{{ $message }}</div>@enderror

            <label for="image_url">Image URL (optional)</label>
            <input id="image_url" name="image_url" value="{{ old('image_url', $discount->image_url) }}">
            @error('image_url')<div class="error">{{ $message }}</div>@enderror

            <button class="btn" type="submit" style="margin-top:20px;">{{ $editing ? 'Save changes' : 'Add product' }}</button>
        </form>
    </div>
@endsection
