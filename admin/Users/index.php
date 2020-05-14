<?php session_start();
//print_r($_SESSION);?>
<html lang="ru">
<head>
    <meta charset="utf-8">

    <title>Пользователи</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Favicons -->
    <link href="cover.css" rel="stylesheet">
</head>

<body class="text-center">
<main role="main" class="rinner cove">
    <?php
    $dir = "../../sating/Users/";
    $dh  = opendir($dir);
    $i=1;
    while (false !== ($filename = readdir($dh))) {
        if (($filename=='.')||($filename=='..')); else{
            $adres=$dir.$filename;
            $file = file_get_contents($adres);
            $userData = json_decode($file, TRUE);
            $usersname[$i]=$userData['usersname'];
            $login[$i]=$userData['login'];
            $data[$i]=$userData['data'];
            $adres_users[$i]=$adres;
            $role[$i]=$userData['role'];
            $i++;}
        }
    ?>
</main>
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
        <table class="table text-center table-light">
            <thead>
            <tr>
                <th>Имя</th>
                <th>Логин</th>
                <th>Дата регистрации</th>
                <th>Статус</th>
                <th>Изменить данные</th>
            </tr>
            </thead>
            <tbody>
            <?php  $j=0; while ($j<$i-1): {$j++;?>

            <tr>
                <td><?php echo $usersname[$j];?></td>
                <td><?php echo $login[$j];?></td>
                <td><?php echo $data[$j];?></td>
                <td><?php if ($role[$j]==1):?>Пользователь<?php else: ?>Администратор<?php endif;?></td>
                <td>
                    <form action="../redactor/index.php" method="post"  name="role">
                        <?php // $_SESSION['adres_users']=$adres_users[$j];?>
                        <p value="<?php $adres_users[$j];?>"><button  class="btn btn-secondary" type="submit">Редактирование</button></p>
                    </form></td>
            </tr>
            <?php }endwhile;?>
            </tbody>
        </table>
        <?php else:
        include '../../sating/exit.php';
    endif;
    print_r( $adres_users);?>
    <footer class="mastfoot mt-auto">
        <div>
            <p>Создал по макету</p>
        </div>
    </footer>
</div>
</body>
</html>