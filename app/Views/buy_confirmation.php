<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container my-5 d-flex justify-content-center">
    <div class="card shadow" style="max-width: 800px; width: 100%;">
        <div class="row g-0">
            <div class="col-md-5 d-flex align-items-center">
                <img src="<?= base_url('public/uploads/products/' . $product['image']) ?>" 
                     alt="<?= esc($product['name']) ?>" 
                     class="img-fluid p-3 rounded-start" 
                     style="max-height: 300px; object-fit: contain;">
            </div>
            <div class="col-md-7">
                <div class="card-body">
                    <h4 class="card-title"><?= esc($product['name']) ?></h4>
                    <p class="card-text mb-1"><strong>Brand:</strong> <?= esc($product['brand']) ?></p>
                    <p class="card-text mb-1"><strong>Price:</strong> ₱<?= esc($product['price']) ?></p>
                    <p class="card-text mb-3"><strong>Stock:</strong> <?= esc($product['stock']) ?></p>

                    <div class="alert alert-success">
                        You have selected this product. Checkout process coming soon!
                    </div>

                    <a href="<?= site_url('/shoes') ?>" class="btn btn-outline-primary">← Back to Shop</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
