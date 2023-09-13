    function calcular() {
        var valor = parseFloat(document.getElementById("valor").value);
        var taxa = parseFloat(document.getElementById("taxa").value);
        var tempo = parseFloat(document.getElementById("tempo").value);
        var parcela = parseFloat(document.getElementById("parcela").value);
    
        //Validações lado front-end

        if(valor < parcela && valor != 0){
            alert('O valor inicial deve ser maior que o da parcela!')
            return;
        }

        if(valor < 0 || taxa < 0 || tempo < 0 || parcela < 0){
            alert('O valor dos campos deve ser maior que zero!')
            return;
        }
        
        const camposPreenchidos = [valor, taxa, tempo, parcela].filter(campo => campo !== '').length;
        
        if (camposPreenchidos < 3) {
            alert('Preencha pelo menos 3 dos 4 campos: valor, taxa, tempo e parcela.');
        return;
  }

        if (valor && taxa && tempo && !parcela) {
            // Se valor, taxa e tempo forem preenchidos e parcela estiver vazio, Calcula o valor da parcela
            parcela = (valor * taxa / 100) / (1 - Math.pow(1 + taxa / 100, (-tempo)));
            document.getElementById("parcela").value = parcela.toFixed(2);
            document.getElementById("resultado").innerHTML = "Para um empréstimo de: " + valor +
                " reais, a parcela será de: " + parcela.toFixed(2);

        } else if (taxa && tempo && parcela && !valor) {

            // Se taxa, tempo e parcela forem preenchidos e valor estiver vazio, Calcula o valor máximo possível para o empréstimo

            var valor_total = parcela * ((1 - Math.pow(1 + taxa / 100, -tempo)) / (taxa / 100));
            valor = valor_total.toFixed(2);
            document.getElementById("valor").value = valor;
            document.getElementById("resultado").innerHTML = "Para uma parcelas de: " + parcela +
                " reais, o valor máximo possível do empréstimo será de: " + valor + " reais";

        } else if (tempo && parcela && valor && !taxa) {

            // Se tempo, parcela e valor forem preenchidos e taxa estiver vazia, Calcula a taxa de juros necessária

            var taxa = encontrarTaxaJuros(parseFloat(valor), parseFloat(tempo), parseFloat(parcela));
            taxa = parseFloat(taxa); // Converter para número
            document.getElementById("taxa").value = taxa.toFixed(2);
            document.getElementById("resultado").innerHTML = "Para um empréstimo de: " + valor +
                " reais, com parcelas de: " + parcela + " reais, a taxa de juros necessária será de: " + taxa.toFixed(
                    2) + "%";

        } else if (parcela && valor && taxa && !tempo) {
            function encontrarTempo(valor, parcela, taxa) {
                
                const tolerancia = 0.00001; // Tolerância para determinar a precisão da solução
                let tempo = 12; // Valor inicial para o tempo em meses
                let iteracoes = 0; // Valor inicial de iterações
                taxa = taxa / 100;

                //loop while usado para iterar e refinar a aproximação do tempo.
                //O loop continua enquanto o valor absoluto da função f for maior que a tolerância e o número de iterações for menor que 500.

                while (Math.abs(fTempo(tempo, valor, parcela, taxa)) > tolerancia && iteracoes < 500) {
                    tempo = tempo - fTempo(tempo, valor, parcela, taxa) / fTempoDerivative(tempo, valor, parcela, taxa);
                    iteracoes++;
                }

                return tempo;
            }

            // Função para calcular o valor da função f(tempo)
            function fTempo(tempo, valor, parcela, taxa) {
                return valor * Math.pow(1 + taxa, tempo) - parcela * (Math.pow(1 + taxa, tempo) - 1) / taxa;
            }
            // Função para calcular o valor da derivada de f(tempo)
            function fTempoDerivative(tempo, valor, parcela, taxa) {
                return valor * taxa * Math.pow(1 + taxa, tempo - 1) - parcela * (Math.pow(1 + taxa, tempo) * (taxa *
                    tempo - 1) + 1) / Math.pow(taxa, 2);
            }


            const tempoCalculado = encontrarTempo(valor, parcela, taxa);
            document.getElementById("tempo").value = tempoCalculado.toFixed(2);
            document.getElementById("resultado").innerHTML = 'O tempo necessário é de aproximadamente '+ tempoCalculado.toFixed(2) +' meses.';
        }


        function encontrarTaxaJuros(capital, tempo, parcela) {
    // Função para calcular o valor da função f(x)
    function f(x, capital, tempo, parcela) {
        return capital * Math.pow(1 + x, tempo) - parcela * (Math.pow(1 + x, tempo) - 1) / x;
    }
    // Função para calcular o valor da derivada de f(x)
    function fderivada(x, capital, tempo, parcela) {
        return capital * tempo * Math.pow(1 + x, tempo - 1) - parcela * (Math.pow(1 + x, tempo) * (x * tempo -
            1) + 1) / Math.pow(x, 2);
    }

    const tolerancia = 0.00001; // Tolerância para determinar a precisão da solução
    let taxa = 0.1; // Valor inicial para a taxa de juros
    let iteracoes = 0; // Valor inicial para a quantidade de iterações 

    //loop while usado para iterar e refinar a aproximação da taxa de juros.
    //O loop continua enquanto o valor absoluto da função f for maior que a tolerância e o número de iterações for menor que 500.

    while (Math.abs(f(taxa, capital, tempo, parcela)) > tolerancia && iteracoes < 500) {
        taxa = taxa - f(taxa, capital, tempo, parcela) / fderivada(taxa, capital, tempo, parcela);
        iteracoes++;
    }
    return taxa * 100; // Retorna a taxa de juros em porcentagem
}

    gerarGraficoBarra();
    gerarGraficoDonut();


        // Apaga e mostra placeholders:

        valor.addEventListener("focus", function() {
            this.placeholder = '';
        });
        valor.addEventListener("blur", function() {
            this.placeholder = 'Valor';
        });

        taxa.addEventListener("focus", function() {
            this.placeholder = '';
        });
        taxa.addEventListener("blur", function() {
            this.placeholder = 'taxa (% a.m)';
        });
        tempo.addEventListener("focus", function() {
            this.placeholder = '';
        });
        tempo.addEventListener("blur", function() {
            this.placeholder = 'Tempo (em meses)';
        });
        parcela.addEventListener("focus", function() {
            this.placeholder = '';
        });
        parcela.addEventListener("blur", function() {
            this.placeholder = 'Parcela';
        });

    }

    function gerarGraficoBarra() {
        var valor = parseFloat(document.getElementById("valor").value);
        var taxa = parseFloat(document.getElementById("taxa").value);
        var tempo = parseFloat(document.getElementById("tempo").value);
        var parcela = parseFloat(document.getElementById("parcela").value);
    
        const ctx = document.getElementById('chartBarra').getContext('2d');
    
        // Verifique se o gráfico anterior existe e destrua-o
        if (window.barraChart) {
            window.barraChart.destroy();
        }
    
        valorTotal = parcela * tempo;
        valorJuros = valorTotal - valor;
    
        var valores = [valorTotal, valor, valorJuros, parcela];
    
        // Crie o novo gráfico
        window.barraChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Valor Total', 'Valor Emprestado', 'Juros', 'Parcela'],
                datasets: [{
                    data: valores,
                    borderWidth: 2,
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(255, 206, 86, 0.5)'
                    ]
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
    function gerarGraficoDonut(){

        var valor = parseFloat(document.getElementById("valor").value);
        var taxa = parseFloat(document.getElementById("taxa").value);
        var tempo = parseFloat(document.getElementById("tempo").value);
        var parcela = parseFloat(document.getElementById("parcela").value);
    
        const ctx = document.getElementById('chartDonut').getContext('2d');

        if (window.donutChart) {
            window.donutChart.destroy();
        }
        
        valorTotal = parcela * tempo;
        valorJuros = valorTotal - valor;

        var valores = [valorTotal, valor, valorJuros, parcela];


        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Valor Total', 'Valor Emprestado', 'Juros', 'Parcela'],
                datasets: [{
                    data: valores,
                    borderWidth: 2,
                    borderColor:[
                        'rgba(255, 99, 132, 1)', 
                        'rgba(54, 162, 235, 1)',  
                        'rgba(75, 192, 192, 1)',  
                        'rgba(255, 206, 86, 1)'
                    ],
                    backgroundColor:[
                        'rgba(255, 99, 132, 0.5)', 
                        'rgba(54, 162, 235, 0.5)',  
                        'rgba(75, 192, 192, 0.5)',  
                        'rgba(255, 206, 86, 0.5)'
                    ]
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    function changeDropdownText(itemName) {
        const dropdownButton = document.querySelector('.btn.dropdown-toggle');
        dropdownButton.textContent = itemName;
    }

    $(document).ready(function() {

        setTimeout(function() {
            $(".session-alert").alert('close');
        }, 5000);
    });
