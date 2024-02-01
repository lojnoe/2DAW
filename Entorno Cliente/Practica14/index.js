function setItem() {

    const input = document.getElementById("info");
    const nuevoElemento = input.value;

    if (nuevoElemento !== "") {
        // Obtener la lista actual desde localStorage (si existe)
        let lista = JSON.parse(localStorage.getItem("lista")) || [];
        // Agregar el nuevo elemento a la lista
        lista.push(nuevoElemento);
        // Guardar la lista actualizada en localStorage
        localStorage.setItem("lista", JSON.stringify(lista));
        // Actualizar la visualización de la lista en la página
        console.log(lista);
        // Limpiar el campo de entrada
        input.value = "";
         // Access object property
    }
}

function mostrarLista() {
    const lista = JSON.parse(localStorage.getItem("lista")) || [];
    const listaHTML = lista.map(item => `<li>${item}</li>`).join('');
    document.getElementById("contenido").innerHTML = `<ul>${listaHTML}</ul>`;
}

function deleteItem() {
    const elementoABorrar = document.getElementById("inputBorrar").value.trim();
    // Obtener la lista actual desde localStorage
    let lista = JSON.parse(localStorage.getItem("lista")) || [];

    // Buscar el elemento dentro de la lista
    const index = lista.indexOf(elementoABorrar);
    if (index !== -1) {
        // Si se encuentra el elemento, eliminarlo de la lista
        lista.splice(index, 1);

        // Actualizar el localStorage
        localStorage.setItem("lista", JSON.stringify(lista));

        // Actualizar la visualización de la lista en la página
        mostrarLista();
    } else {
        alert("El elemento especificado no se encuentra en la lista.");
    }

}
function limpiar() {

    localStorage.clear();
    console.log("borrado correctamente");

}


