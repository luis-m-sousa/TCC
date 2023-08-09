// Função para calcular o tempo necessário usando o método de Newton
function encontrarTempo(valor, parcela, taxa) {
    const tolerancia = 0.00001; // Tolerância para determinar a precisão da solução
    let tempo = 12; // Valor inicial para o tempo em meses
    let iteracoes = 0;
  
    while (Math.abs(fTempo(tempo, valor, parcela, taxa)) > tolerancia && iteracoes < 100) {
      tempo = tempo - fTempo(tempo, valor, parcela, taxa) / fTempoDerivative(tempo, valor, parcela, taxa);
      iteracoes++;
    }
  
    return tempo;
  }
  
  // Função para calcular o valor da função fTempo(t)
  function fTempo(tempo, valor, parcela, taxa) {
    return valor * Math.pow(1 + taxa, tempo) - parcela * (Math.pow(1 + taxa, tempo) - 1) / taxa;
  }
  
  // Função para calcular o valor da derivada de fTempo(t)
  function fTempoDerivative(tempo, valor, parcela, taxa) {
    return valor * taxa * Math.pow(1 + taxa, tempo - 1) - parcela * (Math.pow(1 + taxa, tempo) * (taxa * tempo - 1) + 1) / Math.pow(taxa, 2);
  }
  
  // Exemplo de uso
  const valor = 40000;
  const parcela = 2500;
  const taxa = 0.03; // 3%
  
  const tempoCalculado = encontrarTempo(valor, parcela, taxa);
  console.log(`O tempo necessário é de aproximadamente ${tempoCalculado.toFixed(2)} meses.`);
  