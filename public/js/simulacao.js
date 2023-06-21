function calcular() {
    var valor = document.getElementById("valor").value;
    var taxa = document.getElementById("taxa").value;
    var tempo = document.getElementById("tempo").value;
    var parcela = document.getElementById("parcela").value;

    if (valor && taxa && tempo && !parcela) {
        // Se valor, taxa e tempo forem preenchidos e parcela estiver vazio, Calcula o valor da parcela
        parcela = (valor * taxa / 100) / (1 - Math.pow(1 + taxa / 100, (-tempo)));
        document.getElementById("parcela").value = parcela.toFixed(2);
        document.getElementById("resultado").innerHTML = "Resultado -> Para um empréstimo de: " + valor +
            " reais, a parcela será de: " + parcela.toFixed(2);

    } else if (taxa && tempo && parcela && !valor) {

        // Se taxa, tempo e parcela forem preenchidos e valor estiver vazio, Calcula o valor máximo possível para o empréstimo

        var valor_total = parcela * ((1 - Math.pow(1 + taxa / 100, -tempo)) / (taxa / 100));
        valor = valor_total.toFixed(2);
        document.getElementById("valor").value = valor;
        document.getElementById("resultado").innerHTML = "Resultado -> Para uma parcelas de: " + parcela +
            " reais, o valor máximo possível do empréstimo será de: " + valor + " reais";
    } else if (tempo && parcela && valor && !taxa) {
        // Se tempo, parcela e valor forem preenchidos e taxa estiver vazia, Calcula a taxa de juros necessária.
        var taxa = encontrarTaxaJuros(parseFloat(valor), parseFloat(tempo), parseFloat(parcela));
        taxa = parseFloat(taxa); // Converter para número
        document.getElementById("taxa").value = taxa.toFixed(2);
        document.getElementById("resultado").innerHTML = "Para um empréstimo de: " + valor +
            " reais, com parcelas de: " + parcela + " reais, a taxa de juros necessária será de: " + taxa.toFixed(
                2) + "%";
    } else if (parcela && valor && taxa && !tempo) {

        // Se parcela, valor e taxa forem preenchidos e tempo estiver vazio, Calcula o tempo mínimo necessário.

        document.getElementById("tempo").value = tempo.toFixed(2);

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
        let iteracoes = 0;
        while (Math.abs(f(taxa, capital, tempo, parcela)) > tolerancia && iteracoes < 500) {
            taxa = taxa - f(taxa, capital, tempo, parcela) / fderivada(taxa, capital, tempo, parcela);
            iteracoes++;
        }
        return taxa * 100; // Retorna a taxa de juros em porcentagem
    }

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

function changeDropdownText(itemName) {
    const dropdownButton = document.querySelector('.btn.dropdown-toggle');
    dropdownButton.textContent = itemName;
}
}
