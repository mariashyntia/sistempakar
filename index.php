<<<<<<< HEAD
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Selamat Datang - Sistem Pakar</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        /* BACKGROUND GAMBAR */
        body.pembuka {
            margin: 0;
            height: 100vh;
            font-family: 'Poppins', Arial, sans-serif;
            background: url('assets/img/sayuran_daun.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            overflow: hidden;
            position: relative;
        }

        /* OVERLAY GELAP */
        .overlay {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.55);
            z-index: 1;
        }

        /* WELCOME CONTAINER */
        .container {
            position: relative;
            z-index: 2;
            text-align: center;
            background: rgba(25, 55, 85, 0.85);
            padding: 60px 80px;
            border-radius: 25px;
            backdrop-filter: blur(10px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.4);
            animation: fadeIn 1s ease-in-out;
        }

        .container h1 {
            font-size: 2.3em;
            margin-bottom: 15px;
            letter-spacing: 1px;
            color: #aef7d0;
            text-shadow: 0 3px 10px rgba(0,0,0,0.5);
        }

        .container p {
            font-size: 1.1em;
            margin-bottom: 30px;
            color: #e6f9ff;
        }

        /* BUTTON STYLE */
        .btn {
            display: inline-block;
            background: linear-gradient(135deg, #2b7a4b, #1e90a3);
            color: #fff;
            padding: 12px 35px;
            margin: 10px;
            border-radius: 30px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
            box-shadow: 0 4px 12px rgba(0,0,0,0.3);
        }

        .btn:hover {
            background: linear-gradient(135deg, #3fa56d, #3ea2c2);
            transform: translateY(-3px);
            box-shadow: 0 8px 18px rgba(0,255,160,0.4);
        }

        /* ANIMATION */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* RESPONSIVE */
        @media (max-width: 600px) {
            .container {
                width: 85%;
                padding: 40px 25px;
            }
            .container h1 {
                font-size: 1.8em;
            }
        }
    </style>
</head>
<body class="pembuka">
    <div class="overlay"></div>
    <div class="container">
        <h1>🌿 Selamat Datang di Sistem Pakar Rekomendasi Pemilihan Pupuk</h1>
        <p>Silakan pilih login sebagai:</p>
        <a href="login_admin.php" class="btn">👨‍💼 Admin</a>
        <a href="login_user.php" class="btn">👩‍🌾 User</a>
    </div>
</body>
</html>
=======
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Selamat Datang - Sistem Pakar</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        /* BACKGROUND GAMBAR */
        body.pembuka {
            margin: 0;
            height: 100vh;
            font-family: 'Poppins', Arial, sans-serif;
            background: url('assets/img/sayuran_daun.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            overflow: hidden;
            position: relative;
        }

        /* OVERLAY GELAP */
        .overlay {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.55);
            z-index: 1;
        }

        /* WELCOME CONTAINER */
        .container {
            position: relative;
            z-index: 2;
            text-align: center;
            background: rgba(25, 55, 85, 0.85);
            padding: 60px 80px;
            border-radius: 25px;
            backdrop-filter: blur(10px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.4);
            animation: fadeIn 1s ease-in-out;
        }

        .container h1 {
            font-size: 2.3em;
            margin-bottom: 15px;
            letter-spacing: 1px;
            color: #aef7d0;
            text-shadow: 0 3px 10px rgba(0,0,0,0.5);
        }

        .container p {
            font-size: 1.1em;
            margin-bottom: 30px;
            color: #e6f9ff;
        }

        /* BUTTON STYLE */
        .btn {
            display: inline-block;
            background: linear-gradient(135deg, #2b7a4b, #1e90a3);
            color: #fff;
            padding: 12px 35px;
            margin: 10px;
            border-radius: 30px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
            box-shadow: 0 4px 12px rgba(0,0,0,0.3);
        }

        .btn:hover {
            background: linear-gradient(135deg, #3fa56d, #3ea2c2);
            transform: translateY(-3px);
            box-shadow: 0 8px 18px rgba(0,255,160,0.4);
        }

        /* ANIMATION */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* RESPONSIVE */
        @media (max-width: 600px) {
            .container {
                width: 85%;
                padding: 40px 25px;
            }
            .container h1 {
                font-size: 1.8em;
            }
        }
    </style>
</head>
<body class="pembuka">
    <div class="overlay"></div>
    <div class="container">
        <h1>🌿 Selamat Datang di Sistem Pakar Rekomendasi Pemilihan Pupuk</h1>
        <p>Silakan pilih login sebagai:</p>
        <a href="login_admin.php" class="btn">👨‍💼 Admin</a>
        <a href="login_user.php" class="btn">👩‍🌾 User</a>
    </div>
</body>
</html>
>>>>>>> c0f19f3 (Rapihin project sistem pakar (PHP Native))
