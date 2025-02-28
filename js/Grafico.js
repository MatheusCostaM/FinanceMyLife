export class Grafico {

    constructor(dados, cores) {
        this.dados = dados;
        this.cores = cores;
    }

    desenharGraficoPizza() {
        const canvas = document.querySelector('#graficoPizza');
        const ctx = canvas.getContext('2d');
        const centroX = canvas.width / 2;
        const centroY = canvas.height / 2;
        const raio = Math.min(centroX, centroY) - 10;
        let anguloInicial = 0;

        const soma = this.dados.reduce((a, b) => a + b, 0);

        this.dados.forEach((valor, index) => {
            const anguloFinal = anguloInicial + (2 * Math.PI * (valor / soma));

            ctx.beginPath();
            ctx.moveTo(centroX, centroY);
            ctx.arc(centroX, centroY, raio, anguloInicial, anguloFinal);
            ctx.closePath();
            ctx.fillStyle = this.cores[index];
            ctx.fill();

            anguloInicial = anguloFinal;
        });
    }

    Atualizar(listaporcentagem) {

        this.dados = listaporcentagem;
        this.desenharGraficoPizza();

    }
}

