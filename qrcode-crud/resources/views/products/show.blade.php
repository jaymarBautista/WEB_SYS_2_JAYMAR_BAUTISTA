@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5 text-center">
        <div class="card p-5 border-top border-primary border-5">
            <h2 class="fw-bold mb-1">{{ $product->name }}</h2>
            <p class="text-muted mb-4">Product ID: #{{ str_pad($product->id, 5, '0', STR_PAD_LEFT) }}</p>

            <div id="qr-section" class="bg-white p-3 d-inline-block rounded shadow-sm border mb-4">
                {!! $qr !!}
                <div class="mt-2 small fw-bold text-uppercase">{{ $product->name }}</div>
            </div>

            <div class="text-start bg-light p-3 rounded mb-4">
                <div class="mb-2"><strong>Description:</strong><br> <span class="text-muted">{{ $product->description ?: 'N/A' }}</span></div>
                <div><strong>Current Price:</strong> <span class="text-primary fw-bold">₱{{ number_format($product->price, 2) }}</span></div>
            </div>

            <div class="d-flex gap-2">
                <button onclick="printQR()" class="btn btn-primary flex-grow-1">
                    <i class="bi bi-printer me-2"></i>Print QR
                </button>
                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    function printQR() {
        const qrContent = document.getElementById('qr-section').innerHTML;
        const printWindow = window.open('', '', 'height=500,width=500');
        printWindow.document.write('<html><head><title>Label Print</title>');
        printWindow.document.write('<style>body{font-family:sans-serif; text-align:center; padding-top: 50px;} svg{width: 250px; height: 250px;}</style></head><body>');
        printWindow.document.write(qrContent);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    }
</script>
@endsection