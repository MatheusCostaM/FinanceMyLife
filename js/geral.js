import { Lancamentos } from "./Lancamentos.js";
import { Grafico } from "./Grafico.js";
import { Calculo } from "./Calculo.js";

const dados = new Lancamentos();
await dados.FiltraLancamentos();

const calculo = new Calculo(dados.renda, dados.gastos, dados.lazer, dados.investimento, dados.financiamento);
calculo.Calcular();

let cores = {
    "financiamento": "#fb7a47",
    "gastos": "#FB4769",
    "investimento": "#50a2ff",
    "lazer": "#50FFB2",
    "sobra": "white"
}

let grafico = new Grafico(calculo.listaporcentagem, [cores["gastos"], cores["investimento"], cores["lazer"], cores["financiamento"], cores["sobra"]]);
grafico.desenharGraficoPizza();

calculo.Atualizar(grafico);
