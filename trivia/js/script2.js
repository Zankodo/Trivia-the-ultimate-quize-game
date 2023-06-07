localStorage.setItem('level',"easy");
localStorage.setItem('categorie', "any");
function selectl(){
    let level = document.getElementById("level").value;
    localStorage.setItem('level',level);
}
function selectc(){
    let categorie = document.getElementById("categorie").value;
    localStorage.setItem('categorie', categorie);
}

