<?php

if ( session_id() == '' || !isset( $_SESSION ) ) {
    session_start();
}
if ( $_SESSION[ 'tipo' ] != 'admin' ) {
    header( 'location:index.php' );
}
include 'config.php';

$_SESSION[ 'products_id' ] = array();
$_SESSION[ 'products_id' ] = $_REQUEST[ 'quantity' ];

$result = $mysqli->query( 'SELECT * FROM productos ORDER BY id asc' );
$i = 0;
$x = 1;

if ( $result ) {
    while ( $obj = $result->fetch_object() ) {
        if ( empty( $_SESSION[ 'products_id' ][ $i ] ) ) {
            $i++;
            $x++;
        } else {
            $cantidad_actual = $obj->cantidad;
            $cantidad_ingresada = $_SESSION[ 'products_id' ][ $i ];
            $nueva_cantidad = $cantidad_actual + $cantidad_ingresada;

            if ( $nueva_cantidad < 0 )
            $nueva_cantidad = 0;

            $update = $mysqli->query( 'UPDATE productos SET cantidad =' . $nueva_cantidad . ' WHERE id =' . $x );

            if ( $update )
            echo 'Data Updated';

            $i++;
            $x++;
        }
    }
}

header( 'location:products.php' );

?>