import {getGameInfo, printCells, showAlert} from '../common.js';
import { winningCombinations, checkVictory } from './common.js';
const game_key = 'tris_mp';
const grid = document.getElementById('grid');
const cellsNbr = 9;
const cells = [];
const cellsSign = [];
let sign = 'X';
let turn = 0;

printCells(grid, cellsNbr, cells, cellClick);
getGameInfo(game_key);

function cellClick(event){
  const cell = event.target;
  const index = cells.indexOf(cell);

  if(cellsSign[index])return; //la casella è già stata cliccata

  turn++;
  if(turn % 2 === 0){
    sign = 'O';
  }else{
    sign = 'X';
  }

  cell.innerText = sign;
  cellsSign[index] = sign;
  let hasWon = checkVictory(winningCombinations, cellsSign);

  if(hasWon)showAlert(`${sign} ha vinto`);
  else if(turn === 9)showAlert('Pareggio');
}