const registerButton = document.getElementById("register")
const loginButton = document.getElementById("login")
const container = document.getElementById("container")

registerButton.addEventListener("click", () => {
    container.classList.add("right-panel-active")
})

loginButton.addEventListener("click", () => {
    container.classList.remove("right-panel-active")
})

function mudarPagina() {
    setTimeout(function() {
        window.location.href = "home.html"; // Mude "pagina2.html" para o caminho da sua próxima página
    }, 500); // 1000 milissegundos = 1 segundo
}