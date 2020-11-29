document.addEventListener("DOMContentLoaded", function(event) {
    var pop = document.getElementById('option-connect');
    //Un commentaire
    console.log("Ça fonctionne!!!");
    var lien = document.getElementById('open');
    lien.addEventListener('click', function(){

        pop.classList.add('connection');
    });

    /*document.getElementById('close-pop').addEventListener('click', function(){
        console.log('close-pop');
        document.getElementById('option-connect').classList.remove('connection');
    });*/
    document.getElementById('close').addEventListener('click', function(){
        document.getElementById('option-connect').classList.remove('connection');
    });
    if(pop.classList.contains('connection')) {
        document.addEventListener('click', () => {
            document.getElementById('option-connect').classList.remove('connection');
        });
    }



    //var element = document.getElementById("open");
    //element.classList.add(".connection");
    function nope() {
        alert('erreur lors de la connexion');
    }


});