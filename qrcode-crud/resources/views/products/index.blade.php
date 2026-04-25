@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-dark m-0">Product Inventory</h2>
    <a href="{{ route('products.create') }}" class="btn btn-primary px-4 shadow-sm">
        <i class="bi bi-plus-lg me-2"></i>Add Product
    </a>
</div>

@if(session('success'))
<div class="alert alert-success border-0 shadow-sm alert-dismissible fade show">
    <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="card p-3">
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th class="ps-3">Product Info</th>
                    <th>Price</th>
                    <th class="text-center">Quick Scan</th>
                    <th class="text-end pe-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td class="ps-3">
                        <div class="fw-bold">{{ $product->name }}</div>
                        <small class="text-muted text-truncate d-block" style="max-width: 250px;">
                            {{ $product->description ?: 'No description provided.' }}
                        </small>
                    </td>
                    <td class="fw-semibold text-primary">₱{{ number_format($product->price, 2) }}</td>
                    <td class="text-center">
                        <div class="bg-light d-inline-block p-1 rounded border">
                            {!! $product->qr !!}
                        </div>
                    </td>
                    <td class="text-end pe-3">
                        <div class="btn-group shadow-sm">
                            <a href="{{ route('products.show', $product) }}" class="btn btn-outline-info btn-sm" title="View"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-outline-warning btn-sm" title="Edit"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Archive this product?')"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection