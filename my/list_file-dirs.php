<html>
    <head>
        <style>
            * {
                box-sizing: border-box;
            }
            body{
                display: flex;
                flex-wrap:wrap;
                justify-content:center;
                align-content:stretch;
                background-color: #000;
                font-family:Arial;
                color:#fff;
                margin: 0;
                padding: 0;
            }
            a{
                text-decoration:none;
                color:#0B486B;
            }a:active{
                color:#ffffff;
            }
            table {
                /* width:100%; */
                color:#000;
            }
            table a:visited{
                color: #02253A;
            }table a:active{
                color:#ffffff;
            }
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }
            th, td {
                padding: 5px;
                text-align: left;
                text-align: center;
            }
            table#t01 tr:nth-child(even) {
                background-color: #D0ECD0;
            }
            table#t01 tr:nth-child(odd) {
               background-color:#A9D9C1;
            }
            table#t01 th {
                background-color: black;
                color: white;
            }
            center{
                width: 100%;
            }
        </style>
    </head>
    <body>
        <center style="display: flex;flex-wrap:wrap;justify-content:center;align-content: flex-start;">
            <h2 style="display:inline-block;width:30%;margin:0;"><a href="..">Voltar</a></h2>
            <h1 style="display:inline-block;width:40%;margin:0;">Arquivos e Pastas</h1>
            <h2 style="display:inline-block;width:30%;margin:0;"><a href=".">Recarregar</a></h2>
        </center>
        <center>
            <table id="t01">
                <tr>
                    <th>Nome</th>
                    <th>Tamanho</th>
                    <th>Modificação</th>
                </tr>
<?php
        // Note que !== não existia antes do PHP 4.0.0-RC2
        if ($handle = opendir('.')) {
            /* Esta é a forma correta de varrer o diretório */
            while (false !== ($file = readdir($handle))) {
                if ($file != "." && $file != ".." && is_dir('.'.'/'.$file)){
                    echo '                  <tr><td><a href="'.$file.'/">'.$file.'/</a></td><td>Pasta</td><td>'.date("d/m/Y H:i",filemtime($file)).'</td></tr>'."\n";
                }
            }
            closedir($handle);
        }
        if ($handle = opendir('.')) {
            /* Esta é a forma correta de varrer o diretório */
            while (false !== ($file = readdir($handle))) {
                if (is_file('.'.'/'.$file) && $file != ".ftpquota"){
                    echo '                <tr><td><a href="'.$file.'">'.$file.'</a></td><td>'.round((filesize($file)/1024),2).' MB</td><td>'.date("d/m/Y H:i",filemtime($file)).'</td></tr>'."\n";
                }
            }
            closedir($handle);
        }
?>
            </table>
        </center>
        <center>
            <p style="text-align:center;">by <a href="mailto:Jumper.luko@gmail.com">Jumper.luko</a></p>
        </center>
    </body>
</html>
