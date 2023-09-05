const tbody = document.querySelector(".listar-cursos");

const listarCursos = async (pagina) => {
    const dados = await fetch("./listacurso.php?pagina=" + pagina);
    const resposta = await dados.text();
    tbody.innerHTML = resposta;
}

listarCursos(1);