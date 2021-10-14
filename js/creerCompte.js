async function loadPage(){
    let clients = [];
    await fetch('../bdd/clients.json')
    .then(response => response.json())
    .then(data => clients = data)

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

async function changeClient(){

    let div = document.getElementById("trop-compte");
    div.hidden = true;

    let formAgence = document.getElementById("id-agence");
    formAgence.hidden = true;
    formAgence.required = true;

    let idClient = document.getElementById("id-client").value;

    let allComptes = [];
    await fetch('../bdd/comptes.json')
    .then(response => response.json())
    .then(data => allComptes = data)

    let compteSelect = [];
    allComptes.forEach(compte => {
        if(compte.id_client == idClient){
            compteSelect.push(compte);
        }
    });

    if(compteSelect.length > 2){
        div.hidden = false;
    }

    let agences = [];
    if(compteSelect.length == 0){
        formAgence.hidden = false;
        formAgence.required = false;

        await fetch('../bdd/agences.json')
        .then(response => response.json())
        .then(data => agences = data)

        console.log(agences)

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


    
}