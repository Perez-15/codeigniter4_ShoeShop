<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
    
    <?php if (session('msg')): ?>
        <div class="alert alert-info"><?= session('msg') ?> </div>
    <?php endif; ?>
    <?php if (session('validation')): ?>
        <?=session('validation')->listErrors() ?>
    <?php endif; ?>
  
    <div class="form-wrapper">
        <h1 class="text-center">Signup</h1>

        <?= helper('form') ?>
        <?= form_open('/signup') ?>
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="username">Username</label>
                <input id="username" name="username" type="text" class="form-control">
            </div>

            <div class="mb-3">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" class="form-control">
            </div>

            <div class="mb-3">
                <label for="password">Password</label>
                <input id="password" name="password" type="password" class="form-control">
            </div>

            <div class="mb-3">
                <label for="confirm_pass">Confirm Password</label>
                <input id="confirm_pass" name="confirm_pass" type="password" class="form-control">
            </div>

            <input type="submit" value="Signup" class="btn btn-primary">
        <?= form_close() ?>
        <p>Already have an account? <a href="<?= base_url('/login') ?>">Login here</a></p>
    </div>

<?= $this->endSection() ?>
