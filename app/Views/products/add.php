<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
    <h1>Add New Product</h1>
    <form action="<?= site_url('/products/create') ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="brand" class="form-label">Brand</label>
            <input type="text" class="form-control" id="brand" name="brand" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price (₱)</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Product Image</label>
            <input type="file" class="form-control" id="image" name="image" accept=".jpg,.jpeg,.png" required>

        </div>

        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
<?= $this->endSection() ?>
