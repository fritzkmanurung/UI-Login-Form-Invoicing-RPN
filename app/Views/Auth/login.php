<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('style/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('vendors/ti-icons/css/themify-icons.css'); ?>">
    <link rel="shortcut icon" href="<?= base_url('images/favicon.png'); ?>" />
    <title>Invoice</title>
</head>

<body class="login-body">
    <div class="wrapper fadeInDown">

        <div>
            <img src="<?= base_url('images/logo-header-rpn.png'); ?>" id="icon" alt="Logo" />
        </div>

        <div id="formContent">
            <!-- Judul -->
            <h2 class="primary"> Login Invoice </h2>

            <hr class="custom-hr">

            <!-- Login Form -->
            <form>
                <input type="text" id="username" class="fadeIn second" name="username" placeholder="Nama Pengguna">
                <div class="password-container fadeIn third">
                    <input type="password" id="password" name="password" placeholder="Kata Sandi">
                    <i class="ti-eye" id="togglePassword"></i>
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
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('ti-eye');
            this.classList.toggle('ti-close');
        });
    </script>
</body>

</html>