export function getGameInfoMobile(key){
  // console.log(key);
  
  let data = null;
  axios
  .get(`/api/games-info/${key}`)
  .then(resp => {
    data = resp.data.response;
    
    document.querySelector(`.${key}`).innerHTML += `
    <span data-key="${key}" class="${key}">X</span>
    <h2>${data.name}</h2>
    <p>${data.description}</p>
    `
    document.querySelector(`.game-info > .${key}`).addEventListener('click', changeInfoBannerVisibility);
    
  });
}

export function changeInfoBannerVisibility (event){
  const key = event.target.dataset.key;
  console.log(document.querySelector(`.game-info.${key}`));
  document.querySelector(`.game-info.${key}`).classList.toggle('d-none');
}