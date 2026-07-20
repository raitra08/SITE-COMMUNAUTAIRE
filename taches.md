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

##### Fonction uploaderImages ok
  - changements de nom de la photo par ajout de time()
  - stockage copie dans /uploads

##### Fonction get_mes_ventes($id_membre) ok
  - Calcul du montant des ventes effectuées par le membre 

##### Fonction traitement_achat ok 
  - Vérifier que le produit existe
  - Vérifier qu'il y a assez de stock
  - Enregistrer l'achat dans la table vente puis diminuer la quantité disponible

##### Fonction get_total_ventes($id_membre) ok
  - retourne la totalité des ventes du membre vendeur

##### Fonction get_all_produits_en_vente($id_membre) ok
  - affiche tous les produits actuellement en vente sur la page d'accueil, mais sans afficher ceux du membre connecté.


#### Pages
##### index.php (Login)
  - bouton se connecter qui redirige vers login_traitement.php

##### login_traitement.php
  - vérification de l'exitence de numéro etu dans la base
  - création formulaire avec pour unique champ, le numéro etu
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

##### Vendre.php
    - Creation formulaire ok
    - Produit
    - Prix
    - Quantité
    - Date disponible

###### mes_ventes.php
  -  affichage des infos sur les produits vendus (nom, prix, quantité vendue, montant, prix total)

##### traitement_achat.php 
  - redirection vers accueil.php parce qu'il n'y a pas de notion de panier 
  - erreur en cas de non existence du produit

##### traitement_vente.php 
  - insert dans table vente après appui sur "acheter"
  - redirection vers accueil.php 



---

## Répartition des tâches
### Étudiante 1 : Raitra
- Création de la base de données
- Création de `base.sql`
- Développement de la connexion et inscription 
- Développement de la page `accueil.php`
- Développement de la page `mes_ventes.php`
- Développement de traitement_venets.php 

### Étudiante 2 : Vanilla
- Developpement de `accueil.php` ok
- Développement de `vendre.php` ok



