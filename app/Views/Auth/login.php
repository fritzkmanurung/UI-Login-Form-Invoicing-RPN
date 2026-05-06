<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('style/style.css'); ?>">
    <link rel="shortcut icon" href="<?= base_url('images/favicon.png'); ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Invoice</title>
</head>

<body class="login-body">
    <div class="wrapper fadeInDown">

        <div>
            <img src="../images/logo-header-rpn.png" id="icon" alt="Logo" />
        </div>

        <div id="formContent">
            <!-- Judul -->
            <h2 class="primary"> Login Invoice </h2>

            <hr class="custom-hr">

            <!-- Login Form -->
            <form>
                <input type="text" id="username" class="fadeIn second" name="login" placeholder="Nama Pengguna">
                <div class="password-container fadeIn third">
                    <input type="password" id="password" name="login" placeholder="Kata Sandi">
                    <i class="fas fa-eye" id="togglePassword"></i>
                </div>
                <!-- <input type="submit" class="fadeIn fourth" value="Masuk"> -->
                <a href="<?= base_url('list-invoice'); ?>" class="fadeIn fourth" type="submit">Masuk</a>
            </form>

            <!-- Footer -->
            <div id="formFooter">
                <h3>2024 © PT. Riset Perkebunan Nusantara & IT Del</h3>
            </div>

        </div>
    </div>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            
            // toggle the icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>

</html>