<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title ?? 'Shoe Shop') ?> </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #000000;
            --secondary-color: #FFD700;
            --background-gradient: linear-gradient(135deg, #000000 0%, #1a1a1a 50%, #333333 100%);
            --card-gradient: linear-gradient(to bottom, #FFD700 0%, #ffffff 100%);
            --button-gradient: linear-gradient(to right, #FFD700 0%, #b8860b 100%);
            --text-color: #333333;
            --light-text: #6c757d;
        }

        body {
            background: var(--background-gradient);
            background-attachment: fixed;
            min-height: 100vh;
            color: #fff;
            display: flex;
            flex-direction: column;
            font-family: 'Poppins', sans-serif;
        }

        .navbar {
            background: linear-gradient(to right, #000000, #1a1a1a);
            box-shadow: 0 2px 10px rgb(0 0 0 / 0.3);
        }

        .navbar-brand {
            font-weight: 600;
            color: var(--secondary-color) !important;
            text-shadow: 0 0 5px #FFD700;
        }

        .btn-logout {
            font-weight: 500;
            background: linear-gradient(to right, #dc3545, #a71d2a);
            border: none;
            padding: 0.4rem 1rem;
            color: white;
        }

        .btn-logout:hover {
            background: linear-gradient(to right, #a71d2a, #dc3545);
        }

        main.container {
            flex: 1;
            padding: 2rem 1.5rem;
        }

        footer {
            background-color: #111;
            color: #aaa;
            text-align: center;
            padding: 1rem 0;
            font-size: 0.9rem;
        }

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand" href="<?= site_url('/shoes') ?>">FastBreak Footwear</a>
            <?php if (session()->get('is_logged_in')): ?>
                <a href="<?= site_url('/logout') ?>" class="btn btn-logout">
                    <i class="bi bi-box-arrow-right me-1"></i> Logout
                </a>
            <?php endif; ?>
        </div>
    </nav>

    <main class="container mt-3">
        <?= $this->renderSection('content') ?>
    </main>

    <footer>
        &copy; <?= date('Y') ?> FastBreak Footwear. All rights reserved.
    </footer>
</body>
</html>
