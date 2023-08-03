// Animación de fade-in para las secciones principales
document.addEventListener('DOMContentLoaded', function () {
    const sections = document.querySelectorAll('main section');

    sections.forEach((section) => {
        section.classList.add('fade-in');
    });
});

// Mostrar el mensaje de éxito después de enviar el formulario
window.addEventListener('DOMContentLoaded', function () {
    const successMessage = document.getElementById('success-message');

    // Verificar si el mensaje de éxito está presente en la página
    if (successMessage) {
        successMessage.style.display = 'block';

        // Ocultar el mensaje de éxito después de unos segundos
        setTimeout(function () {
            successMessage.style.display = 'none';
        }, 5000); // El mensaje se ocultará después de 5 segundos (5000 milisegundos)
    }
});

