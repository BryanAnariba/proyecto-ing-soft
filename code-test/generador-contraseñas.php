<?php
    $tamanio = 10;
    function generar_passwords($tamanio) {

        // Conjunto de caracteres a usar para generar el key
        $charset = "abcdefghijklmnopqrstuvwxyzABCDEFJHIJKLMNOPQRSTUVWXYZ1234567890@$";
        $claveGenerada = "";
        for ($i=0;$i<$tamanio;$i++){
            $aleatorio = rand() % strlen($charset);

            //va añadiendo un caracter aleatorio por cada iteracion
            $claveGenerada .= substr($charset,$aleatorio,1);
        }
        return $claveGenerada;
    }
    $var = generar_passwords($tamanio);
    echo $var;

    echo password_hash($var , PASSWORD_DEFAULT)."\n";

    // clave -> HS4tYjrqq5
    // correo -> test2@gmail.com

    // clasve -> test10@gmail.com
    // correo -> MYF9aHvKFW

?>