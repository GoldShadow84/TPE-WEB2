"use strict";

const url = 'https://62b47dc2530b26da4cbfd392.mockapi.io/api/joyas';

document.querySelector("#btn-agregar").addEventListener("click", agregar);
document.querySelector("#btn-agregarx3").addEventListener("click", agregartres);
//document.querySelector("#editar-fila").addEventListener("click", editarFila);
//document.querySelector("#borrarultimo").addEventListener("click", borrarUltimo);


mostrar();

async function mostrar() {

    try {
        let fila = document.querySelector("#tabla_dinamica");
        fila.innerHTML = "";
        let res = await fetch(url);
        if (res.ok) {
            let json = await res.json();


            for (let joyas of json) {

                let content = document.querySelector("#tabla_dinamica");
                let fila = document.createElement("tr");
                let tipos = document.createElement("td");
                tipos.innerHTML = joyas.tipos;
                tipos.classList.add("tipos");
                let descripcion = document.createElement("td");
                descripcion.innerHTML = joyas.descripcion;
                descripcion.classList.add("descripcion");
                let antiguedad = document.createElement("td");
                antiguedad.innerHTML = joyas.antiguedad;
                let clasificacion = document.createElement("td");
                clasificacion.innerHTML = joyas.clasificacion;
                let editar = document.createElement("button");
                editar.innerHTML = "Editar";
                editar.classList.add = "editar";
                let borrar = document.createElement("button");
                borrar.innerHTML = "Borrar";
                borrar.classList.add = "borrar";
                content.appendChild(fila);
                fila.appendChild(tipos);
                fila.appendChild(descripcion);
                fila.appendChild(antiguedad);
                fila.appendChild(clasificacion);
                fila.appendChild(editar);
                fila.appendChild(borrar);


                borrar.addEventListener("click", function () { borrarFila(joyas.id) });
                editar.addEventListener("click", function () { editarFila(joyas.id) });


            }
        }
        else {
            fila.innerHTML = "<p>Url Fallida</p>";
        }

    }
    catch (error) {
        console.log(error);

    }

}




async function borrarFila(id) {

    try {

        let res = await fetch(`${url}/${id}`, { "method": "DELETE" });

        if (res.status === 200) {
            document.querySelector("#msg").innerHTML = "Fue eliminado con exito.";
            mostrar();
        }

    } catch (error) {
        console.log(error);
    }

}

async function editarFila(id) {

    let piezaJoyeriaTipos = document.querySelector("#tipos").value;
    let piezaJoyeriaDescripcion = document.querySelector("#descripcion").value;
    let piezaJoyeriaAntiguedad = document.querySelector("#antiguedad").value;
    let piezaJoyeriaClasificacion = document.querySelector("#clasificacion").value;

    let ingresoNuevo = {
        tipos: piezaJoyeriaTipos,
        descripcion: piezaJoyeriaDescripcion,
        antiguedad: piezaJoyeriaAntiguedad,
        clasificacion: piezaJoyeriaClasificacion,
    }

    try {

        let res = await fetch(`${url}/${id}`, {
            "method": "PUT",
            "headers": { "Content-type": "application/json" },
            "body": JSON.stringify(ingresoNuevo)
        });

        if (res.status === 200) {
            document.querySelector("#msg").innerHTML = "Fue modificado con exito.";
            mostrar();
        }

    } catch (error) {
        console.log(error);
    }

}

async function agregar() {

    let piezaJoyeriaTipos = document.querySelector("#tipos").value;
    let piezaJoyeriaDescripcion = document.querySelector("#descripcion").value;
    let piezaJoyeriaAntiguedad = document.querySelector("#antiguedad").value;
    let piezaJoyeriaClasificacion = document.querySelector("#clasificacion").value;

    let ingresoNuevo = {
        tipos: piezaJoyeriaTipos,
        descripcion: piezaJoyeriaDescripcion,
        antiguedad: piezaJoyeriaAntiguedad,
        clasificacion: piezaJoyeriaClasificacion,
    }

    try {

        let res = await fetch(url, {
            "method": "POST",
            "headers": { "Content-type": "application/json" },
            "body": JSON.stringify(ingresoNuevo)
        });


        if (res.status === 201) {
            document.querySelector("#msg").innerHTML = "Creado!";
            mostrar();
        }

    } catch (error) {
        console.log(error);
    }

}

async function agregartres() {

    let piezaJoyeriaTipos = document.querySelector("#tipos").value;
    let piezaJoyeriaDescripcion = document.querySelector("#descripcion").value;
    let piezaJoyeriaAntiguedad = document.querySelector("#antiguedad").value;
    let piezaJoyeriaClasificacion = document.querySelector("#clasificacion").value;

    let ingresoNuevo = {
        tipos: piezaJoyeriaTipos,
        descripcion: piezaJoyeriaDescripcion,
        antiguedad: piezaJoyeriaAntiguedad,
        clasificacion: piezaJoyeriaClasificacion,
    }

    try {

        for (let index = 0; index < 3; index++) {

            let res = await fetch(url, {
                "method": "POST",
                "headers": { "Content-type": "application/json" },
                "body": JSON.stringify(ingresoNuevo)
            });

            if (res.status === 201) {
                document.querySelector("#msg").innerHTML = "Creados!";
                mostrar();
            }
        }

    } catch (error) {
        console.log(error);
    }

}


