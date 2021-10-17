async function getData(chemin){
    let d = [];
    await fetch(chemin)
    .then(response => response.json())
    .then(data => d = data)
    return d;
}

function resetForm(){
    let divTropCompte = document.getElementById("trop-compte");
    divTropCompte.hidden = true;

    let divAucuneAgence = document.getElementById("aucune-agence");
    divAucuneAgence.hidden = true;

    let btn = document.getElementById("btn-envoyer");
    btn.disabled = false;

    let formAgence = document.getElementById("id-agence");
    formAgence.hidden = true;
    formAgence.required = false;
    for(let i=0; i<=formAgence.length; i++){
        formAgence.remove(1);
    }

    let type = document.getElementById("type-compte");
    type.hidden = true;
    type.required = false;
    for(let i=0; i<=type.length; i++){
        type.remove(1);
    }

    let decouvert = document.getElementById("decouvert");
    decouvert.value = "";
    decouvert.hidden = true;
    decouvert.required = false;

    let divSolde = document.getElementById("div-solde");
    divSolde.hidden = true;
    let solde = document.getElementById("solde");
    solde.required = false;
}

async function loadPage(){
    let clients = await getData('../bdd/clients.json');

    if(clients.length > 0){
        let formIdClient = document.getElementById("id-client");

        clients.forEach(client => {
            let option = document.createElement("option");
            option.value = client.id_client;
            option.text = client.id_client +  " -- " + client.prenom + " " + client.nom;
            formIdClient.add(option);
        });
    }
    else{
        let divAucunClient = document.getElementById("aucun-client");
        divAucunClient.hidden = false;
    }
}

let compteSelected = [];
let typeCompteBdd = [];
async function changeClient(){

    resetForm();

    let idClient = document.getElementById("id-client").value;

    compteSelected = [];
    typeCompteBdd = [];
    if(idClient !== ""){
        let allComptes = await getData('../bdd/comptes.json');
        allComptes.forEach(compte => {
            if(compte["client"].id_client == idClient){
                compteSelected.push(compte);
                typeCompteBdd.push(compte.type_compte);
            }
        });

        let formAgence = document.getElementById("id-agence");
        if(compteSelected.length > 2){
            let tropCompte = document.getElementById("trop-compte");
            tropCompte.hidden = false;
            let btn = document.getElementById("btn-envoyer");
            btn.disabled = true;
        }
        else if(compteSelected.length > 0){
            let option = document.createElement("option");
            option.value = compteSelected[0]["agence"]["code_agence"];
            formAgence.add(option);
            option.selected = true;
            changeAgence();
        }
        else if(compteSelected.length == 0){
            formAgence.hidden = false;
            formAgence.required = true;

            let agences = await getData('../bdd/agences.json');

            if(agences.length == 0){
                let div = document.getElementById("aucune-agence");
                div.hidden = false;
                let btn = document.getElementById("btn-envoyer");
                btn.disabled = true;
            }
            else{
                agences.forEach(agence => {
                    let option = document.createElement("option");
                    option.value = agence.code_agence;
                    option.text = agence.code_agence +  " -- " + agence.nom;
                    formAgence.add(option);
                });
            }
        }
    }
}

function changeAgence(){

    let type = document.getElementById("type-compte");
    for(let i=0; i<=type.length; i++){
        type.remove(1);
    }
    type.hidden = false;
    type.required = true;

    let typeCompteDispo = ["Livret A", "Courant", "PEL"];
    let typeCompteRestant = typeCompteDispo.filter(x => !typeCompteBdd.includes(x)).concat(typeCompteBdd.filter(x => !typeCompteDispo.includes(x)));

    typeCompteRestant.forEach(t => {
        let option = document.createElement("option");
        option.value = t;
        option.text = t;
        type.add(option);
    });
}

function changeType(){
    let decouvert = document.getElementById("decouvert");
    decouvert.hidden = false;
    decouvert.required = true;
}

function changeDecouvert(){
    let decouvert = document.getElementById("decouvert").value;

    let divSolde = document.getElementById("div-solde");
    divSolde.hidden = false;

    let solde = document.getElementById("solde");
    solde.required = true;
    solde.removeAttribute("min");

    if(decouvert == "false"){
        solde.min = "0";
        solde.value = "500";
    }
    else{
        solde.value = "-500";
    }
}