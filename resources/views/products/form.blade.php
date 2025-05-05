<div class="card p-4 shadow-sm">
    <div class="row mb-3 align-items-center">
        <label class="col-sm-3 col-form-label text-end">Product Name : </label>
        <div class="col-sm-9">
            <input type="text" name="name" id="product"  class="form-control" value="{{ old('name', $product->name ?? '') }}" required>
        </div>
    </div>

    <div class="row mb-3 align-items-center">
        <label class="col-sm-3 col-form-label text-end">SKU : </label>
        <div class="col-sm-9">
            <input type="text" name="sku" id="product"  class="form-control" value="{{ old('sku', $product->sku ?? '') }}" required>
        </div>
    </div>

    <div class="row mb-3 align-items-center">
        <label class="col-sm-3 col-form-label text-end">Price : </label>
        <div class="col-sm-9">
            <input type="number" step="0.01" id="product"  name="price" class="form-control" value="{{ old('price', $product->price ?? '') }}" required>
        </div>
    </div>

    <div class="row mb-3 align-items-center">
        <label class="col-sm-3 col-form-label text-end">Quantity : </label>
        <div class="col-sm-9">
            <input type="number" id="product"  name="quantity" class="form-control" value="{{ old('quantity', $product->quantity ?? '') }}" required>
        </div>
    </div>
</div>

<style>
    body {
    background-color: #f8f9fa;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
#product{
    border-radius: 9px;
}
.card {
    border-radius: 10px;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
    border: none;
}

.card-header {
    background-color: #ffffff;
    border-bottom: 1px solid #dee2e6;
    font-weight: bold;
    font-size: 1.2rem;
}

.btn {
    border-radius: 6px;
    padding: 6px 14px;
    font-weight: 500;
}

.btn-primary {
    background-color: #007bff;
    border: none;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.btn-warning, .btn-danger, .btn-secondary {
    border: none;
}

.table th {
    background-color: #343a40;
    color: #fff;
}

.table td, .table th {
    vertical-align: middle;
}

.alert {
    border-radius: 6px;
    font-size: 0.95rem;
}

</style>