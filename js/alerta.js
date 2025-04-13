document.addEventListener("DOMContentLoaded", () => {
    const alerta = document.getElementById("mensagem-alerta");
    if (alerta) {
        setTimeout(() => {
            alerta.style.opacity = "0";
            setTimeout(() => alerta.remove(), 500); // fade + remoção
        }, 3000); // tempo até esconder (3s)
    }
});