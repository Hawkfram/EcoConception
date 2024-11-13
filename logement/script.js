function showInfo(type) {
    const infoDisplay = document.getElementById("info-display");

    const content = {
        type: "<h2>Type d'annonces</h2><p>Types disponibles : Appartement, Maison, Studio, etc.</p>",
        prix: "<h2>Prix</h2><p>Affiche les annonces dans votre gamme de prix.</p>",
        surface: "<h2>Surface</h2><p>Choisissez la surface souhaitée pour votre logement.</p>",
        colocation: "<h2>Colocation</h2><p>Options disponibles pour les logements en colocation.</p>",
        proximite: "<h2>Proximité</h2><p>Sélectionnez la proximité des services et transports.</p>",
        Mannonce: "<h2>Mon annonce</h2><p>Mettre son annonce personnel</p>",
        Tannonce: "<h2>Annonce Trouvée</h2><p>Mettre une annonce que l'on a trouvée.</p>"
    };

    infoDisplay.innerHTML = content[type] || "<p>Aucune information disponible.</p>";
}

function showFavoris(type) {
    const infoDisplay = document.getElementById("info-display");

    const content = {
        m: "<h2>Mes Favoris</h2>"
        
    };

    infoDisplay.innerHTML = content[type] || "<p>Aucune information disponible.</p>";
}
