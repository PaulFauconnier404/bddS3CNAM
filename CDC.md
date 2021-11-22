###Titre

"Réalisation d’une application Web pour la gestion des stocks des pièces d’une casse auto.”

Contexte

La casse automobile “Récup Auto” située dans le centre de la France propose un large choix de pièces d’occasions pour les amateurs et professionnels de la mécanique. Dans un souci de digitalisation, cette société souhaite créer son propre commerce en ligne. Cette application web leur permettra, en plus de communiquer avec leur clientèle, de gérer leurs stocks. Cette application web permettra aux utilisateurs de réserver une pièce (en échange du versement d’un acompte) pour la récupérer en Click&Collect à l’heure qu’ils souhaitent. 


###Problématiques

Actuellement, l’entreprise n’a pas encore un système d’information efficace pour permettre un suivi de ce qu’elle vend (des pièces automobiles récupérées, conformes et en état de marche). Afin d’assurer le bon déroulement de l’implémentation de la base de donnée, les différentes problématiques sont énumérées ci-dessous. 

###Plusieurs problématiques peuvent se poser pour ce projet : 

Comment gérer efficacement les différents stocks de l’entreprise ?
Comment faciliter la mise en ligne, modification et suppression des annonces ?
Comment gérer le retrait des pièces fait dans les locaux par des clients ?
Comment identifier la provenance des pièces retirées par les clients dans les locaux ? 
Comment gérer la réservation des pièces par les clients sur l’application web ?

###Besoins

Dans un contexte de modernisation du système d’information de la casse automobile, l’implémentation d’une base de donnée est nécessaire à la bonne gestion des pièces automobiles récupérées. De la récupération à la revente, le suivi et l’inscription des pièces dans la base de donnée permet de tracer, vérifier et améliorer la qualité de service de l’entreprise et l’efficacité de celle-ci avec ses clients. Ce traçage des pièces est nécessaire pour une activité en ligne, visualiser l’ensemble des pièces disponibles en temps réel, effectuer un reporting à des fins statistiques pour le compte de l’entreprise. Mais également, contribuer à la revente d’information à des partenaires tiers. 

Grâce aux problématiques décrites ci-dessus et aux informations données par l’entreprise, on peut en déduire les besoins principaux du système que nous allons mettre en place. Les voici :

Pouvoir modifier les différents stocks selon les ventes journalières ;
Pouvoir gérer les différentes réservations de pièces faites par les clients sur le site ;
Pouvoir renseigner de nouvelles pièces lors de l’arrivée d’un véhicule ;
Accéder facilement aux informations importantes.

###Livrables attendus

Les livrables attendus sont : 
La solution packagée dans des conteneurs type Docker
La documentation contenant les procédures d’installation et de déploiement, le guide utilisateur et le guide administrateur.


###Solutions

Pour répondre à ces besoins, notre société modélisera un nouveau système d’information et fournira une application web permettant la gestion des stocks de l’entreprise. Nous savons précisément quelles solutions fonctionnelles et techniques mettre en place pour intégrer la société dans une optique de révolution digitale.

###Solutions fonctionnelles

Voici les fonctionnalités qui seront offertes par l’application :
Un système de création, modification et suppression de pièces.
Une possibilité de visualisation sur les stocks en fonction de différentes catégories.
Visualisation des réservations faites en ligne.
Possibilité de valider une réservation, ce qui entraînera une réduction du stock.
Possibilité de valider une sortie de pièces via une interface.

###Solution technique

D’un point de vue technique, nous proposons d'intégrer des technologies éprouvées, performantes et peu onéreuses :

Une base de données PostgreSQL pour la gestion et la manipulation des données. PostgreSQL est une base de données Open source.
Un serveur web Apache pour la délivrance des pages Web. Apache est le serveur le plus populaire et dispose de nombreux modules.
Le langage PHP pour la génération dynamique de pages web. PHP est un langage simple et rapide à mettre en œuvre avec des bibliothèques très fournies et une très grande communauté.
Docker pour le packaging de l'application dans un environnement maîtrisé et cloisonné.

###Livrables

Récup Auto ayant pour but de mettre en place un système de gestion des stocks, nous proposerons une machine "clefs en main" avec l’ensemble des composants déjà installés.
Lors des mises à jour, l’administrateur du système devra suivre la procédure suivante :

Stopper les services
docker-compose down
Télécharger les mises à jour
git pull
Redémarrer les services
docker-compose up
