function verIncidencias() {


    fetch(`src/api/incidencias.php`)
        .then((response) => response.json())
        .then((carrito) => {
            const listaCarrito = document.getElementById("productoCarrito");
            const totalCarrito = document.getElementById("total-carrito");
            const ulSubtotal = document.getElementById("subtotal");
            const limpiar = document.getElementById("limpiar");

            listaCarrito.innerHTML = "";
            ulSubtotal.innerHTML = "";
            total = 0;


            if (Array.isArray(carrito) && carrito.length > 0) {
                carrito.forEach((item) => {
                    const li = document.createElement("li");
                    li.className = "productoCarrito";
                    // li.textContent = `${item.nombre} - Cantidad: ${item.cantidad} - $${parseFloat(item.total).toFixed(2)}`;
                    li.innerHTML = `<a href="" class="imglink"><img src="${item.imagen}" alt=""></a>
                <div style="height: 100%; padding-top: 5px;">
                    <a href="" class="carritoComprasProducto">${item.nombre} </a>
                    <p class="lllll">${item.descripcion}</p>
                    <p class="precio"> <span style="color: gray;">Precio: </span>$${parseFloat(item.precio).toFixed(2)}</p>
                    <p class="llllll">Cantidad:</p>    
                    <span class="masmenosproductos">
                        <button id="bntMenos1" onclick="modificarCantidad(${item.id}, -1)" class="limp">-</button>
                        <p class="cantidadProducto" id="cantidad"> ${item.cantidad}</p>
                        <button id="btnMas1" onclick="modificarCantidad(${item.id}, 1)" class="limp">+</button>
                    </span>
                    <button onclick="eliminarProductoDeCarrito(${item.id})" class="limp">Eliminar</button>
                </div>`;

                    const subtotal = document.createElement("li");
                    subtotal.innerHTML = `<p> ${item.nombre} </p> <p id="p1">$ ${item.total} </p>`;

                    listaCarrito.appendChild(li);
                    ulSubtotal.appendChild(subtotal);
                    total += parseFloat(item.total);
                });

                totalCarrito.textContent = `$ ${total.toFixed(2)}`;
                if(limpiar.style.display === "none"){
                limpiar.style.display = "block";
                }
            } else {
                const carritoVacio = document.createElement("li");
                carritoVacio.textContent = 'No hay productos agregados';
                listaCarrito.appendChild(carritoVacio);

                if(limpiar.style.display === "block"){
                    limpiar.style.display = "none"; 
                    carritoVacio.style.textAlign = "center";
                    carritoVacio.style.font = "19px System-Ui";
                }

            }

        })
        .catch((error) =>
            console.error("Error al obtener contenido del carrito:", error)
        );
}


/*document.getElementById('fetchData').addEventListener('click', function () {
    fetch('api.php')
        .then(response => response.json())
        .then(data => {
            const resultsDiv = document.getElementById('results');
            resultsDiv.innerHTML = '';
            data.forEach(item => {
                resultsDiv.innerHTML += <p>Nombre: ${item.nombre}, Edad: ${item.edad}, Ciudad: ${item.ciudad}</p>;
            });
        })
        .catch(error => {
            console.error('Error:', error);
        });
});*/
