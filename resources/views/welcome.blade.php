<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bengkel Ongel</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
</head>

<body style="font-family: 'figtree', sans-serif; background-color: #fff; color: #000; margin: 0;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 20px;">
        <header class="header"
            style="display: flex; justify-content: space-between; align-items: center; padding: 4px 0;">
            <p style="font-size: 1.0rem; line-height: 1.0; max-width: 300px; font-weight: 600">Bengkel Ongel</p>
            <nav>
                <a href="{{ route('login') }}" class="btn-login"
                    style="padding: 12px 20px; background-color: #000; color: #fff; text-decoration: none; border-radius:8px; font-weight: 600; transition: background-color 0.3s ease;">Log
                    in</a>
                <a href="{{ route('register') }}" class="btn-register"
                    style="margin-left: px;margin-right: -20px; padding: 12px 20px; background-color: #000; color: #fff; text-decoration: none; border-radius: 8px; font-weight: 600; transition: background-color 0.3s ease;">Register</a>
            </nav>
        </header>

        <div style="position: relative; display: flex; height: 80vh;">
            <div
                style="background-image: url('https://i.pinimg.com/originals/7d/10/ea/7d10ea497feb26b63d93a4f6467da98e.jpg'); background-size: cover; background-position: center; flex: 1;">
            </div>
            <div style="display: flex; flex-direction: column; text-align: left; padding: 30px 35px; width: 400px;">
                <h1 style="font-size: 3.5rem; font-weight: 600; margin-bottom: 20px;">Welcome to Bengkel Ongel</h1>
                <p style="font-size: 1.2rem; line-height: 1.6; max-width: 600px; margin-bottom: 20px;">Your trusted
                    partner for automotive repairs and services.</p>
                <div class="actions" style="display: flex; gap: 20px; margin-top: 20px;">
                    <a href="#services"
                        style="padding: 12px 20px; background-color: #000; color: #fff; text-decoration: none; border-radius: 8px; font-weight: 600; transition: background-color 0.3s ease;">Our
                        Services</a>
                    <a href="#contact"
                        style="padding: 12px 20px; background-color: #000; color: #fff; text-decoration: none; border-radius: 8px; font-weight: 600; transition: background-color 0.3s ease;">Contact
                        Us</a>
                </div>
            </div>
        </div>
    </div>
    <footer style="position: fixed; bottom: 0; width: 100%; text-align: center; color: #000; padding: 10px 0;">
        <div class="container">
            <div class="row mb-0 h6">
                <div class="col">
                    <p>Muhammad Syafiq Ibrahim L0122116/C</p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>