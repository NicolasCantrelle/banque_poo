async function getData(chemin){
    let d = [];
    await fetch(chemin)
    .then(response => response.json())
    .then(data => d = data)
    return d;
}

async function loadPage(){
    let clients = await getData('../bdd/clients.json');
    if(clients.length > 0){
        let select = document.getElementById("id-client");

        for(let i=0; i<clients.length; i++){
            let option = document.createElement("option");
            option.value = clients[i].id_client;
            option.text = clients[i].id_client +  " -- " + clients[i].prenom + " " + clients[i].nom;
            select.add(option);
        }
    }
    else{
        let form = document.getElementById("form");
        form.hidden = true;

        let div = document.getElementById("aucun-client");
        div.hidden = false;
    }
}

function resetForm(){
    let tropCompte = document.getElementById("trop-compte");
    tropCompte.hidden = true;

    let formAgence = document.getElementById("id-agence");
    formAgence.hidden = true;
    formAgence.required = false;
    for(let i=1; i<=formAgence.length; i++){
        formAgence.remove(1);
    }

    let type = document.getElementById("type-compte");
    type.hidden = true;
    type.required = false;
    for(let i=1; i<=type.length; i++){
        type.remove(1);
    }

    let decouvert = document.getElementById("decouvert");
    decouvert.hidden = true;
    decouvert.required = false;

    let divSolde = document.getElementById("div-solde");
    divSolde.hidden = true;
    let solde = document.getElementById("solde");
    solde.required = false;

}

async function changeClient(){

    resetForm();

    let idClient = document.getElementById("id-client").value;

    let allComptes = await getData('../bdd/comptes.json');

    let compteSelect = [];
    let typeCompteBdd = [];
    allComptes.forEach(compte => {
        if(compte.id_client == idClient){
            compteSelect.push(compte);
            typeCompteBdd.push(compte.type_compte);
        }
    });

    if(compteSelect.length > 2){
        let tropCompte = document.getElementById("trop-compte");
        tropCompte.hidden = false;
    }
    else{
        if(compteSelect.length == 0 && idClient.length == 8){
            let formAgence = document.getElementById("id-agence");
            formAgence.hidden = false;
            formAgence.required = true;

            let agences = await getData('../bdd/agences.json');

            if(agences.length == 0){
                let form = document.getElementById("form");
                form.hidden = true;

                let div = document.getElementById("aucune-agence");
                div.hidden = false;
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
        
        if(compteSelect.length > 0){
            let formAgence = document.getElementById("id-agence");
            let option = document.createElement("option");
            option.value = compteSelect[0]["code_agence"];
            formAgence.add(option);
            option.selected = true;
        }

        if(idClient.length == 8){
            let type = document.getElementById("type-compte");
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
    }
    
}

async function changeAgence(){
    let type = document.getElementById("type-compte");
    type.hidden = false;
    type.required = true;

    let agences = await getData('../bdd/agences.json');

    if(agences.length == 0){
        let form = document.getElementById("form");
        form.hidden = true;

        let div = document.getElementById("aucune-agence");
        div.hidden = false;
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
    solde.removeAttribute("min")
    if(decouvert == "N"){
        solde.min = "0";
        solde.value = "500";
    }
    else{
        solde.value = "-500";
    }
}

