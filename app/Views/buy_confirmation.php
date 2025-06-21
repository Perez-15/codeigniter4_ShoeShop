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


                    <!-- Checkout Form -->
                    <form action="<?= site_url('confirm-purchase') ?>" method="post">
    <?= csrf_field() ?>
    
    <input type="hidden" name="product_id" value="<?= esc($product['id']) ?>">
    <input type="hidden" name="product_name" value="<?= esc($product['name']) ?>">
    <input type="hidden" name="product_price" value="<?= esc($product['price']) ?>">
    <input type="hidden" name="product_image" value="<?= esc($product['image']) ?>">


    
    <!-- Rest of your form remains the same -->


                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea name="address" class="form-control" rows="2" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="payment" class="form-label">Payment Method</label>
                            <select name="payment" class="form-control" required>
                                <option value="Cash on Delivery">Cash on Delivery</option>
                                <option value="GCash">GCash</option>
                                <option value="Credit Card">Credit Card</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Confirm Purchase</button>
                        <a href="<?= site_url('/shoes') ?>" class="btn btn-outline-secondary ms-2">← Back to Shop</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
