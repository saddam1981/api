<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    // Iniciar sesion de cURL
        $ch = curl_init();
        $url = 'http://api.test/api/api-rest/resultados.php';
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); 
        $result = curl_exec($ch);
        if(curl_errno($ch)){
            $errormsg = curl_error($ch);
            echo "Error en la ejecucion: $errormsg";
        }else{
            // Cerramos sesion de cURL
            curl_close($ch);
        }

        $clientes_data = json_decode($result);

        foreach ($clientes_data as $message)
        {
            echo $message->nombre;
            echo '<br>';
            echo $message->apellido;
            echo '<br>';
            echo $message->email;
            echo '<br>';
            echo $message->cuit;
            echo '<br>';
            echo '<hr>';
        }
        
    ?>
</body>
</html>