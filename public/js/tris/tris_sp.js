import { printCells, getGameInfo, showAlert } from "../common.js";
import { winningCombinations, checkVictory } from "./common.js";

const game_key = 'tris_sp';
const grid = document.getElementById('grid');
const cellsNbr = 9;
const cells = [];
const cellsSign = [];
let sign = 'X'
let turn = 0;
let playerTurn = true;
let gameOver = false;

printCells(grid, cellsNbr, cells, cellClick);
getGameInfo(game_key);

function cellClick(event){
  //interrompere se non è il turno del giocatore
  if(!playerTurn)return;
  const cell = event.target;
  const index = cells.indexOf(cell);

  if(cellsSign[index])return;

  turn++;
  sign = 'X';
  cell.innerText = sign;
  cellsSign[index] = sign;
  playerTurn = false;
  afterSign();
  //far partire la mossa del computer solo se non sono finiti i turni;
  if(turn !== 9 && !gameOver)setTimeout(computerSign, 500);
  
}

function computerSign(){
  sign = 'O';
  for(let i = 0; i < winningCombinations.length; i++){
      const combination = winningCombinations[i];

      const a = combination[0];
      const b = combination[1];
      const c = combination[2];

      //controllo primo caso
      if(
          cellsSign[a] &&
          cellsSign[a] === cellsSign[b] &&
          !cellsSign[c]
      ){
          cells[c].innerText = sign;
          cellsSign[c] = sign;
          turn++;
          playerTurn = true;

          afterSign();

          return;
          //return necessario altrimenti mette più segni
      }else if(
          cellsSign[b] &&
          cellsSign[b] === cellsSign[c] &&
          !cellsSign[a]
      ){
          cells[a].innerText = sign;
          cellsSign[a] = sign;
          turn++;
          playerTurn = true;

          afterSign();

          return;
      }else if(
          cellsSign[a] &&
          cellsSign[a] === cellsSign[c] &&
          !cellsSign[b]
      ){
          cells[b].innerText = sign;
          cellsSign[b] = sign;
          turn++;
          playerTurn = true;

          afterSign();

          return;
      }
  }

  //Segno Casuale se non c'è nessuna combinazione quasi vincente
  casualSign();
  playerTurn = true;

  
  afterSign();
  
}
//a causa del return bisogna far controllare in ogni if la vittoria o il pareggio
function afterSign(){
  let hasWon = checkVictory(winningCombinations, cellsSign);
  let message = turn % 2 === 0 ? 'Hai perso' : 'Hai vinto';
  if(hasWon){
      //dici che ha vinto
      // console.log(message);
      gameOver = true;
      showAlert(message);
      return;
  }else if(turn === 9){
      //dici che ha pareggiato
      console.log('pareggio');
      showAlert('Pareggio');
      return;
  }

  // console.log(`turno ${turn}`);
}

function casualSign(){
  const casualNbr = Math.floor(Math.random() * cells.length);
  if(cellsSign[casualNbr]){
      casualSign();
  }else{
      sign = 'O';
      cells[casualNbr].innerText = sign;
      cellsSign[casualNbr] = sign;

      turn++;

  }
  afterSign();
  
}