document.addEventListener("DOMContentLoaded", function () {
    console.log("JavaScript cargado correctamente!");

    // Ejemplo de alerta al seleccionar alojamiento
    let links = document.querySelectorAll(".alojamiento a");
    links.forEach(link => {
        link.addEventListener("click", function (event) {
            event.preventDefault();
            let confirmacion = confirm("¿Deseas agregar este alojamiento a tu cuenta?");
            if (confirmacion) {
                window.location.href = this.href;
            }
        });
    });
});
