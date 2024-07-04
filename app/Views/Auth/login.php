<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('style/style.css'); ?>">
    <title>Invoice</title>
</head>

<body>
    <div class="wrapper fadeInDown">

        <div>
            <img src="../img/logo-header-rpn.png" id="icon" alt="Logo" />
        </div>

        <div id="formContent">
            <!-- Judul -->
            <h2 class="primary"> Invoice Log In </h2>

            <hr class="custom-hr">

            <!-- Login Form -->
            <form>
                <input type="text" id="username" class="fadeIn second" name="login" placeholder="username">
                <input type="password" id="password" class="fadeIn third" name="login" placeholder="password">
                <!-- <input type="submit" class="fadeIn fourth" value="Masuk"> -->
                <a href="<?= base_url('list-invoice'); ?>" class="fadeIn fourth" type="submit">Masuk</a>
            </form>

            <!-- Footer -->
            <div id="formFooter">
                <h3>2024 © PT. Riset Perkebunan Nusantara & IT Del</h3>
            </div>

        </div>
    </div>
</body>

</html>