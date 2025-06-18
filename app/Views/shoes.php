<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container my-5">
    <h1 class="mb-4">Shop Our Shoes</h1>

    <div class="row">
        <?php foreach ($products as $product): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <?php if (!empty($product['image'])): ?>
                        <img src="<?= base_url('public/uploads/products/' . $product['image']) ?>" 
                             class="card-img-top" 
                             alt="<?= esc($product['name']) ?>" 
                             style="height: 250px; object-fit: cover;">
                    <?php else: ?>
                        <img src="<?= base_url('assets/images/no-image.png') ?>" 
                             class="card-img-top" 
                             alt="No Image" 
                             style="height: 250px; object-fit: cover;">
                    <?php endif; ?>

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= esc($product['name']) ?></h5>
                        <p class="card-text">Brand: <?= esc($product['brand']) ?></p>
                        <p class="card-text">Price: ₱<?= esc($product['price']) ?></p>
                        <p class="card-text">In Stock: <?= esc($product['stock']) ?></p>

                        <a href="<?= site_url('buy/' . $product['id']) ?>" class="btn btn-primary mt-auto">Buy</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->endSection() ?>
