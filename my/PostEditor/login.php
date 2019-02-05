<html>
    <?php require('head.php'); ?>
    <head>
        <title>Login</title>
        <style>
            body{
                margin: 0;
                padding: 0;
                background: #000000;
                color: #ffffff;
                font-family: Arial;
            }
            input[type="text"]{
                background-color: #404552;
                border-radius: 5px;
                border: none;
                padding: 8px;
            }
        </style>
        <link rel="stylesheet" type="text/css" href="responsive_flex.css">
    </head>
    <body>
        <?php require('header.php'); ?>
        <div class="col-12 center">
            <h1>Login</h1>
        </div>
        <table class="col-12 center centerText">
            <form action="login_proc.php" method="post">
                <tr>
                    <th>Usuário</th>
                    <td><input type="text" name="user"></td>
                </tr>
                <tr>
                    <th>Senha</th>
                    <td><input type="password" name="pass"/></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Entrar"/></td>
                </tr>
            </form>
        </table>
    </body>
</html>
<?php
?>
