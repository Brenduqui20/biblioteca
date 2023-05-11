
// const table = document.getElementById('tblDatos');
// const tableRows = table.getElementsByTagName('tr');
// const totalPages = Math.ceil(tableRows.length / 9);

// function showTablePage(page) {
//   for (let i = 1; i < tableRows.length; i++) {
//     tableRows[i].style.display = 'none';
//   }

//   const start = (page - 1) * 9;
//   const end = start + 9;
//   for (let i = start; i < end && i < tableRows.length; i++) {
//     tableRows[i].style.display = '';
//   }
// }

// function createPagination() {
//     const pagination = document.getElementById('pagination');
//     const list = document.createElement('ul');
//     list.classList.add('pagination-list');
//     pagination.appendChild(list);
//     for (let i = 1; i <= totalPages; i++) {
//       const pageButton = document.createElement('li');
//       pageButton.classList.add('pagination-item');
//       const pageLink = document.createElement('a');
//       pageLink.href = '#';
//       pageLink.innerText = i;
//       pageButton.appendChild(pageLink);
//       pageButton.addEventListener('click', () => showTablePage(i));
//       list.appendChild(pageButton);
//     }
//   }


// showTablePage(1);
// createPagination();

// const btnMostrarTodo = document.getElementById('MTS');
// btnMostrarTodo.addEventListener('click', () => {
//   showTablePage(totalPages);
// });

const table = document.getElementById('tblDatos');
const tableRows = table.getElementsByTagName('tr');
const itemsPerPage = 10;
const totalPages = Math.ceil(tableRows.length / itemsPerPage);
let showAll = false; // Bandera para indicar si se están mostrando todos los datos

function showTablePage(page) {
  if (!showAll) {
    for (let i = 0; i < tableRows.length; i++) {
      if (i >= (page - 1) * itemsPerPage && i < page * itemsPerPage) {
        tableRows[i].style.display = '';
      } else {
        tableRows[i].style.display = 'none';
      }
    }
  } else {
    for (let i = 0; i < tableRows.length; i++) {
      tableRows[i].style.display = '';
    }
  }
}

function createPagination() {
  const pagination = document.getElementById('pagination');
  const list = document.createElement('ul');
  list.classList.add('pagination-list');
  pagination.appendChild(list);
  for (let i = 1; i <= totalPages; i++) {
    const pageButton = document.createElement('li');
    pageButton.classList.add('pagination-item');
    const pageLink = document.createElement('a');
    pageLink.href = '#';
    pageLink.innerText = i;
    pageButton.appendChild(pageLink);
    pageButton.addEventListener('click', () => showTablePage(i));
    list.appendChild(pageButton);
  }

  // Crear botón "Mostrar Todo"
  const btnMostrarTodo = document.createElement('li');
  btnMostrarTodo.classList.add('pagination-item');
  const btnLink = document.createElement('a');
  btnLink.href = '#';
  btnLink.innerText = 'Mostrar Todo';
  btnMostrarTodo.appendChild(btnLink);
  btnMostrarTodo.addEventListener('click', () => {
    showAll = !showAll;
    if (showAll) {
      btnLink.innerText = 'Volver a Paginación';
      showTablePage(1);
    } else {
      btnLink.innerText = 'Mostrar Todo';
      showTablePage(1);
    }
  });
  list.appendChild(btnMostrarTodo);
}

showTablePage(1);
createPagination();



function MModal(valor, archivo) {
  document.getElementById("modal").style.display = "block";
  document.getElementById("mensaje").textContent = 'DESEA ELIMINAR EL REGISTRO SELECIONADO CON IDENTIFICADOR:  ' + valor;

  document.getElementById("modal_form").action = archivo;


  const form = document.getElementById('modal_form');
  const input = document.createElement('input');
  input.setAttribute('type', 'hidden');
  input.setAttribute('name', 'id');
  input.setAttribute('value', valor);
  form.appendChild(input);

}



function ocultarModal() {
  document.getElementById("modal").style.display = "none";
}

