export class Controlador {

    constructor(button, element, position, contador, buttonar) {

        this.button = button;
        this.element = element;
        this.body = document.querySelector('.body');
        this.variavel = false;
        this.position = position;
        this.contador = contador;
        this.porcentagem = 0;
        this.buttonar = buttonar;
    }

    Valor() {
        return parseInt(this.contador.innerHTML);
    }

    slider() {

        this.button.addEventListener('mousedown', (event) => {
            this.variavel = true
        });

        this.body.addEventListener('mouseup', (event) => {
            this.variavel = false
        });

        this.body.addEventListener('mouseleave', (event) => {
            this.variavel = false
        });

        this.body.addEventListener('mousemove', (event) => {

            if (this.variavel) {

                let posimax = 95;
                let posimin = -5;
                let valordif = 0;

                if (this.position == 1) {
                    posimax = 95;
                    posimin = 0;
                } else {
                    posimax = 90;
                    posimin = -5;
                    valordif = 5;
                }

                let elementsize = this.element.getBoundingClientRect();
                let mousex = event.clientX;
                mousex = (((mousex - elementsize.x) / elementsize.width) * 100) - valordif;

                if (mousex > posimax) {
                    mousex = posimax;
                }
                if (mousex < posimin) {
                    mousex = posimin;
                }

                this.button.style.left = mousex + "%";

                let porcentagem = ((mousex + valordif) / 95) * 100;

                porcentagem = Math.round(porcentagem);

                this.porcentagem = porcentagem;

                this.contador.innerHTML = porcentagem + "%";
            }



        })
    }
}
