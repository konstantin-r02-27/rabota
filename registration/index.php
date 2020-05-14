<?php  session_start();?>
<html lang="ru">
<head>
    <meta charset="utf-8">

    <title>Регистрация</title>

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
                    <a class="nav-link" href="../avtorizacia/index.php">Авторазиция</a>
                    <a class="nav-link active" href="../registration/index.php">Регистрация</a>
                </nav>
            </div>
        </header>
        <?php
        if ($_SESSION['error_reg']==1){$_SESSION['error_reg']=0;?>
            <p_col class="p_col mb-3 font-weight-normal">Пользователь с таким Логином уже существует</p_col>
        <?php }
        if ($_SESSION['error_reg']==2){$_SESSION['error_reg']=0;?>
            <p_col class="p_col mb-3 font-weight-normal">Адрес Электронной почты введен не корректно</p_col>
        <?php }
        if ($_SESSION['flag']==0): ?>
        <main role="main" class="rinner cove">
            <form action="../sating/new_user.php" method="post" class="form-signin">
                <h1 class="h3 mb-3 font-weight-normal">Регистрация</h1>
                <input type="text" name="new_usersname" class="form-control" placeholder="Имя" required>
                <input type="text" name="new_login" class="form-control" placeholder="Логин" required>
                <input type="text" name="new_password" class="form-control" placeholder="Пароль" required>
                <input type="text" name="new_email" class="form-control" placeholder="Адрес электронной почты" required>
                <button class="btn btn-lg btn-primary btn-block btn-secondary" type="submit">Зарегистрироваться</button>
            </form>
        </main>
        <?php else:?>
            <h1 class="h3 mb-3 font-weight-normal">Рады приветстовать тебя на регистрации <?php echo $_SESSION['usersname']?> </h1>
            <form action="../sating/exit.php" method="post">
                <p><button class="btn btn-lg btn-primary btn-block btn-secondary" type="submit">Выход</button></p>
            </form>
        <?php endif; ?>
        <footer class="mastfoot mt-auto">
            <div>
                <p>Создал по макету</p>
            </div>
        </footer>
    </div>
</body>
</html>