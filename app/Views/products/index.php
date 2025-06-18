<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container-fluid" style="max-width: 1600px; padding: 0 100px;margin-bottom: 150px">

    <?php if (session()->getFlashdata('msg')): ?>
        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
            <?= session()->getFlashdata('msg') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <h1 class="mb-4 mt-3">Product List</h1>
    
    <a href="<?= site_url('products/add') ?>" class="btn btn-success mb-4">Add New Product</a>

    <div class="table-responsive">
        <table class="table table-bordered table-hover" style="width: 100%;">
            <thead>
                <tr>
                    <th style="width: 5%; padding: 16px;">ID</th>
                    <th style="width: 20%; padding: 16px;">Name</th>
                    <th style="width: 15%; padding: 16px;">Brand</th>
                    <th style="width: 10%; padding: 16px;">Price</th>
                    <th style="width: 10%; padding: 16px;">Stock</th>
                    <th style="width: 30%; padding: 16px;">Image</th>
                    <th style="width: 10%; padding: 16px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td style="padding: 16px;"><?= esc($product['id']); ?></td>
                        <td style="padding: 16px;"><?= esc($product['name']); ?></td>
                        <td style="padding: 16px;"><?= esc($product['brand']); ?></td>
                        <td style="padding: 16px;"><?= esc($product['price']); ?></td>
                        <td style="padding: 16px;"><?= esc($product['stock']); ?></td>
                        <td style="padding: 16px">
                            <?php if ($product['image']): ?>
                                <img src="<?= base_url('/public/uploads/products/' . $product['image']); ?>" style="width: 200px; height: 100px; object-fit: cover;">
                            <?php endif ?>
                        </td>
                        <td style="padding: 16px">
                            <div class="d-grid gap-2">
                                <a href="<?= base_url('/products/edit/' . $product['id']); ?>" class="btn btn-sm btn-primary">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <a href="<?= base_url('/products/delete/' . $product['id']); ?>" 
                                   class="btn btn-sm btn-danger"
                                   onclick="return confirm('Are you sure you want to delete this product?');">
                                    <i class="bi bi-trash"></i> Delete
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</div>
<?= $this->endSection() ?>
