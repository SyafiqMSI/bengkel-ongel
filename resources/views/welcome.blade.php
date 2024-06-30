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
            style="display: flex; justify-content: space-between; align-items: center; padding: 20px 10vw; position: fixed; top: 0; left: 0; right: 0; background-color: #ffffff; z-index: 1000; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
            <p style="font-size: 1.0rem; line-height: 1.0; max-width: 300px; font-weight: 600">Bengkel Ongel</p>
            <nav>
                @guest
                    <a href="{{ route('login') }}" class="btn-login"
                        style="padding: 12px 20px; background-color: #000; color: #fff; text-decoration: none; border-radius: 8px; font-weight: 600; transition: background-color 0.3s ease;">Login</a>
                    <a href="{{ route('register') }}" class="btn-register"
                        style="margin-left: 20px; padding: 12px 20px; background-color: #000; color: #fff; text-decoration: none; border-radius: 8px; font-weight: 600; transition: background-color 0.3s ease;">Register</a>
                @else
                    @if(Auth::user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="btn-dashboard"
                            style="margin-left: 20px; padding: 12px 20px; background-color: #000; color: #fff; text-decoration: none; border-radius: 8px; font-weight: 600; transition: background-color 0.3s ease;">Dashboard</a>
                    @else
                        <a href="{{ route('profile.edit') }}" class="btn-profile"
                            style="padding: 12px 20px; background-color: #000; color: #fff; text-decoration: none; border-radius: 8px; font-weight: 600; transition: background-color 0.3s ease;">Profile</a>
                        <a href="#" class="btn-cart"
                            style="margin-left: 20px; padding: 12px 20px; background-color: #000; color: #fff; text-decoration: none; border-radius: 8px; font-weight: 600; transition: background-color 0.3s ease;">Cart</a>
                    @endif
                @endguest
            </nav>


        </header>

        <div style="position: relative; display: flex; height: 80vh; margin: 5vh 0">
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
        <form class="mt-6 space-y-6">
            <div class="flex items-center gap-4" style="margin-bottom: 20px;">
                <div class="card" style="background-color: #f0f0f0; padding: 20px; border-radius: 8px; flex: 1;">
                    <h2 class="text-lg font-semibold">Service Detail 1</h2>
                    <p>Your trusted partner for automotive repairs and services.</p>
                    <div class="flex gap-4 mt-4">
                        <div class="inner-card" style="background-color: #ccc; width: 100px; height: 100px; border-radius: 8px;"></div>
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-4" style="margin-bottom: 20px;">
                <div class="card" style="background-color: #f0f0f0; padding: 20px; border-radius: 8px; flex: 1;">
                    <h2 class="text-lg font-semibold">Service Detail 2</h2>
                    <p>Additional details about your services or offerings.</p>
                    <div class="flex gap-4 mt-4">
                        <div class="inner-card" style="background-color: #ccc; width: 100px; height: 100px; border-radius: 8px;"></div>
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-4" style="margin-bottom: 20px;">
                <div class="card" style="background-color: #f0f0f0; padding: 20px; border-radius: 8px; flex: 1;">
                    <h2 class="text-lg font-semibold">Service Detail 3</h2>
                    <p>More details about your services or company.</p>
                    <div>
                        <div class="inner-card" style="background-color: #ccc; width: 100px; height: 100px; border-radius: 8px;"></div>
                    </div>
                </div>
            </div>
        </form>



        </div>
    </div>
    <footer style="width: 100%; text-align: center; color: #000; padding: 10px 0;">
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