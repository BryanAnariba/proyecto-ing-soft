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
    // password: foEN2IVTHh
    // hash: $2y$10$wyWmJ5.H.Oeacixp45vbJeguQv3Zk4qaYhlSDahm2Z.pgaZGnCWGS


    // gmail -> mariafernanda@gmail.com
    // pass -> ASD456

    // test6@gmail.com 
    //C1aquQBQd5

    // test12@gmail.com
    // ToyTaBVB9h

    // anael@gmail.com 
    // fm$FMPYhAi

    // morningstar@gmail.com 
    // NSdCM53Y2D


?>