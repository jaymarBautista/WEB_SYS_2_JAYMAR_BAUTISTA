@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('products.index') }}" class="text-decoration-none">Inventory</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add New Product</li>
            </ol>
        </nav>

        <div class="card border-0 shadow-sm overflow-hidden">
            <div class="card-header bg-success text-white p-3 border-0">
                <h5 class="card-title mb-0">
                    <i class="bi bi-plus-circle me-2"></i>Product Details
                </h5>
            </div>

            <div class="card-body p-4">
                <form action="{{ route('products.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-bold small text-uppercase">Name</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="bi bi-box-seam"></i></span>
                            <input type="text" name="name" class="form-control border-start-0 ps-0" placeholder="Enter product name" required autofocus>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold small text-uppercase">Description</label>
                        <textarea name="description" class="form-control" rows="4" placeholder="Briefly describe the item..."></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold small text-uppercase">Price (PHP)</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light fw-semibold">₱</span>
                            <input type="number" step="0.01" name="price" class="form-control" placeholder="0.00" required>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success px-4 py-2 fw-bold flex-grow-1 shadow-sm">
                            <i class="bi bi-save me-2"></i>Save Product
                        </button>
                        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary px-4 py-2">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <div class="mt-3 text-center small text-muted">
            <i class="bi bi-info-circle me-1"></i> A unique QR code will be generated automatically after saving.
        </div>
    </div>
</div>
@endsection