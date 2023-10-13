<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Donate</title>
        <!--coloca o icone na aba da tela-->
        <link rel="icon" type="png" href="../img/logo_copi.png">
    </head>
    <body>
        <form align="center">
            <img src="logo/pixlogo.jpg" width="30%" height="30%">
            <br>
            <?php

            // Usar o use para carregar classe através do Composer
            use chillerlan\QRCode\{QRCode, QROptions};

            // Incluir Composer
            include_once('./vendor/autoload.php');

            // Criar a variável com a URL para o QRCode
            $data = 'teste';

            // Imprimir o título
            echo "<h2>Gerar QRCode do Pix: $data</h2>";

            // Instanciar a classe para enviar os parâmetros para o QRCode
            $options = new QROptions([
                // Número da versão do código QRCode
                'version'      => 7,
                // Tipo de saída, utilizado SVG
                'outputType'   => QRCode::OUTPUT_MARKUP_SVG,
                // Alterar para base64
                'imageBase64'  => false,
                // Tamanho do QRCode
                'svgViewBoxSize' => 200,
            ]);

            // Gerar QRCode: instanciar a classe QRCode e enviar os dados para o render gerar o QRCode
            $qrcode = (new QRCode($options))->render($data);
            //var_dump($qrcode);

            // Imprimir o QRCode
            echo $qrcode;
            ?>
        </form>
    </body>
</html>

