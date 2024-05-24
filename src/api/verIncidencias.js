function verIncidencias() {

    fetch(`scr/php/incidencias.php`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

document.getElementById('fetchData').addEventListener('click', function () {
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
});
