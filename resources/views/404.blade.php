<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Page Not Found</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Hanken+Grotesk:wght@700;800&all"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

    <style>
        :root {
            --color-primary: #002b85;
            --color-background: #f8f9ff;
            --color-on-surface: #0b1c30;
            --color-outline-variant: #c4c5d6;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--color-background);
            /* Background pola grid halus menyerupai gambar */
            background-image:
                radial-gradient(rgba(0, 43, 133, 0.1) 1px, transparent 0),
                radial-gradient(rgba(0, 43, 133, 0.1) 1px, transparent 0);
            background-size: 24px 24px;
            background-position: 0 0, 12px 12px;
            color: var(--color-on-surface);
            min-height: 100vh;
        }

        /* CONTAINER ANGKA 404 LAYER */
        .error-code-wrapper {
            position: relative;
            display: inline-block;
            margin-bottom: -10px;
        }

        /* Angka 404 transparan di belakang */
        .error-code-bg {
            font-family: 'Hanken Grotesk', sans-serif;
            font-size: 150px;
            font-weight: 800;
            color: rgba(9, 63, 180, 0.07);
            position: absolute;
            top: -25px;
            left: 50%;
            transform: translateX(-48%);
            white-space: nowrap;
            user-select: none;
        }

        /* Angka 404 utama di depan */
        .error-code-main {
            font-family: 'Hanken Grotesk', sans-serif;
            font-size: 130px;
            font-weight: 800;
            color: var(--color-primary);
            position: relative;
            line-height: 1;
            letter-spacing: -0.03em;
        }

        /* LOGO DEKORASI (Simbol P diatas angka) */
        .error-logo {
            color: var(--color-primary);
            font-size: 32px;
            margin-bottom: 5px;
            display: inline-block;
        }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center py-5">

    <div class="text-center d-flex flex-column align-items-center px-3">

        <div class="error-logo">
            <i class="ti ti-brand-planetscale"></i>
        </div>

        <div class="error-code-wrapper">
            <div class="error-code-bg">404</div>
            <div class="error-code-main">404</div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>