function editarUsuario(claveUsu) {
  //var matri=document.getElementById("matricula")
  //matri.value=matricula
  document.getElementById('formularioUsu').style.display = "inline-block";
  document.getElementById('BAN').style.display = "none";
  var celdas = document.getElementById(claveUsu).getElementsByTagName("td");
  document.getElementById("claveUsu").value = celdas[1].innerHTML
  document.getElementById("claveUsuOld").value = celdas[1].innerHTML
  document.getElementById("nombre").value = celdas[2].innerHTML
  document.getElementById("paterno").value = celdas[3].innerHTML
  document.getElementById("materno").value = celdas[4].innerHTML
  document.getElementById("colonia").value = celdas[5].innerHTML
  document.getElementById("calle").value = celdas[6].innerHTML
  document.getElementById("numero").value = celdas[7].innerHTML
  document.getElementById("telefono").value = celdas[8].innerHTML
  document.getElementById("btAgregar").style.display = "none"
  document.getElementById("btModificar").style.display = "inline-block"

}

function editarLibros(ISBN) {
  document.getElementById('formularioLi').style.display = "inline-block";
  document.getElementById('BAN').style.display = "none";
  var celdas = document.getElementById(ISBN).getElementsByTagName("td");
  document.getElementById("ISBN").value = ISBN
  document.getElementById("ISBNOld").value = ISBN
  document.getElementById("Titulo").value = celdas[2].innerHTML
  document.getElementById("editorial_Id").value = celdas[3].innerHTML
  var selectedOptionIndex = document.getElementById("editorial_Id").selectedIndex;
  document.getElementById("editorial_Id").options[selectedOptionIndex].selected = true;


  var autorString = celdas[5].innerHTML;
  var autorArray = autorString.split("-");

  var autoresNameString = celdas[6].innerHTML;
  var autoresNameArray = autoresNameString.split(",");

  var autoresContainer = document.getElementById("autoresagregados");
  autoresContainer.innerHTML = "";

  for (var i = 0; i < autorArray.length; i++) {
    var autor_id = autorArray[i].trim();
    var autor_name = autoresNameArray[i].trim();
    if (autor_id.length > 0) {
      const inputContainer = document.createElement('div');

      const input2 = document.createElement('input');
      input2.setAttribute('type', 'text');
      input2.setAttribute('class', 'cuadrito');
      input2.setAttribute('value', autor_name);
      input2.setAttribute('disabled', '');

      const input = document.createElement('input');
      input.setAttribute('type', 'hidden');
      input.setAttribute('name', 'autores[]');
      input.setAttribute('value', autor_id);
      input.setAttribute('placeholder', '');


      const br = document.createElement('br');
      const br2 = document.createElement('br');


      const removeButton = document.createElement('button');
      removeButton.innerHTML = '<i class="fas fa-solid fa-trash"></i>';
      removeButton.setAttribute('class', 'eliminar');
      removeButton.setAttribute('style', 'margin-left: 6px;');

      removeButton.addEventListener('click', () => {
        inputContainer.removeChild(input2);
        inputContainer.removeChild(input);
        inputContainer.removeChild(removeButton);
        inputContainer.removeChild(br);
        inputContainer.removeChild(br2);


      });
      inputContainer.appendChild(input2);
      inputContainer.appendChild(input);
      inputContainer.appendChild(removeButton);
      inputContainer.appendChild(br);
      inputContainer.appendChild(br2);
      selectAutor.before(inputContainer);
      autoresContainer.appendChild(inputContainer);
    }

  }

  document.getElementById("btAgregar").style.display = "none"
  document.getElementById("btModificar").style.display = "inline-block"
}


function editarAutores(Id) {
  document.getElementById('formularioAut').style.display = "inline-block";
  document.getElementById('BAN').style.display = "none";
  var celdas = document.getElementById(Id).getElementsByTagName("td");
  document.getElementById("Id").value = celdas[0].innerHTML
  document.getElementById("IdOld").value = celdas[0].innerHTML
  document.getElementById("Nombre").value = celdas[1].innerHTML
  document.getElementById("Paterno").value = celdas[2].innerHTML
  document.getElementById("Materno").value = celdas[3].innerHTML

  document.getElementById("btAgregar").style.display = "none"
  document.getElementById("btModificar").style.display = "inline-block"

}

