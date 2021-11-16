# Société de transport - Gestion d'un réseau

## Introduction

La société TransVar est une société de transport de bus dans la région varoise créée en 1950. En 70 ans d'existence, ses besoins ont évolué et elle doit désormais faire face à un nombre d'utilisateurs et de lignes grandissant. Son système d'informations n'est pas totalement digitalisé.

Le contexte est donc le suivant : elle souhaite digitaliser et repenser son système d'informations pour éviter les problèmes de redondances et incohérences actuels et l'améliorer pour faire face à cette forte demande.

## Problématiques

Au vu de l'ancienneté de la société, son système d'information actuel est encore au format manuscrit et peu informatisé. Il augmente donc la charge de travail pour les employés de l'entreprise et le traitement des dossiers est problématique par sa durée de prise en charge, les pertes de dossier, la redondance et les incohérences dans les données. Il doit donc être repensé.

Plusieurs problématiques se posent donc aujourd'hui et voici les plus critiques :
* Comment gérer efficacement le réseau de transport de la société TransVar ?
* Comment faire face au recensement des utilisateurs toujours plus nombreux ?
* Comment gérer les différents types d'abonnements et tarifs ?
* Comment recenser un conducteur dans l'application ?
* Comment affecter le parcours d'une ligne à différentes stations ?
* Comment affecter un conducteur à un bus ?

## Besoins

Grâce aux problématiques décrites ci-dessus et aux informations données par l'entreprise lors de l'analyse de son SI, on peut en déduire les besoins principaux du système que nous allons mettre en place. Les voici :

* Un système de gestion avec une base de données complète, robuste et fonctionnelle couplé à une interface web pour gérer l'ensemble devra être mis en place ;
* Lors des inscriptions, pouvoir facilement inscrire un nouveau client en n'oubliant aucune information ;
* Pouvoir spécifier des abonnements avec une durée de validité et rattacher les usagers à ces abonnements en fonction des tranches d'âge ;
* ●	Lors du recrutement d'un conducteur, faire en sorte qu’il ne puisse pas également être un client puisqu’il bénéficie déjà d’une exclusivité sur tout le réseau ;
* Lors de la création (ou modification) d'une ligne, être capable de renseigner sa station de départ, son terminus ainsi que toutes les stations qu'elle devra desservir ;
* Lors de la création d'un conducteur, pouvoir l'affecter à un et un seul bus disponible (ou faire automatiquement cette affectation en cas de disponibilité).

## Solutions

Pour répondre à ces besoins, notre société modélisera un nouveau système d'information et fournira une application web permettant la gestion du réseau de transport. Nous savons précisément quelles solutions fonctionnelles et techniques mettre en place pour intégrer la société dans une optique de révolution digitale.

### Solutions fonctionnelles

Voici les fonctionnalités qui seront offertes par l'application :

* Un système de gestion des conducteurs avec la liaison à leur bus respectif ;
* Un système de gestion des bus permettant le parcours des différentes lignes ;
* Un système de gestion des clients abonnés au réseau de transport ;
* Un système de gestion des abonnements avec des tarifs différents en fonction de l'âge du client et une durée de validité ;
* Un système de gestion des lignes permettant de desservir l'ensemble des stations du réseau ;
* Un système de gestion des stations pouvant être desservies par une ou plusieurs lignes ;

### Solutions techniques

D'un point de vue technique, nous proposons d'intégrer des technologies éprouvées, performantes et peu onéreuses :

* Une base de données PostgreSQL pour la gestion et la manipulation des données. PostgreSQL est une base de données Open source.
* Un serveur web Apache pour la délivrance des pages Web. Apache est le serveur le plus populaire et dispose de nombreux modules.
* Le langage PHP pour la génération dynamique de pages web. PHP est un langage simple et rapide à mettre en œuvre  avec des bibliothèques très fournies et une très grande communauté.
* Docker pour le packaging de l'application dans un environnement maîtrisé et cloisonné.

## Livrables

TransVar souhaitant remplacer son système d'information actuel, nous proposerons une machine "clefs en main" avec l'ensemble des composants déjà installés.

Lors des mises à jour, l'administrateur du système devra suivre la procédure suivante :
* Stopper les services
```
docker-compose down
```
* Télécharger les mises à jour
```
git pull
```
* Redémarrer les services
```
docker-compose up
```