
const buttoncadastrar = document.querySelector("#cadastrar");
const buttonsair = document.querySelector("#sair");
const buttonsair2 = document.querySelector("#sair2");
const buttonrecuperar = document.querySelector("#recuperar");

const recuperar = document.querySelector("#formulariorecuperar")
const cadastrar = document.querySelector("#formulariocadastrar");
const login = document.querySelector("#formulariologin");

const buttonteste = document.getElementById("teste");

buttonteste.addEventListener("click", function () {

    document.querySelector("input[name='emaillogin']").value = "teste@email.com";
    document.querySelector("input[name='senhalogin']").value = "senha";
    document.getElementById("formulariologin").submit();
});

buttoncadastrar.addEventListener("click", function (e) {

    login.style.display = "none";
    cadastrar.style.display = "flex";
    recuperar.style.display = "none";
})

buttonsair.addEventListener("click", function (e) {

    login.style.display = "flex";
    cadastrar.style.display = "none";
    recuperar.style.display = "none";
})

buttonsair2.addEventListener("click", function (e) {

    login.style.display = "flex";
    cadastrar.style.display = "none";
    recuperar.style.display = "none";
})

buttonrecuperar.addEventListener("click", function (e) {

    login.style.display = "none";
    cadastrar.style.display = "none";
    recuperar.style.display = "flex";
})
