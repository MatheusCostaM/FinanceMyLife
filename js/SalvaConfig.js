
export class SalvaConfig {

    constructor(butoes, painel1, painel2, aumentareduz) {
        this.aumentareduz = aumentareduz;
        this.butoes = butoes;
        this.painel1 = painel1;
        this.painel2 = painel2;
    }

    async pegaButoes() {

        let posicaoButoes = [];

        posicaoButoes = await fetch('../extra/pegarbutoes.php')
            .then(response => response.json())
            .then(data => {
                return data;
            })
            .catch(error => console.error('Erro ao buscar os dados:', error));

        return posicaoButoes;
    }

    async carregaPosicao() {
        let posicaoButoes = await this.pegaButoes();

        for (let i = 0; i < this.butoes.length; i++) {

            if (i < 9) {
                let valor = 0;

                if (i % 2 == 1) {
                    valor = Math.round(((posicaoButoes[i] - 5) / 100) * 95);
                } else {
                    valor = Math.round((posicaoButoes[i] / 100) * 95);
                }
                this.butoes[i].button.style.left = valor + "%";

                this.butoes[i].contador.innerHTML = posicaoButoes[i] + "%";

            }
        }
        for (let i = 0; i < this.aumentareduz.length; i++) {
            let index = 8;
            index += i;

            if (posicaoButoes[index] == 1) {
                this.aumentareduz[i].tipe = "aumentar";
                this.aumentareduz[i].Trocar();
            }

        }
        this.painel2.Atualizar();
        this.painel1.Atualizar();
    }

    async subirdados() {

        let listaatual = [];

        for (let i = 0; i < this.butoes.length; i++) {

            let valor = 0;

            if (i % 2 == 1) {
                valor = parseInt(this.butoes[i].button.style.left) + 5;
                valor = Math.round(valor);
            } else {
                valor = parseInt(this.butoes[i].button.style.left);
                valor = Math.round(valor);
            }

            valor = Math.round(valor / 95 * 100);

            let novovalor = valor;
            listaatual.push(novovalor);

        }

        for (let i = 0; i < this.aumentareduz.length; i++) {

            let valor = 1;

            if (this.aumentareduz[i].tipe == "reduzir") {
                valor = 0;
            }

            listaatual.push(valor);
        }

        fetch('../extra/salvarbutoes.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ posicoes: listaatual })
        });

    }

    atualizar() {

        const body = document.querySelector('.body');

        body.addEventListener('mouseup', (event) => {
            this.subirdados();
        });

        body.addEventListener('mouseleave', (event) => {
            this.subirdados();
        });
    }



}
