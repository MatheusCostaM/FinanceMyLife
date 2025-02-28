import { Layout } from "./Layout.js";
import { Lancamentos } from "./Lancamentos.js";

const layout = new Layout(document.querySelector("#inicio"), document.querySelector("#fim"), document.querySelector("#dashboard"));
layout.Atualizar();

const lancamentos = new Lancamentos();
lancamentos.CarregaLancamentos();
lancamentos.Atualizar();