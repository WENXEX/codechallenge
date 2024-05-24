<header>
        <h1 class="Mono-titulos">WorkFlow</h1>
        <div >
            <?php 
                if (!isset($_SESSION['nombre'])) {
                    echo "<a href='' class='RFlex'>Iniciar sesion</a>";
                } else {
                    echo "<a href='' class='RFlex gap20'> Administrar</a>";
                    echo "<a href='' class='RFlex'>Cerrar sesión</a>";
                }
            ?>            
        </div>
    </header> 