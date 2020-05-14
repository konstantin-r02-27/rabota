<?php session_start();
//print_r($_SESSION);?>
<html lang="ru">
<head>
    <meta charset="utf-8">

    <title>Авторизация</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Favicons -->
    <link href="cover.css" rel="stylesheet">
</head>

<body class="text-center">

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
        <div class="inner">
            <nav class="nav nav-masthead justify-content-center">
                <a class="nav-link" href="../home/index.php">Домашняя страница</a>
                <a class="nav-link active" href="../avtorizacia/index.php">Авторазиция</a>
                <a class="nav-link" href="../registration/index.php">Регистрация</a>
            </nav>
        </div>
    </header>
    <?php
    if ($_SESSION['error']==1){$_SESSION['error']=0;?>
        <p_col class="p_col mb-3 font-weight-normal">Данные ведены не корректно</p_col>
    <?php }
    if ($_SESSION['error']==2){$_SESSION['error']=0;?>
        <p_col class="p_col mb-3 font-weight-normal">Такого пользователя не существует</p_col>
    <?php }
    if ($_SESSION['flag']==0): ?>
    <form action="../sating/proverka.php" method="post" class="form-signin">
          <h1 class="h3 mb-3 font-weight-normal">Авторизуйтесь</h1>
        <input type="text" name="login" class="form-control" placeholder="Логин" required autofocus>
        <input type="text" name="password" class="form-control" placeholder="Пароль" required>
        <button class="btn btn-lg btn-primary btn-block btn-secondary" type="submit">Войти</button>
    </form>

    <form action="../registration/index.php" method="post">
                    <p><button class="btn btn-lg btn-primary btn-block btn-secondary" type="submit">Регистрация</button></p>
    </form>
<?php else:?>
        <h1 class="h3 mb-3 font-weight-normal">Рады приветстовать тебя <?php echo $_SESSION['usersname']?> </h1>
        <form action="../sating/exit.php" method="post">
        <p><button class="btn btn-lg btn-primary btn-block btn-secondary" type="submit">Выход</button></p>
     </form>
    <?php endif;
//    print_r($_SESSION);?>
    <footer class="mastfoot mt-auto">
        <div>
            <p>Создал по макету</p>
        </div>
    </footer>
</div>
</body>
</html>