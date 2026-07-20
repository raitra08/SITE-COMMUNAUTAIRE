# PROJET FINAL S2

## Livraison 1

### Fonctionnalités prévues

#### Base de données ok
- Création de la base `site_communautaire`
- Création des tables :
  - membre
  - categorie
  - produit
  - produit_membre
  - vente
- Insertion des données de test

#### Fonctions
##### Fonction connecter_membre($ETU)
  - get les infos d'un membre suivant l'etu entré

##### Fonction ajouter_membre($nom, $numero, $image = NULL) 
  - si image est null on ne remplit que nom et numero_etu
  - sinon le contraire


##### en cours
- Achat d'un produit

##### Fonction get_produit ok
  - selection produit where id_produit = id

##### Fonction get_all_produits ok
  - retourne tous les produits par ordre du nom

##### Fonction insert_produit_membre ok
  - affichage des produits depuis vendre.php vers accueil.php

##### en cours
- Calcul du montant des ventes

#### Pages
##### index.php (Login)
  - création formulaire avec pour unique champ, le numéro etu
  - bouton se connecter qui redirige vers login_traitement.php

##### login_traitement.php
  - vérification de l'exitence de numéro etu dans la base
  - début de session()
  - si il existe, redirection vers accueil.php + appel fonction `connecter_membre($ETU)`
  - sinon vers inscription.php

##### incription.php
  - création formulaire avec champs: nom, numéro_etu, image(facultatif)
  - bouton vallider qui redirige vers inscription_traitement.php

##### inscription_traitement.php
  - récupération de l'etu entré dans index.php comme étant le numéro etu du membre qui va s'inscrire
  - recupération du nom 
  - début de session()
  - si l'utilisateur a importé une image donc appel de la fonction `uploaderImages`
  - puis inscrire le membre via la fonction `ajouter_membre`
  - redirection vers accueil.php
- accueil.php

### Vendre.php
  #### Creation formulaire ok
    - Produit
    - Prix
    - Quantité
    - Date disponible

#### en cours
- mes_ventes.php




---

## Répartition des tâches
### Étudiant 1 : Raitra
- Création de la base de données
- Création de `base.sql`
- Développement de la connexion et inscription 
- Développement de la page `accueil.php`


### Étudiant 2 : Vanilla
- Developpement de `accueil.php` ok
- Développement de `vendre.php` ok
- Développement de `mes_ventes.php` en cours


