<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<?= helper('form') ?>
    <div class="container mt-5">
        <h1 class="text-center">Login</h1>

        <div class="row justify-content-center">
            <div class="col-md-4">
                <?php if (session('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= session('error') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>


<?php if (session('msg')): ?>
    <div class="alert alert-info">
        <?= session('msg') ?>
    </div>
<?php endif; ?>

                                
                <?= form_open('/login') ?>
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input id="username" name="username" type="text" class="form-control" placeholder="Username">
                        <?php if (session('validation') && session('validation')->hasError('username')): ?>
                            <div class="text-danger mt-1">
                                <?= session('validation')->getError('username') ?>
                            </div>
                            
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" name="password" type="password" class="form-control" placeholder="Password">
                        <?php if (session('validation') && session('validation')->hasError('password')): ?>
                            <div class="text-danger mt-1">
                                <?= session('validation')->getError('password') ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <input type="submit" value="Login" class="btn btn-primary w-100">
                <?= form_close() ?>
                <p>Don’t have an account? <a href="<?= base_url('/signup') ?>">Signup here</a></p>
            </div>
             
        </div>
       

    </div>
<?= $this->endSection() ?>
