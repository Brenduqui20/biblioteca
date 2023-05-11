const selectAutor = document.getElementById('autor');
const inputContainer = document.createElement('div');

selectAutor.addEventListener('change', (event) => {
    const selectedOption = event.target.options[event.target.selectedIndex].text;
    const valueO = event.target.value;

    if (selectedOption) {
        const input2 = document.createElement('input');
        input2.setAttribute('type', 'text');
        input2.setAttribute('value', selectedOption);
        input2.setAttribute('class','cuadrito');
        input2.setAttribute('disabled', '');
        
        const input = document.createElement('input');
        input.setAttribute('type', 'hidden');
        input.setAttribute('name', 'autores[]');
        input.setAttribute('value', valueO);
        input.setAttribute('placeholder', selectedOption);


        const br = document.createElement('br');

        const removeButton = document.createElement('button');
        removeButton.innerHTML = '<i class="fas fa-solid fa-trash"></i>';
        removeButton.setAttribute('class', 'eliminar');
        removeButton.setAttribute('style', 'margin-left: 6px;');

        removeButton.addEventListener('click', () => {
            inputContainer.removeChild(input2);
            inputContainer.removeChild(input);
            inputContainer.removeChild(removeButton);
            inputContainer.removeChild(br);
        });

        inputContainer.appendChild(input2);
        inputContainer.appendChild(input);
        inputContainer.appendChild(removeButton);
        inputContainer.appendChild(br);
        selectAutor.before(inputContainer);
    }
});


