function getCookie(cookieName) {
  let cookie = {};
  document.cookie.split(';').forEach(function(el) {
    let [key,value] = el.split('=');
    cookie[key.trim()] = value;
  })
  return cookie[cookieName];
}

function getPanier(){
  let tmp = getCookie("panier");
  if (tmp !==undefined){
    let panier = tmp.split('/');
    return panier;
  }else{
    return [];
  }
}

function setPanier(arr){
  let tmp1 =arr[0];
  for( var i = 1; i < arr.length; i++){
    tmp1= tmp1 + "/" + arr[i];
  }
  document.cookie = 'panier = '+tmp1 ;
}

function addPanier(nb){
  if (getPanier('panier').some(elem => elem === nb)){
    console.log("deja cliqué frr");
  }else{
    if (getCookie('panier') !== undefined){
      document.cookie = 'panier = ' + getCookie('panier')+'/'+nb;
    }else {
      document.cookie = 'panier = ' + nb;
    }
  }
}

function rmPanier(nb){
  let arr = getPanier();
  for( var i = 0; i < arr.length; i++){
    if ( arr[i] === nb) {
      arr.splice(i, 1);
    }
  }
  if (arr.length===1){
    document.cookie = 'panier = ';
  }else{
    setPanier(arr);
  }
}


function GFG_click(clicked) {
  toggle(clicked);
  var el_down = document.getElementById("GFG_DOWN");
  el_down.innerHTML = "ID = "+ getCookie('panier');
}

function toggle(clicked){
  if (document.getElementById(clicked).textContent === "add"){
    document.getElementById(clicked).textContent="delete";
    document.getElementById(clicked).style.backgroundColor="red";
    addPanier(clicked);
  }else{
    document.getElementById(clicked).textContent="add";
    document.getElementById(clicked).style.backgroundColor="green";
    rmPanier(clicked);
  }
}
