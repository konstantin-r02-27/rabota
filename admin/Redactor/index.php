<?php session_start();
//print_r ($_GET);?>
<html lang="ru">
<head>
    <meta charset="utf-8">

    <title>Редактирование пользователя</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Favicons -->
    <link href="cover.css" rel="stylesheet">
</head>

<body class="text-center">

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
        <div class="inner">
            <nav class="nav nav-masthead justify-content-center">
                <a class="nav-link" href="/home/index.php">Домашняя страница</a>
                <a class="nav-link" href="/admin/index.php">Администрирование</a>
                <a class="nav-link" href="/sating/exit.php">Выход</a>
            </nav>
        </div>
    </header>
    <?php if ($_SESSION['role']==2):?>
        <form action="../users/index.php" method="post">
            <button class="btn btn-lg btn-primary btn-block btn-secondary" type="submit">Назад</button>
        </form>
        <form action="redactor.php" method="get">
            <table class="table text-center table-light">

                <thead>
                <tr>
                    <th>Имя</th>
                    <th>Логин</th>
                    <th>Email</th>
                    <th>Роль</th>
                </tr>
                </thead>
                <tbody>
                <?php  $file = file_get_contents("../../sating/Users/".$_GET['login'].".json");
                $userData = json_decode($file, TRUE);?>
                <tr>

                    <td><?php echo $userData['usersname'];?></td>
                    <td><?php echo $userData['login'];?></td>
                    <td><?php echo $userData['email'];?></td>
                    <td><?php if ($userData['role']==1):?>Пользователь<?php else: ?>Администратор<?php endif;?></td>
                </tr>
                <tr>
                    <td> <input type="text" name="usersname" class="form-control" placeholder="Введите новое Имя" autofocus> </td>
                    <td><?php echo $userData['login'];?></td>
                    <td><?php echo $userData['email'];?></td>
                    <td>
                        <p>
                            <select class="custom-select" size="3" multiple name="role">
                                <option disabled>Выберете роль</option>
                                <option value="1">Пользователь</option>
                                <option value="2">Администратор</option>
                            </select>
                        </p>
                    </td>
                </tr>

                </tbody>

            </table>
            <button value="<?php print_r($_GET['login']);?>" name="login" class="btn btn-lg btn-primary btn-block btn-secondary" type="submit">Внести изменения</button>
        </form>
    <?php else:include '../../sating/exit.php';endif; //    print_r($_POST);?>
    <footer class="mastfoot mt-auto">
        <div>
            <p>Создал по макету</p>
        </div>
    </footer>
</div>
</body>
</html>