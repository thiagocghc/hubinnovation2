const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");

hamburger.addEventListener("click", mobileMenu);

function mobileMenu() {
    hamburger.classList.toggle("active");
    navMenu.classList.toggle("active");
}

const navLink = document.querySelectorAll(".nav-link");

navLink.forEach(n => n.addEventListener("click", closeMenu));

function closeMenu() {
    hamburger.classList.remove("active");
    navMenu.classList.remove("active");
}


document.querySelectorAll('input[type="number"]').forEach(input =>{
input.oninput = () => {
if(input.value.length > input.maxLength) input.value = input.value.slice(0,input.maxLength);
};

});


var mail = document.getElementById('email');
mail.addEventListener('focusout', ()=>{
    var re = /\S+@\S+\.\S+/;
    if(!re.test(mail.value)){
    alert("E-mail Inválido! Digite novamente!")
    }
})

var cpf = document.getElementById('CPF');
    cpf.addEventListener('focusout', ()=>{
    if(!validaCPF(cpf.value)){
    alert("CPF Inválido! Digite novamente!")
}
})

function validaCPF(cpf = 0) 
{ 
    var soma = 0;

    soma += cpf[0] * 10 
    soma += cpf[1] * 9 
    soma += cpf[2] * 8 
    soma += cpf[3] * 7 
    soma += cpf[4] * 6 
    soma += cpf[5] * 5 
    soma += cpf[6] * 4 
    soma += cpf[7] * 3 
    soma += cpf[8] * 2 
    soma = (soma * 10) % 11 
    if (soma == 10 || soma == 11) {
        soma = 0 } 
    if (soma != cpf[9]) { 
        return false 
    } console.log('primeiro numero: ' + soma) 
    soma = 0 
    soma += cpf[0] * 11 
    soma += cpf[1] * 10 
    soma += cpf[2] * 9 
    soma += cpf[3] * 8 
    soma += cpf[4] * 7 
    soma += cpf[5] * 6 
    soma += cpf[6] * 5 
    soma += cpf[7] * 4 
    soma += cpf[8] * 3 
    soma += cpf[9] * 2 
    soma = (soma * 10) % 11 
    if (soma != cpf[10]) {
        return false 
    } console.log('segundo numero: ' + soma) 
    return true 
}


