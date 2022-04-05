const editarBtn = document.querySelectorAll('.editar');

document.body.addEventListener('keypress', (e) => {
  if (e.key === 'Enter') {
    e.preventDefault();
  }
});

editarBtn.forEach(btn => {
  btn.addEventListener('click', (e) => {
    e.preventDefault();
    const {id} = e.target;
    const balance = document.querySelector(`#balance-${id}`);
    const input = document.createElement('input');
    input.setAttribute('value', balance.innerText);
    input.setAttribute('submit', '');
    balance.innerHTML = '';
    balance.appendChild(input);
    e.target.innerHTML = '';
    const salvar = document.createElement('a');
    salvar.innerText = 'Salvar';
    e.target.appendChild(salvar);
    salvar.addEventListener('click', (e) => {
      e.stopPropagation();
      e.target.setAttribute('href', `/salvar.php/?id=${id}&value=${input.value}`)
    })
  });
});