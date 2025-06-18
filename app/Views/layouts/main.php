<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title ?? 'Shoe Shop') ?> </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
        main.container {
            flex: 1;
            padding: 1.5rem;
        }
        .form-wrapper {
            max-width: 420px;
            padding: 0 15px;
            margin: 0 auto;
        }
        .card {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgb(0 0 0 / 0.3);
            background: var(--card-gradient);
            border: none;
        }
        .card-body {
            padding: 2rem;
        }
        .form-control {
            background-color: #fff9cc;
            border: 1px solid #FFD700;
            padding: 0.65rem 1rem;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #FFD700;
            box-shadow: 0 0 0 0.25rem #FFD70040;
            background-color: #ffffff;
        }
        .form-label {
            font-weight: 500;
            color: var(--light-text);
            margin-bottom: 0.5rem;
        }
        .btn-primary {
            background: var(--button-gradient);
            border: none;
            font-weight: 600;
            padding: 0.5rem 1.5rem;
            color: black;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: linear-gradient(to right, #b8860b 0%, #FFD700 100%);
            transform: scale(1.05);
        }
        .btn-danger {
            background: linear-gradient(to right, #dc3545, #a71d2a);
            border: none;
            font-weight: 500;
            padding: 0.5rem 1.5rem;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="">SHOE SHOP</a>

            <?php if (session()->get('is_logged_in')): ?>
                <a href="<?= site_url('/logout') ?>" class="btn btn-danger">LOGOUT</a>
            <?php endif; ?>
        </div>
    </nav>

    <main class="container mt-3">
        <?= $this->renderSection('content') ?>
    </main>

</body>
</html>
