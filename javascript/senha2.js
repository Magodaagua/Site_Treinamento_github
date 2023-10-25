/*const password = document.getElementById('login_Senha');
const icon = document.getElementById('icon');

function showHide(){
    if(password.type === 'password'){
        password.setAttribute('type', 'text');
        icon.classList.add('hide');
    }
    else{
        password.setAttribute('type', 'password');
        icon.classList.remove('hide');
    }
}*/

function mostrarSenha(){
    var inputPass = document.getElementById('login_Senha');
    var btnShowPass = document.getElementById('btn-senha');

    if(inputPass.type === 'password'){
        inputPass.setAttribute('type', 'text');
        btnShowPass.classList.replace('bi-eye-fill', 'bi-eye-slash-fill');
    }else{
        inputPass.setAttribute('type', 'password');
        btnShowPass.classList.replace('bi-eye-slash-fill', 'bi-eye-fill');
    }
}