<?php  session_start();?>
<html lang="ru">
<head>
    <meta charset="utf-8">

    <title>Домашняя страница</title>

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
                <a class="nav-link active" href="../home/index.php">Домашняя страница</a>
                <?php if ($_SESSION['role']==1):?>
                    <a class="nav-link" href="../admin/index.php">Администрирование</a>
                    <a class="nav-link" href="../sating/exit.php">Выход</a>
                <?php else:?>
                    <?php if ($_SESSION['flag']==0): ?>
                        <a class="nav-link" href="../avtorizacia/index.php">Авторазиция</a>
                        <a class="nav-link" href="../registration/index.php">Регистрация</a>
                    <?php else:?>
                        <a class="nav-link" href="../sating/exit.php">Выход</a>
                <?php endif;endif;?>
            </nav>
        </div>
    </header>
    <?php if ($_SESSION['flag']==0): ?>
    <main role="main" class="rinner cove">
        <h1 class="cover-heading">Добро пожаловать</h1>
        <p class="lead">Пожалуйста пройдите авторизацию или регистрацию</p>
        <form action="../avtorizacia/index.php" method="post">
            <p><button class="btn btn-lg btn-primary btn-block btn-secondary" type="submit">Авторизация</button></p>
        </form>
        <form action="../registration/index.php" method="post">
            <p><button class="btn btn-lg btn-primary btn-block btn-secondary" type="submit">Регистрация</button></p>
        </form>
    </main>
    <?php else:
        if ($_SESSION['role']==2):?>
            <h1 class="h3 mb-3 font-weight-normal">Хотите перейти к редактированию администратиными данными <?php echo $_SESSION['usersname']?> ?</h1>
            <form action="../admin/index.php" method="post">
                <p><button class="btn btn-lg btn-primary btn-block btn-secondary" type="submit">Admin</button></p>
            </form>
        <?php else:?>
        <h1 class="h3 mb-3 font-weight-normal">Рады приветстовать тебя дома <?php echo $_SESSION['usersname']?> </h1>
        <form action="../sating/exit.php" method="post">
            <p><button class="btn btn-lg btn-primary btn-block btn-secondary" type="submit">Выход</button></p>
        </form>
    <?php endif; endif;?>
    <footer class="mastfoot mt-auto">
        <div>
            <p>Создал по макету</p>
        </div>
    </footer>
</div>
</body>
</html>