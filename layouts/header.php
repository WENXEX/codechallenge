<header>
        <h1 class="Mono-titulos">WorkFlow</h1>
        <div >
            <?php 
                if (!isset($_SESSION['Nombre'])) {
                    echo "<a href='src/php/Administrar.php' class='RFlex gap20'> Administrar</a>";
                    echo "<a href='layouts/cerrarsesion.php' class='RFlex'>Cerrar sesión</a>";
                    
                } else {
                    echo "<a href='login.php' class='RFlex'>Iniciar sesion</a>";
                }
            ?>            
        </div>
</header> 