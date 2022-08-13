export function getGameInfo(key, mobile = false){
  // console.log(key);
  
  let data = null;
  axios
  .get(`/api/games-info/${key}`)
  .then(resp => {
    data = resp.data.response;
    const baseHTML =`<h2>${data.name}</h2> <p>${data.description}</p>`
    const HTML = mobile ? `<span data-key="${key}" class="${key}">X</span>` + baseHTML : baseHTML;
    
    if(mobile){
      document.querySelector(`.${key}`).innerHTML += `${HTML}`;
      document.querySelector(`.game-info > .${key}`).addEventListener('click', changeInfoBannerVisibility);
    }else{
      document.querySelector('.game-data').innerHTML += HTML;
    }
    
  });
}

export function showAlert(message){
  const gameArea = document.querySelector('.game-area');

  const alertMessage = 
          `<div class="game-alert">
              <div class="game-alert-message">${message}
              </div>
          </div>`
  ;

  gameArea.innerHTML += alertMessage;
}

export function changeInfoBannerVisibility (event){
  const key = event.target.dataset.key;
  console.log(document.querySelector(`.game-info.${key}`));
  document.querySelector(`.game-info.${key}`).classList.toggle('d-none');
}

export function printCells(grid, cellsNbr, cellsArray, eventListener = null){
  for (let i = 0; i < cellsNbr; i++) {
    const cell = document.createElement('div');
    cell.classList.add('cell');
    if(eventListener)cell.addEventListener('click', eventListener);
    grid.appendChild(cell);
    cellsArray.push(cell);
    
  }

}