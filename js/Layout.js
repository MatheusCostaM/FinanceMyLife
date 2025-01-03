export class Layout {
    constructor(inicio, fim, dashboard) {
        this.inicio = inicio;
        this.fim = fim;
        this.dashboard = dashboard;
    }

    Filtrar() {
        let lista = Array.from(this.dashboard.querySelectorAll(".registro"));

        let valortotal = 0;

        let dtinicio = new Date(this.inicio.value);
        let dtfim = new Date(this.fim.value);

        for (let i = 0; i < lista.length; i++) {

            let data = new Date(lista[i].querySelector(".data").value);

            let datafim = new Date(lista[i].querySelector(".datafim").value);

            let frequencia = lista[i].querySelector(".frequencia").value;

            let datacalculada = new Date(data);

            let confirmador = false

            let repeticoes = 0;

            if (frequencia != "uma" && !isNaN(dtinicio) && !isNaN(dtfim) && !isNaN(datacalculada)) {

                let numfre = 7;

                switch (frequencia) {
                    case "quinzenal":
                        numfre = 15;
                        break;
                    case "mensal":
                        numfre = 1;
                        break;
                    case "anual":
                        numfre = 365;
                        break;
                }
                console.log(numfre);
                if (datafim > dtinicio || isNaN(datafim)) {
                    while (datacalculada <= dtfim && (datacalculada <= datafim || isNaN(datafim))) {
                        if (datacalculada >= dtinicio) {
                            repeticoes += 1;
                            confirmador = true;
                            lista[i].style.display = "flex";
                        }

                        if (numfre == 1) {
                            datacalculada.setMonth(datacalculada.getMonth() + numfre);
                        } else {
                            datacalculada.setDate(datacalculada.getDate() + numfre);
                        }

                    }
                }

            }

            if (lista[i].id !== "registro0" && data === "" && confirmador) {
                lista[i].style.display = "flex";
            } else {

                if (!isNaN(dtfim) && datacalculada > dtfim && !confirmador) {
                    lista[i].style.display = "none";
                } else if (!isNaN(dtinicio) && datacalculada < dtinicio && !confirmador) {
                    lista[i].style.display = "none";
                } else if (lista[i].id !== "registro0") {
                    lista[i].style.display = "flex";
                }
            }

            if (lista[i].style.display == "flex") {

                let valor = lista[i].querySelector(".valor").value;

                valor = parseFloat(valor.replace("R$", "").replace(/\./g, "").replace(",", "."));

                if (!isNaN(valor))
                    if (repeticoes == 0) {
                        repeticoes = 1;
                    }

                if (isNaN(valor)) {
                    valor = 0;
                }

                valortotal += valor * repeticoes;
            }
        }

        if (!isNaN(valortotal)) {
            document.querySelector(".totalpainel").innerHTML = "R$ " + valortotal;
        }

    }

    Atualizar() {
        this.dashboard.addEventListener('click', (event) => {
            this.Filtrar();
        });
        this.inicio.addEventListener('input', (event) => {
            this.Filtrar();
        });
        this.fim.addEventListener('input', (event) => {
            this.Filtrar();
        });
    }
}
