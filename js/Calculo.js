export class Calculo {

    constructor(renda, gastos, lazer, investimentos, financiamentos) {
        this.renda = renda;
        this.gastos = gastos;
        this.lazer = lazer;
        this.investimentos = investimentos;
        this.financiamentos = financiamentos;
        this.sobra = 0;
        this.listaporcentagem = [];
    }

    Formatar(valor) {
        let valorFormatado = new Intl.NumberFormat('pt-BR', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        }).format(valor);

        return valorFormatado;
    }

    Calcular() {

        const valorRenda = this.Total(this.renda);

        const valorGastos = this.Total(this.gastos);

        const valorLazer = this.Total(this.lazer);

        const valorInvestimentos = this.Total(this.investimentos);

        const valorFinanciamentos = this.Total(this.financiamentos);

        let valorSobra = valorRenda - (valorGastos + valorLazer + valorInvestimentos + valorFinanciamentos);

        let porcentagem = 100 / valorRenda;

        if (porcentagem == Infinity) {
            porcentagem = 0;
        }

        const renda = document.querySelector(".renda");
        renda.innerHTML = "Renda | R$ " + this.Formatar(valorRenda);

        const sobra = document.querySelector(".sobra");

        let sobraOuFalta = "Sobra"

        if (valorSobra < 0) {
            sobraOuFalta = "Falta"
        }

        sobra.innerHTML = sobraOuFalta + " | R$ " + this.Formatar(valorSobra) + " | " + Math.round(porcentagem * valorSobra) + "%";

        let listaporcentagem = [];
        listaporcentagem.push(Math.round(porcentagem * valorGastos));
        listaporcentagem.push(Math.round(porcentagem * valorInvestimentos));
        listaporcentagem.push(Math.round(porcentagem * valorLazer));
        listaporcentagem.push(Math.round(porcentagem * valorFinanciamentos));

        listaporcentagem.push(Math.round(porcentagem * valorSobra));

        const financiamentos = document.querySelector(".financiamentovalor");
        financiamentos.innerHTML = "R$ " + this.Formatar(valorFinanciamentos);
        const financiamentospr = document.querySelector(".financiamentoporcentagem");
        financiamentospr.innerHTML = listaporcentagem[3] + "%";
        const financiamentospilha = document.querySelector("#graficoPilha4");
        financiamentospilha.style.height = listaporcentagem[3] + "%";

        const gastos = document.querySelector(".gastosvalor");
        gastos.innerHTML = "R$ " + this.Formatar(valorGastos);
        const gastospr = document.querySelector(".gastosporcentagem");
        gastospr.innerHTML = listaporcentagem[0] + "%";
        const gastospilha = document.querySelector("#graficoPilha2");
        gastospilha.style.height = listaporcentagem[0] + "%";

        const investimentos = document.querySelector(".investimentovalor");
        investimentos.innerHTML = "R$ " + this.Formatar(valorInvestimentos);
        const investimentospr = document.querySelector(".investimentoporcentagem");
        investimentospr.innerHTML = listaporcentagem[1] + "%";
        const investimentospilha = document.querySelector("#graficoPilha1");
        investimentospilha.style.height = listaporcentagem[1] + "%";

        const lazer = document.querySelector(".lazervalor");
        lazer.innerHTML = "R$ " + this.Formatar(valorLazer);
        const lazerpr = document.querySelector(".lazerporcentagem");
        lazerpr.innerHTML = listaporcentagem[2] + "%";
        const lazerpilha = document.querySelector("#graficoPilha3");
        lazerpilha.style.height = listaporcentagem[2] + "%";

        this.Metas(listaporcentagem);

        for (let i = 0; i < listaporcentagem.length; i++) {
            if (listaporcentagem[i] < 0) {
                listaporcentagem[i] = 0;
            } else {
                listaporcentagem[i] = listaporcentagem[i] / 10;
            }
        }

        this.listaporcentagem = listaporcentagem;

    }

    async Metas(listaporcentagem) {

        let porcentagemMetas = await this.CarregaPorcentagem();

        let cores = {
            "verde": "#50FFB2",
            "vermelho": "#FB4769",
            "branco": "white"
        }

        let cortexto = "";

        const intengastos = document.querySelector(".intengastos");
        const inteninvestimento = document.querySelector(".inteninvestimento");
        const intenlazer = document.querySelector(".intenlazer");
        const intenfinanciamento = document.querySelector(".intenfinanciamento");

        const listatextos = [intengastos, inteninvestimento, intenlazer, intenfinanciamento];

        let posicao = "normal";

        for (let i = 0; i < listaporcentagem.length; i++) {

            cortexto = cores["branco"];

            if (i == 4) { break; }

            let porcentagematual = listaporcentagem[i] * 10;

            if (porcentagematual > porcentagemMetas[i * 2] && porcentagematual > porcentagemMetas[(i * 2) + 1]) {
                posicao = "acima";
            } else if (porcentagematual < porcentagemMetas[i * 2] && porcentagematual < porcentagemMetas[(i * 2) + 1]) {
                posicao = "abaixo";
            } else {
                posicao = "normal";
            }

            switch (Number(porcentagemMetas[i + 8])) {
                case 0:
                    if (posicao == "acima") {
                        cortexto = cores["vermelho"];
                    } else if (posicao == "abaixo") {
                        cortexto = cores["verde"];
                    }
                    break;
                case 1:
                    if (posicao == "abaixo") {
                        cortexto = cores["vermelho"];
                    } else if (posicao == "acima") {
                        cortexto = cores["verde"];
                    }
                    break;
                default:
                    console.log("erro ao classificar texto de situação");
            }

            listatextos[i].innerHTML = posicao;
            listatextos[i].style.color = cortexto;

        }

    }

    Filtrar(lista) {

        const dataIni = new Date(document.querySelector("#inicio").value);
        const dataFim = new Date(document.querySelector("#fim").value);

        const listaClone = [...lista];

        for (let i = 0; i < lista.length; i++) {

            let dataIniVariavel = new Date(lista[i].data_inicial);

            let dataFimVariavel = new Date(lista[i].data_final);


            if (lista[i].data_final == null) {
                dataFimVariavel = "Invalid Date";
            }

            if (lista[i].data_inicial == null) {
                dataIniVariavel = "Invalid Date";
            }


            let valor = 1;

            if (!isNaN(dataIni) && !isNaN(dataFimVariavel) && dataIni > dataFimVariavel) {
                listaClone.splice(i, 1);
                break;
            }
            if (!isNaN(dataFim) && !isNaN(dataIniVariavel) && dataFim < dataIniVariavel) {
                listaClone.splice(i, 1);
                break;
            }
            if (lista[i].frequencia == "uma" && ((!isNaN(dataIni) && dataIni > dataIniVariavel) || (!isNaN(dataFim) && dataFim < dataIniVariavel))) {

                listaClone.splice(i, 1);
                break;
            }


            switch (listaClone[i].frequencia) {
                case "uma":
                    break;
                case "semanal":
                    valor = 7;
                    break;
                case "quinzenal":
                    valor = 15;
                    break;
                case "mensal":
                    break;
                case "anual": 365;
                    valor = 365;
            }

            let contador = 1;

            if (listaClone[i].frequencia != "uma") {

                if (!isNaN(dataFim) || !isNaN(dataFimVariavel)) {

                    contador = 0;

                    let dataAtual = new Date(dataIniVariavel);

                    while ((dataAtual < dataFim || isNaN(dataFim)) && (dataAtual < dataFimVariavel || isNaN(dataFimVariavel))) {

                        if (dataIni <= dataAtual) {
                            contador += 1;
                        }
                        if (lista[i].frequencia == "mensal") {
                            dataAtual.setMonth(dataAtual.getMonth() + valor);
                        } else {
                            dataAtual.setDate(dataAtual.getDate() + valor);
                        }
                    }
                }
            }

            listaClone[i].valor = lista[i].valor * contador;

        }

        return listaClone;
    }

    Total(lista) {

        let listaClone = [...lista]

        listaClone = this.Filtrar(listaClone);

        let total = 0;

        for (let i = 0; i < listaClone.length; i++) {
            total += parseFloat(listaClone[i].valor);
        }

        return total;



    }

    async CarregaPorcentagem() {

        let porcentagemMetas = [];

        porcentagemMetas = await fetch('../extra/pegarbutoes.php')
            .then(response => response.json())
            .then(data => {
                return data;
            })
            .catch(error => console.error('Erro ao buscar os dados:', error));

        return porcentagemMetas;

    }

    Atualizar(grafico) {
        const dataIni = document.querySelector("#inicio");
        const dataFim = document.querySelector("#fim");

        dataIni.addEventListener('click', (event) => {
            this.Calcular();
            grafico.Atualizar(this.listaporcentagem);
        });

        dataFim.addEventListener('click', (event) => {
            this.Calcular();
            grafico.Atualizar(this.listaporcentagem);
        });
    }
}