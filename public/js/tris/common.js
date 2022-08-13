export const winningCombinations = [
  [0, 1, 2],
  [3, 4, 5],
  [6, 7, 8],
  [0, 3, 6],
  [1, 4, 7],
  [2, 5, 8],
  [0, 4, 8],
  [2, 4, 6],
];

export function checkVictory(combinations, cellSigns) {

  for(let i = 0; i < combinations.length; i++){
      const combination = combinations[i];

      const a = combination[0];
      const b = combination[1];
      const c = combination[2];

      if(
          cellSigns[a] &&
          cellSigns[a] === cellSigns[b] &&
          cellSigns[b] === cellSigns[c]
      ){
          return true;
      }
  }
  return false;

}