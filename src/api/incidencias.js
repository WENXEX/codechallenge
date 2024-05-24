document.getElementById('Incidencia').addEventListener('submit', function(event) {
    event.preventDefault();

    const form = document.getElementsByClassName('enviar-incidencia');
    const formData = new FormData(form);

    fetch('src/php/RegistrarIncidencia.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            alert('Incidencia registrada exitosamente');
        } else {
            alert('Error al registrar la incidencia');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error al registrar la incidencia');
    });
});