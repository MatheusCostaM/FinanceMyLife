export class Modelos {
    constructor(porcentagem1, porcentagem2, porcentagem3, porcentagem4, porcentagem5, porcentagem6, porcentagem7, porcentagem8, buttons, modelo) {

        this.porcentagem = [porcentagem1, porcentagem2, porcentagem3, porcentagem4, porcentagem5, porcentagem6, porcentagem7, porcentagem8];
        this.modelo = modelo;
        this.button = [buttons[0], buttons[1], buttons[2], buttons[3], buttons[4], buttons[5], buttons[6], buttons[7]]
    }

    Alterar() {
        this.modelo.addEventListener('click', (e) => {

            for (let i = 0; i < this.button.length; i++) {

                this.button[i].contador.innerHTML = this.porcentagem[i] + "%";

                let valor = 0;

                if (i % 2 == 1) {
                    valor = (((this.porcentagem[i] - 5) / 100) * 95);
                } else {
                    valor = ((this.porcentagem[i] / 100) * 95);
                }

                this.button[i].button.style.left = valor + "%";
            }

        })
    }
}