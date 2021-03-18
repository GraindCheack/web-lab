<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styleGeneral.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <header class="header navbar navbar-expand-lg navbar-dark bg-primary">
        <nav class="navbar-nav" style="margin: 0 auto;">
            <li class="nav-item">
                <a class="nav-link active" href="http://localhost/goods/index">Товары</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="http://localhost/cart/index">Корзина</a>
            </li>
        </nav>
    </header>
    <main>
        <?php include 'views/' . $view_content; ?>
    </main>
    <footer class="bg-dark footer">
        <div class="copyright">
            <span>@2021 Copyright Text</span>
        </div>
        <div class="contacts">
            <span>Контакты:</span>
            <span>+375440000000</span>
            <span>nikon@gmail.com</span>
        </div>
    </footer>
</body>

</html>