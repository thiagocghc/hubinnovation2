const dataFinal = new Date("2023-06-21T19:00:00").getTime();
const interval = setInterval(() => {
    const dataAtual = new Date().getTime();
    const diferenca = dataFinal - dataAtual;
    const dias = Math.floor(diferenca / (1000 * 60 * 60 * 24));
    const horas = Math.floor((diferenca % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutos = Math.floor((diferenca % (1000 * 60 * 60)) / (1000 * 60));
    // const segundos = Math.floor((diferenca % (1000 * 60)) / 1000);

    document.getElementById("days").innerText = dias.toString().padStart(2, "0");
    document.getElementById("hours").innerText = horas.toString().padStart(2, "0");
    document.getElementById("minutes").innerText = minutos.toString().padStart(2, "0");
    // document.getElementById("seconds").innerText = segundos.toString().padStart(2, "0");
     
    if (diferenca < 0) {
        clearInterval(interval);
    }
}, 1000);