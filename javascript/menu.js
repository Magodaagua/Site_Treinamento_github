document.addEventListener("DOMContentLoaded", function() {
    const setas = document.querySelectorAll('.seta');
    setas.forEach(seta => {
        seta.addEventListener('click', () => {
            console.log('Seta clicada');
            const modulo = seta.closest(".modulo"); // Encontra o elemento de módulo
            const aulas = modulo.nextElementSibling; // Encontra o próximo elemento, que deve ser o de aulas

            if (aulas && aulas.classList.contains('aulas')) {
                console.log('Elemento de aulas encontrado');
                if (aulas.style.display === 'none' || aulas.style.display === '') {
                    aulas.style.display = 'block';
                    seta.classList.add('aberta');
                } else {
                    aulas.style.display = 'none';
                    seta.classList.remove('aberta');
                }
            } else {
                console.log('Elemento de aulas não encontrado');
            }
        });
    });
});
