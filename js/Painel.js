export class Painel {
    constructor(painel, tipo, buttons) {

        this.button1 = buttons[0];
        this.button2 = buttons[1];
        this.button3 = buttons[2];
        this.button4 = buttons[3];
        this.button5 = buttons[4];
        this.button6 = buttons[5];
        this.button7 = buttons[6];
        this.button8 = buttons[7];
        this.painel = painel;
        this.tipo = tipo;
        this.body = document.querySelector('.body');

    }

    Comparar(operador1, operador2, buttonar) {

        let valor1 = operador1.Valor();
        let valor2 = operador2.Valor();

        let valorsomado = 0;
        let valoresquecido = 0;

        if (valor1 > valor2) {
            valorsomado = valor1;
            valoresquecido = valor2;
        } else {
            valorsomado = valor2;
            valoresquecido = valor1;
        }
        if (this.tipo == 1) {
            let valortrocado = valorsomado;
            valorsomado = valoresquecido;
            valoresquecido = valortrocado;
        }
        if (buttonar.tipe == "reduzir") {
            let valortrocado = valorsomado;
            valorsomado = valoresquecido;
            valoresquecido = valortrocado;
        }
        if (valorsomado == valor1) {

            operador2.button.classList.remove('max');
            operador2.button.classList.add('min');

            operador1.button.classList.remove('min');
            operador1.button.classList.add('max');

            operador2.contador.classList.remove('numbermax');
            operador2.contador.classList.add('numbermin');

            operador1.contador.classList.remove('numbermin');
            operador1.contador.classList.add('numbermax');


        } else {

            operador1.button.classList.remove('max');
            operador1.button.classList.add('min');

            operador2.button.classList.remove('min');
            operador2.button.classList.add('max');

            operador1.contador.classList.remove('numbermax');
            operador1.contador.classList.add('numbermin');

            operador2.contador.classList.remove('numbermin');
            operador2.contador.classList.add('numbermax');


        }
        return valorsomado;
    }


    Somar() {

        let valor1 = this.Comparar(this.button1, this.button2, this.button1.buttonar);
        let valor2 = this.Comparar(this.button3, this.button4, this.button3.buttonar);
        let valor3 = this.Comparar(this.button5, this.button6, this.button5.buttonar);
        let valor4 = this.Comparar(this.button7, this.button8, this.button7.buttonar);

        let somatotal = valor1 + valor2 + valor3 + valor4;

        this.painel.innerHTML = somatotal + "%";

        if (somatotal > 100) {
            //alert("Porcentagem total maior que 100%.")
        }

    }

    Atualizar() {

        window.onload = this.Somar();

        this.body.addEventListener('mouseup', (event) => {
            this.Somar();
        });

        this.body.addEventListener('mouseleave', (event) => {
            this.Somar();
        });
    }
}