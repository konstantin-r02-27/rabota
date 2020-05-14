<?php session_start();
//print_r($_SESSION);?>
<html lang="ru">
<head>
    <meta charset="utf-8">


    <title>Администрирование</title>

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
                <a class="nav-link active" href="../admin/index.php">Администрирование</a>
                <a class="nav-link" href="../sating/exit.php">Выход</a>
            </nav>
        </div>
    </header>

    <?php if ($_SESSION['role']==2): ?>
    <form action="Users/index.php" method="post" class="form-signin">
        <h1 class="h3 mb-3 font-weight-normal">Преветствуем уважаемый администратор <?php echo $_SESSION['usersname']?></h1>

        <button class="btn btn-lg btn-primary btn-block btn-secondary" type="submit">Просмотреть список пользовалей</button>
    </form>
        <?php else:
        include '../sating/exit.php';
    endif;
//    print_r($_SESSION);?>
    <footer class="mastfoot mt-auto">
        <div>
            <p>Создал по макету</p>
        </div>
    </footer>
</div>
</body>
</html>