function editarEditoriales(Id) {
  document.getElementById('formularioEdit').style.display = "inline-block";
  document.getElementById('BAN').style.display = "none";
  var celdas = document.getElementById(Id).getElementsByTagName("td");
  document.getElementById("Id").value = celdas[0].innerHTML
  document.getElementById("IdOld").value = celdas[0].innerHTML
  document.getElementById("Nombre").value = celdas[1].innerHTML

  document.getElementById("btAgregar").style.display = "none"
  document.getElementById("btModificar").style.display = "inline-block"

}

function editarLA(ISBN) {

  var celdas = document.getElementById(ISBN).getElementsByTagName("td");
  document.getElementById("ISBN").value = celdas[0].innerHTML
  document.getElementById("ISBNOld").value = celdas[0].innerHTML
  document.getElementById("autor_Id").value = celdas[1].innerHTML

  document.getElementById("btAgregar").style.display = "none"
  document.getElementById("btModificar").style.display = "inline-block"

}

function editarPrestamos(id) {
  document.getElementById('formularioPrestamos').style.display = "inline-block";
  document.getElementById('BAN').style.display = "none";
  document.getElementById("btAgregarP").style.display = "none";
  document.getElementById("btModificarP").style.display = "inline-block";
  var celdas = document.getElementById(id).getElementsByTagName("td");
  document.getElementById("Salida").value = celdas[4].innerHTML;
  document.getElementById("SalidaOld").value = celdas[4].innerHTML;
  document.getElementById("Devolucion").value = celdas[5].innerHTML;
  document.getElementById("ISBN").value = celdas[0].innerHTML;
  document.getElementById("ClaveUsu").value = celdas[2].innerHTML;
  document.getElementById("ClaveUsu").options[celdas[2].innerHTML].selected = true;

}

function MostrarFormUs(valor) {
  document.getElementById('formularioUsu').style.display = "inline-block";
  document.getElementById('BAN').style.display = "none";

}
function CanFormUs(valor) {
  document.getElementById('formularioUsu').style.display = "none";
  document.getElementById('BAN').style.display = "inline-block";
}

function MostrarFormA(valor) {
  document.getElementById('formularioAut').style.display = "inline-block";
  document.getElementById('BAN').style.display = "none";

}
function CanFormA(valor) {
  document.getElementById('formularioAut').style.display = "none";
  document.getElementById('BAN').style.display = "inline-block";
}
function MostrarFormEd(valor) {
  document.getElementById('formularioEdit').style.display = "inline-block";
  document.getElementById('BAN').style.display = "none";

}
function CanFormEd(valor) {
  document.getElementById('formularioEdit').style.display = "none";
  document.getElementById('BAN').style.display = "inline-block";
}
function MostrarFormLB(valor) {
  document.getElementById('formularioLi').style.display = "inline-block";
  document.getElementById('BAN').style.display = "none";

}
function CanFormLB(valor) {
  document.getElementById('formularioLi').style.display = "none";
  document.getElementById('BAN').style.display = "inline-block";
}
function MostrarFormPM(valor) {
  document.getElementById('formularioPrestamos').style.display = "inline-block";
  document.getElementById('BAN').style.display = "none";

}
function CanFormPM(valor4) {
  document.getElementById('formularioPrestamos').style.display = "none";
  document.getElementById('BAN').style.display = "inline-block";
}

// Obtener el elemento select
const selectElement = document.getElementById('editorial_Id');

// Obtener los options del select en un arreglo
const options = Array.from(selectElement.options);

// Ordenar los options alfabéticamente
options.sort((a, b) => {
  if (a.text < b.text) {
    return -1;
  }
  if (a.text > b.text) {
    return 1;
  }
  return 0;
});

// Limpiar el select
selectElement.innerHTML = '';

// Agregar los options ordenados al select
for (const option of options) {
  selectElement.add(option);
}



function preguntar(ClaveUsu) {
  var mensaje = "al basquet";
  var r = confirm(`Quieres eliminar al registro con matricula ${mensaje}`);
  if (r == true) {

  }
  else {

  }
}

