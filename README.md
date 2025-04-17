# Cahier des Charges - SaaS Platform: Gym Minder

## Introduction
**Gym Minder** est une plateforme SaaS conçue pour aider les propriétaires de salles de sport à gérer efficacement leurs opérations. La plateforme offre des outils pour :
- Gestion des adhésions
- Suivi des présences
- Informations commerciales

---

## Caractéristiques et Structure de la Plateforme

### 1. Page d'Accueil (LP)
- Présentation de l'objectif et des fonctionnalités
- Affichage des avantages avec visuels et textes
- Boutons CTA (S'inscrire / Explorer)

### 2. Authentification des Propriétaires
**Page d'Inscription** :
- Création de compte propriétaire
- Champs requis :
  - Email
  - Mot de passe
  - Détails de l'entreprise

**Page de Connexion** :
- Fonctionnalité de connexion
- Lien "Mot de passe oublié" (réinitialisation par email)

**Processus Post-Connexion** :
- Compte actif → Redirection vers dashboard
- Compte inactif → Redirection vers page profil

### 3. Tableau de Bord Propriétaire
**Graphiques/Statistiques** :
- Membres actifs/inactifs
- Profits annuels/mensuels
- Tendances de présence

**Affichage** :
- Visualisations graphiques
- Cartes récapitulatives

### 4. Gestion des Membres
**Page Membre** :
- Tableau avec :
  - Nom, photo, mobile, email, âge, date d'inscription
- Fonctionnalités :
  - Édition des informations
  - Arrêt d'abonnement
  - Recherche AJAX
  - Voir payment status

**Page de Présence** :
- Tableau des membres
- Bouton "Voir" ouvrant un modal avec :
  - Calendrier de sélection
  - Marquage présence/absence

### 6. Profil Propriétaire
- Affichage/modification des informations
- Gestion des méthodes de paiement :
  - Manuel vs automatique
  - Historique des factures
  - Paiement manuel
  - Activation/désactivation paiements automatiques

### 7. Tableau de Bord Admin
**Statistiques Globales** :
- Nombre de propriétaires inscrits
- Revenus totaux/à venir
- Tendances d'inscription

**Gestion Propriétaires** :
- Tableau avec :
  - Nom, email, date d'inscription, statut
  - Historique paiements
- Option désactivation compte

**Visualisation** :
- Graphiques revenus/inscriptions
- Rapports mensuels/annuels

---

## User Stories

### Propriétaire de salle :
- [x] S'inscrire facilement
- [x] Voir les métriques clés
- [x] Gérer les membres (CRUD)
- [x] Notifications abonnements expirants
- [x] Gérer profil et préférences paiement

### Administrateur :
- [x] Voir statistiques globales
- [x] Visualiser revenus
- [x] Gérer comptes propriétaires
- [x] Générer rapports

---

## Livrables
| Type | Description |
|------|-------------|
| Cahier des Charges | User stories + besoins utilisateurs |
| Maquette | Design Figma |
| Conception | Architecture + diagrammes UML |
| Implémentation | Pages front-end (Tailwind CSS) |
| Gestion | Jira/Trello |

---

## Technologies
**Front-End**:
- Tailwind CSS
- HTML/JS/CSS

**Back-End**:
- Laravel
- PHP
- SQL

**Outils**:
- Figma (maquettes)
- Jira/Trello (gestion)
