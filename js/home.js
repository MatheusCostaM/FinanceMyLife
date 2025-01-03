import { Controlador } from "./Controlador.js";
import { Painel } from "./Painel.js";
import { Modelos } from "./Modelos.js";
import { AumentarReduzir } from "./AumentarReduzir.js"
import { SalvaConfig } from "./SalvaConfig.js"

// Iniciando Aumentar Reduzir

const buttonar1 = new AumentarReduzir(document.querySelector('#aumentarreduzir1'));
buttonar1.Atualizar();


const buttonar2 = new AumentarReduzir(document.querySelector('#aumentarreduzir2'));
buttonar2.Atualizar();


const buttonar3 = new AumentarReduzir(document.querySelector('#aumentarreduzir3'));
buttonar3.Atualizar();


const buttonar4 = new AumentarReduzir(document.querySelector('#aumentarreduzir4'));
buttonar4.Atualizar();

var aumentareduz = [buttonar1, buttonar2, buttonar3, buttonar4];

// Iniciando os Controladores

const buttonslide1 = new Controlador(document.querySelector('#controlmin1'), document.getElementById('gastoscontainer'), 1, document.querySelector('#min1'), buttonar1);
buttonslide1.slider();


const buttonslide2 = new Controlador(document.querySelector('#controlmax1'), document.getElementById('gastoscontainer'), 2, document.querySelector('#max1'), buttonar1);
buttonslide2.slider();


const buttonslide3 = new Controlador(document.querySelector('#controlmin2'), document.getElementById('investimentocontainer'), 1, document.querySelector('#min2'), buttonar2);
buttonslide3.slider();


const buttonslide4 = new Controlador(document.querySelector('#controlmax2'), document.getElementById('investimentocontainer'), 2, document.querySelector('#max2'), buttonar2);
buttonslide4.slider();


const buttonslide5 = new Controlador(document.querySelector('#controlmin3'), document.getElementById('lazercontainer'), 1, document.querySelector('#min3'), buttonar3);
buttonslide5.slider();


const buttonslide6 = new Controlador(document.querySelector('#controlmax3'), document.getElementById('lazercontainer'), 2, document.querySelector('#max3'), buttonar3);
buttonslide6.slider();


const buttonslide7 = new Controlador(document.querySelector('#controlmin4'), document.getElementById('financiamentocontainer'), 1, document.querySelector('#min4'), buttonar4);
buttonslide7.slider();


const buttonslide8 = new Controlador(document.querySelector('#controlmax4'), document.getElementById('financiamentocontainer'), 2, document.querySelector('#max4'), buttonar4);
buttonslide8.slider();

var buttons = [buttonslide1, buttonslide2, buttonslide3, buttonslide4, buttonslide5, buttonslide6, buttonslide7, buttonslide8];

// Iniciando os Paineis

const painelmin = new Painel(document.querySelector('#painelmin'), 2, buttons);
painelmin.Atualizar();

const painelmax = new Painel(document.querySelector('#painelmax'), 1, buttons);
painelmax.Atualizar();


// Iniciando Modelos

const investir = new Modelos(20, 30, 20, 30, 10, 15, 10, 20, buttons, document.querySelector('#buttoninvestir'));
investir.Alterar();

const curtir = new Modelos(25, 35, 10, 15, 15, 20, 5, 15, buttons, document.querySelector('#curtir'));
curtir.Alterar();

const casa = new Modelos(20, 30, 10, 15, 10, 15, 20, 30, buttons, document.querySelector('#casa'));
casa.Alterar();

const pagardividas = new Modelos(20, 30, 10, 15, 10, 15, 20, 30, buttons, document.querySelector('#pagardividas'));
pagardividas.Alterar();

const aposentar = new Modelos(25, 35, 20, 30, 10, 15, 10, 20, buttons, document.querySelector('#aposentar'));
aposentar.Alterar();

const equilibrio = new Modelos(25, 35, 15, 20, 15, 20, 10, 20, buttons, document.querySelector('#equilibrio'));
equilibrio.Alterar();

// teste pegabutoes

const salvaconfig = new SalvaConfig(buttons, painelmin, painelmax, aumentareduz);
window.onload = salvaconfig.carregaPosicao();

salvaconfig.atualizar();
