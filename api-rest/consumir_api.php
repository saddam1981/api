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

    // Consumir API sin ASSOC
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
    // Consumir API con ASSOC para usar los datos como array asociativo
        $clientes_data = json_decode($result, true);

        foreach ($clientes_data as $message)
        {
            echo $message['nombre'];
            echo '<br>';
            echo $message['apellido'];
            echo '<br>';
            echo $message['email'];
            echo '<br>';
            echo $message['cuit'];
            echo '<br>';
            echo '<hr>';
        }
    ?>
<form action="resultados.php"method="DELETE">
        <input type="text" name="id" id="id" placeholder="Ingrese el id del cliente a eliminar">
        <input type="submit" value="Eliminar">
    </form>
</body>
</html>