export class AumentarReduzir {
    constructor(botao) {
        this.botao = botao;
        this.tipe = "reduzir";

    }

    Trocar() {

        if (this.botao.src == "http://financemylife.byethost13.com/metas/img/reduzir.png") {
            this.botao.src = "img/aumentar.png";
            this.tipe = "aumentar";
        } else {
            this.botao.src = "img/reduzir.png";
            this.tipe = "reduzir";
        }
    }

    Atualizar() {
        this.botao.addEventListener('click', (event) => {
            this.Trocar();
        })
    }
}