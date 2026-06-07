<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Step Point - Login</title>

    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@600;700&family=Inter:wght@400;500;600&family=JetBrains+Mono:wght@500&display=swap"
        rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">

    <style>
        /* Custom Color Palette & Variables berdasarkan config Tailwind sebelumnya */
        :root {
            --bg-primary: #002b85;
            --bg-primary-container: #093fb4;
            --text-on-primary: #ffffff;
            --bg-surface: #f8f9ff;
            --bg-surface-lowest: #ffffff;
            --text-on-surface: #0b1c30;
            --text-on-surface-variant: #434653;
            --border-outline-variant: #c4c5d6;
            --outline: #747685;
            --secondary: #9c4400;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-surface);
            color: var(--text-on-surface);
        }

        .font-headline-xl {
            font-family: 'Hanken Grotesk', sans-serif;
            font-size: 32px;
            line-height: 40px;
            letter-spacing: -0.02em;
            font-weight: 700;
            position: relative;
            top: -35px;
        }

        .font-headline-lg {
            font-family: 'Hanken Grotesk', sans-serif;
            font-size: 24px;
            line-height: 32px;
            letter-spacing: -0.01em;
            font-weight: 600;
        }

        .font-headline-md {
            font-family: 'Hanken Grotesk', sans-serif;
            font-size: 20px;
            line-height: 28px;
            font-weight: 600;
        }

        .text-primary-custom {
            color: var(--bg-primary) !important;
        }

        .text-on-surface-variant {
            color: var(--text-on-surface-variant) !important;
        }

        .material-symbols-outlined{
            position: relative;
            top: -35px;
        }

        /* Glassmorphism Effect */
        .glass-effect {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* Custom Input Styling */
        .form-group-custom {
            position: relative;
        }

        .form-group-custom .material-symbols-outlined {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--outline);
            transition: color 0.2s;
            pointer-events: none;
        }

        .form-control-custom {
            height: 52px;
            padding-left: 48px;
            padding-right: 46px;
            background-color: var(--bg-surface);
            border: 1px solid var(--border-outline-variant);
            border-radius: 16px;
            font-size: 14px;
            transition: all 0.2s ease;

        }

        .form-control-custom:focus {
            background-color: var(--bg-surface);
            border-color: var(--bg-primary);
            box-shadow: 0 0 0 4px rgba(9, 63, 180, 0.2);
            outline: none;
        }

        .form-group-custom:focus-within .material-symbols-outlined {
            color: var(--bg-primary);
        }

        .form-group-custom .ti-eye,
        .form-group-custom .ti-eye-off {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--outline);
            cursor: pointer;
        }

        /* Submit Button Hover Effect */
        .btn-primary-custom {
            height: 48px;
            background-color: var(--bg-primary-container);
            color: var(--text-on-primary);
            border-radius: 16px;
            border: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .btn-primary-custom:hover {
            background-color: var(--bg-primary);
            color: var(--text-on-primary);
            transform: translateY(-1px);
            box-shadow: 0 10px 15px -3px rgba(9, 63, 180, 0.3);
        }

        /* Background Glow Decorative Elements */
        .blur-glow-1 {
            position: absolute;
            top: -128px;
            right: -128px;
            width: 256px;
            height: 256px;
            background: rgba(9, 63, 180, 0.2);
            filter: blur(120px);
            border-radius: 50%;
        }

        .blur-glow-2 {
            position: absolute;
            bottom: -192px;
            left: -192px;
            width: 384px;
            height: 384px;
            background: rgba(156, 68, 0, 0.1);
            filter: blur(140px);
            border-radius: 50%;
        }

        /* Parallax Image Scale base */
        .parallax-img {
            transition: transform 0.1s ease-out;
            transform: scale(1.1);
        }
    </style>
</head>

<body class="vh-100 overflow-hidden">

    <main class="d-flex h-100 w-100">
        <section class="d-none d-lg-flex col-lg-6 position-relative overflow-hidden"
            style="background-color: var(--bg-primary);">
            <div class="position-absolute inset-0 w-100 h-100 z-0">
                <img class="w-100 h-100 object-fit-cover opacity-75 parallax-img"
                    alt="A high-end professional photograph of a vibrant red limited-edition sneaker displayed in a minimalist, architecturally clean shoe store."
                    src="{{ asset('Soucre/src/assets/img/login_img.jpg') }}" />
                <div class="position-absolute top-0 start-0 w-100 h-100"
                    style="background: linear-gradient(to top right, rgba(0,43,133,0.6), transparent);"></div>
            </div>

            <div class="position-relative z-1 p-5 d-flex flex-column justify-content-between w-100 text-white">
                <div>
                    <div class="d-flex align-items-center gap-3">
                        <span class="material-symbols-outlined display-5">step_into</span>
                        <h1 class="font-headline-xl m-0">Step Point</h1>
                    </div>
                </div>
            </div>

            <div class="blur-glow-1"></div>
            <div class="blur-glow-2"></div>
        </section>

        <section class="col-12 col-lg-6 d-flex align-items-center justify-content-center p-4 p-md-5"
            style="background-color: var(--bg-surface-lowest);">
            <div class="w-100" style="max-width: 400px;">
                <div class="text-center text-lg-start mb-5">
                    <div class="d-lg-none d-flex justify-content-center mb-4">
                        <div class="d-flex align-items-center gap-2">
                            <span class="material-symbols-outlined text-primary-custom fs-2"
                                style="font-variation-settings: 'FILL' 1;">step_into</span>
                            <span class="font-headline-lg text-primary-custom">Step Point</span>
                        </div>
                    </div>
                    <h2 class="font-headline-xl text-dark text-center mt-5">Login</h2>
                    <p class="text-on-surface-variant small">Please enter your credentials to access the management
                        dashboard.</p>
                </div>

                <form action="{{ route('dashboard')  }}" method="GET">
                    @csrf
                    <div class="mb-4">
                        <label class="text-on-surface-variant fw-semibold small mb-2 ms-1" for="email">Email
                            Address</label>
                        <div class="form-group-custom">
                            <span class="material-symbols-outlined">mail</span>
                            <input class="form-control form-control-custom w-100" id="email"
                                placeholder="name@gmail.com" required="" type="email" />
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-2 ms-1">
                            <label class="text-on-surface-variant fw-semibold small m-0" for="password">Password</label>
                            <a class="text-primary-custom fw-semibold small text-decoration-none" href="#">Forgot
                                password?</a>
                        </div>
                        <div class="form-group-custom d-flex align-items-center">
                            <span class="material-symbols-outlined">lock</span>
                            <input class="form-control form-control-custom w-100" id="password" placeholder="Password"
                                required type="password" />
                            <i id="togglePassword" class="ti ti-eye fs-4"></i>
                        </div>
                    </div>

                    <div class="form-check d-flex align-items-center gap-2 mb-4 p-0">
                        <input class="form-check-input m-0 rounded" type="checkbox" id="remember"
                            style="width: 20px; height: 20px; border-color: var(--border-outline-variant);">
                        <label class="form-check-label text-on-surface-variant small cursor-pointer ms-1"
                            for="remember">
                            Remember this device
                        </label>
                    </div>

                    <button
                        class="btn btn-primary-custom w-100 font-headline-md d-flex align-items-center justify-content-center gap-2 mb-4"
                        type="submit">Login</button>
                </form>

                <div class="pt-3 text-center">
                    <p class="text-on-surface-variant small m-0">
                        Having trouble? <a class="text-primary-custom fw-semibold text-decoration-none" href="#">Contact
                            System Administrator</a>
                    </p>
                </div>
            </div>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script>
     
            const password = document.getElementById('password');
            const togglePassword = document.getElementById('togglePassword');

            togglePassword.addEventListener('click', () => {
                if (password.type === 'password') {
                    password.type = 'text';
                    togglePassword.classList.remove('ti-eye');
                    togglePassword.classList.add('ti-eye-off');
                } else {
                    password.type = 'password';
                    togglePassword.classList.remove('ti-eye-off');
                    togglePassword.classList.add('ti-eye');
                }
            });

            document.addEventListener('mousemove', (e) => {
                const moveX = (e.clientX - window.innerWidth / 2) * 0.005;
                const moveY = (e.clientY - window.innerHeight / 2) * 0.005;
                const img = document.querySelector('section img');
                if (img) {
                    img.style.transform = `scale(1.1) translate(${moveX}px, ${moveY}px)`;
                }
            });
      
    </script>
</body>

</html>