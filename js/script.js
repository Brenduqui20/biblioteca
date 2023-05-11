function MPrestamo(ISBN, CLAVEUSU, SALIDA, DEVOLUCION, archivo) {
    document.getElementById("modal").style.display = "block";
    document.getElementById("mensaje").textContent = "DESEA ELIMINAR EL PRESTAMO QUE SELECIONO"; 
  
    document.getElementById("modal_form").action = archivo;
  
    const form = document.getElementById('modal_form');
    const input = document.createElement('input');
    input.setAttribute('type', 'hidden');
    input.setAttribute('name', 'ISBN');
    input.setAttribute('value', ISBN);
    form.appendChild(input);
  
    const input2 = document.createElement('input');
    input2.setAttribute('type', 'hidden');
    input2.setAttribute('name', 'CLAVEUSU');
    input2.setAttribute('value', CLAVEUSU);
    form.appendChild(input2);
  
    const input3 = document.createElement('input');
    input3.setAttribute('type', 'hidden');
    input3.setAttribute('name', 'SALIDA');
    input3.setAttribute('value', SALIDA);
    form.appendChild(input3);
  
    const input4 = document.createElement('input');
    input4.setAttribute('type', 'hidden');
    input4.setAttribute('name', 'DEVOLUCION');
    input4.setAttribute('value', DEVOLUCION);
    form.appendChild(input4);
}


function buscar() {
    var datoBuscar = document.getElementById("tfBuscar").value.toLowerCase();
    var tblDatos = document.getElementById("tblDatos");

    for (let i = 1; i < tblDatos.rows.length; i++) {
        var celdas = tblDatos.rows[i].getElementsByTagName("td");



        var encontrado = false;

        for (let j = 0; j < celdas.length && !encontrado; j++) {
            var valorCelda = celdas[j].innerHTML.toLowerCase();

            if (datoBuscar.length== 0 || valorCelda.indexOf(datoBuscar) > -1) {

                encontrado = true;

            }
        }
        if (encontrado) {
            tblDatos.rows[i].style.display="";
        }else{
            tblDatos.rows[i].style.display="none";
        }

    }
}


