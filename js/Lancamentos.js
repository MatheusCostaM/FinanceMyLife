export class Lancamentos {
    constructor() {
        this.lancamentos = [];
        this.gastos = [];
        this.renda = [];
        this.investimento = [];
        this.lazer = [];
        this.financiamento = [];
        this.contador = 1;
        this.tipo = "?";
    }

    async PegaLancamentos() {

        let lancamentos = [];

        lancamentos = await fetch('../extra/pegarlancamentos.php')
            .then(response => response.json())
            .then(data => {
                return data;
            })
            .catch(error => console.error('Erro ao buscar os dados:', error));

        this.lancamentos = lancamentos;

    }

    async FiltraLancamentos() {

        let tamanho = await this.PegaLancamentos();
        tamanho = this.lancamentos.length;

        for (let i = 0; i < tamanho; i++) {

            switch (this.lancamentos[i].tipo) {
                case "gastos":
                    this.gastos.push(this.lancamentos[i]);
                    break;
                case "renda":
                    this.renda.push(this.lancamentos[i]);
                    break;
                case "investimento":
                    this.investimento.push(this.lancamentos[i]);
                    break;
                case "lazer":
                    this.lazer.push(this.lancamentos[i]);
                    break;
                case "financiamento":
                    this.financiamento.push(this.lancamentos[i]);
                    break;
            }

        }
    }

    async CarregaLancamentos() {

        let listaatual = await this.FiltraLancamentos();

        this.Tipo();

        switch (this.tipo) {
            case "gastos":
                listaatual = this.gastos;
                break;
            case "renda":
                listaatual = this.renda;
                break;
            case "investimento":
                listaatual = this.investimento;
                break;
            case "lazer":
                listaatual = this.lazer;
                break;
            case "financiamento":
                listaatual = this.financiamento;
                break;
            default:
                console.log("Erro ao carregar o tipo");
        }

        for (let i = 0; i < listaatual.length; i++) {
            this.Criar(listaatual[i]);
        }

    }

    Criar(valores) {

        const containeractions = document.querySelector(".containeractions");
        const dashboard = document.querySelector("#dashboard");

        var elementoOriginal = document.querySelector("#registro0");
        var elementoClone = elementoOriginal.cloneNode(true);

        elementoClone.id = "registro" + this.contador;

        dashboard.insertBefore(elementoClone, containeractions);

        elementoClone = document.querySelector("#registro" + this.contador);

        const inputValor = elementoClone.querySelector(".valor");

        const id = elementoClone.querySelector(".id");
        id.value = "?";

        if (valores != 0) {

            id.value = valores.lancamento_id;

            const inputTitulo = elementoClone.querySelector(".inputtitulo");
            inputTitulo.value = valores.titulo;

            inputValor.value = valores.valor;
            this.Mascara(inputValor);

            const inputFrequencia = elementoClone.querySelector(".frequencia");
            inputFrequencia.value = valores.frequencia;

            const inputDataInicial = elementoClone.querySelector(".data");
            inputDataInicial.value = valores.data_inicial;

            const inputDataFinal = elementoClone.querySelector(".datafim");
            inputDataFinal.value = valores.data_final;

        }

        elementoClone.style.display = "flex";

        inputValor.addEventListener('input', (event) => {
            this.Mascara(event.target);
        });

        this.contador += 1;

    }

    Salva() {
        let lista = [];
        let listadados = [];
        lista = document.querySelectorAll(".registro");

        for (let i = 1; i < lista.length; i++) {

            let obj = [];

            obj.push(lista[i].querySelector(".id").value);
            obj.push(lista[i].querySelector(".inputtitulo").value);
            let valorAlterado = lista[i].querySelector(".valor").value;
            valorAlterado = valorAlterado.replace(/[^\d,]/g, "").replace(",", ".");
            valorAlterado = parseFloat(valorAlterado).toFixed(2);
            obj.push(parseFloat(valorAlterado));
            obj.push(lista[i].querySelector(".frequencia").value);
            obj.push(lista[i].querySelector(".data").value);
            obj.push(lista[i].querySelector(".datafim").value);

            this.Tipo();

            obj.push(this.tipo);

            listadados.push(obj);
        }

        fetch('../extra/salvarlancamentos.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(listadados),
        })

        this.Limpar();

        this.CarregaLancamentos();
    }

    async Excluir(registro) {

        let registro_id = registro.querySelector(".id").value;

        fetch('../extra/excluirlancamentos.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(registro_id)
        });

        registro.remove();

    }

    Mascara(valor) {
        let valorAlterado = valor.value;
        valorAlterado = valorAlterado.replace(/\D/g, ""); // Remove todos os caracteres que não são números
        valorAlterado = valorAlterado.replace(/(\d+)(\d{2})$/, "$1,$2"); // Adiciona a vírgula para separar os centavos
        valorAlterado = valorAlterado.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."); // Adiciona pontos para separar milhares
        valorAlterado = "R$" + valorAlterado; // Adiciona o prefixo "R$"
        valor.value = valorAlterado;
    }

    Tipo() {
        let link = window.location.pathname.split("/").pop();

        switch (link) {
            case "gastos.php":
                this.tipo = "gastos";
                break;

            case "renda.php":
                this.tipo = "renda";
                break;

            case "financiamento.php":
                this.tipo = "financiamento";
                break;

            case "investimento.php":
                this.tipo = "investimento";
                break;

            case "lazer.php":
                this.tipo = "lazer";
                break;

        }
    }

    Atualizar() {

        document.addEventListener("DOMContentLoaded", () => {
            document.querySelector("#dashboard").addEventListener("click", (event) => {
                if (event.target && event.target.classList.contains("delete")) {
                    let registro = event.target.closest(".registro");
                    this.Excluir(registro);
                }
            });
        });

        const adicionar = document.querySelector("#adicionar");

        adicionar.addEventListener('click', (event) => {

            console.log("sss");

            this.Criar(0);

        })

        const save = document.querySelector('#btnsave');

        save.addEventListener('click', (event) => {
            this.Salva();
        });
    }

    Limpar() {

        this.lancamentos = [];
        this.gastos = [];
        this.renda = [];
        this.investimento = [];
        this.lazer = [];
        this.financiamento = [];

        const registros = Array.from(document.querySelectorAll(".registro"));
        console.log(registros);

        let tamanhoLista = registros.length;

        for (let i = 0; i < tamanhoLista; i++) {
            if (registros[i].id != "registro0") {
                console.log(registros[i].id);
                registros[i].remove();
            }

        }
    }

}