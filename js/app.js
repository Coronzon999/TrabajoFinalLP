document.addEventListener('DOMContentLoaded', function () {
    const formulario = document.getElementById('formInscripcion');

    formulario.addEventListener('submit', function (event) {

        event.preventDefault();

        Swal.fire({
            title: '¿Confirmar envío?',
            text: "Verifica que todos tus datos sean correctos.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#10b981', 
            cancelButtonColor: '#64748b',
            confirmButtonText: 'Sí, enviar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                
                const formData = new FormData(formulario);

                fetch(formulario.action, {
                    method: formulario.method,
                    body: formData,
                    headers: {
                        'Accept': 'application/json'
                    }
                }).then(response => {
                    if (response.ok) {
                        Swal.fire({
                            title: '¡Enviado con éxito!',
                            text: 'Tu inscripción ha sido recibida correctamente.',
                            icon: 'success',
                            confirmButtonColor: '#10b981'
                        });
                        formulario.reset(); 
                    } else {
                        Swal.fire({
                            title: 'Error',
                            text: 'Hubo un problema al enviar la información.',
                            icon: 'error',
                            confirmButtonColor: '#ef4444'
                        });
                    }
                }).catch(error => {
                    Swal.fire({
                        title: 'Error de conexión',
                        text: 'No se pudo conectar con el servidor.',
                        icon: 'error',
                        confirmButtonColor: '#ef4444'
                    });
                });

            }
        });
    });
});