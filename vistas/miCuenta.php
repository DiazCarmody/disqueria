<?php
require_once('./logica/main.php');
$con=conectar();
$id=$_SESSION['id'];
$user=$con->prepare("SELECT * FROM usuarios WHERE usuario_id=:id");
$array=[
    ":id"=>$id
];
if($user->rowCount()>0){
    $user=$user->fetch();
    $con=null;
}
$con2=conectar();
$carrito=$con2->prepare("");
?>
    <main class="intro">
        <div class="contenedor intro-content">
            <h1 class="titulo_sesion">Mi Cuenta</h1>
            <section class="account-details">
                <h2>Detalles de la Cuenta</h2>
                <p>Nombre: Juan Pérez</p>
                <p>Email: juan.perez@example.com</p>
                <!-- Más detalles de la cuenta -->
            </section>

            <section class="shopping-cart">
                <h2>Carrito de Compras</h2>
                <ul class="cart-items">
                    <li class="cart-item">
                        <p>Producto 1 - $10.00</p>
                        <button class="remove-item">Eliminar</button>
                    </li>
                    <li class="cart-item">
                        <p>Producto 2 - $15.00</p>
                        <button class="remove-item">Eliminar</button>
                    </li>
                    <!-- Más productos en el carrito -->
                </ul>
                <p>Total: $25.00</p>
                <button class="checkout-button">Proceder al Pago</button>
            </section>
        </div>
    </main>