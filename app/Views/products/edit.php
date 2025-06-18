<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
    <h1>Edit Product</h1>
    <form action="<?= site_url('products/update/' . $product['id']) ?>" method="post" enctype="multipart/form-data">
      <?= csrf_field() ?>
        
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= esc($product['name']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="brand" class="form-label">Brand</label>
        <input type="text" class="form-control" id="brand" name="brand" value="<?= esc($product['brand']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Price (₱)</label>
        <input type="number" class="form-control" id="price" name="price" value="<?= esc($product['price']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="stock" class="form-label">Stock</label>
        <input type="number" class="form-control" id="stock" name="stock" value="<?= esc($product['stock']) ?>" required>
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Product Image</label>
        <input type="file" class="form-control" id="image" name="image">
        <?php if ($product['image']): ?>
            <img src="<?= base_url('public/uploads/products/' . esc($product['image'])) ?>" alt="Product Image" width="100">
        <?php endif ?>
    </div>

    <button type="submit" class="btn btn-primary">Update Product</button>
</form>

<?= $this->endSection() ?>
