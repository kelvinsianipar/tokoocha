<div class="row">
    <div class="col-md-6">
        <div class="form-group border-bottom pb-4">
            <label for="price" class="form-label">Harga Produk</label>
            <input type="number" class="form-control" name="price" value="{{ old('price', $product->price) }}" id="price">
        </div>
    </div>
            <input type="hidden" class="form-control" name="weight" value="0" id="weight">

    <div class="col-md-6">
        <div class="form-group border-bottom pb-4">
            <label for="qty" class="form-label">Jumlah Produk</label>
            <input type="number" class="form-control" name="qty" value="{{ old('qty', $product->productInventory ? $product->productInventory->qty : null) }}" id="qty">
        </div>
    </div>
</div>