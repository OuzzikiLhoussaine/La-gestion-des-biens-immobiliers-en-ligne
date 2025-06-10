# 🏠 La gestion des biens immobiliers en ligne

Ce projet est un site web dynamique conçu pour faciliter la **vente, l'achat et la location de biens immobiliers** (villas, appartements, etc.) au Maroc. Il a été réalisé dans le cadre d’un projet de fin d’études (PFE) à la Faculté Polydisciplinaire de Ouarzazate, Université Ibn Zohr.

---

## 📌 Objectif du projet

Permettre aux utilisateurs :
- D’explorer et rechercher des biens immobiliers selon leurs critères (type, localisation, etc.)
- De publier leurs annonces avec images, description, vidéos et coordonnées
- De localiser les biens via **Google Maps**
- D’interagir via un système de messagerie ou formulaire de contact
- D’administrer les contenus via une interface dédiée (utilisateurs, annonces, etc.)

---

## 🛠️ Technologies utilisées

- **Front-end :**
  - HTML
  - CSS / Bootstrap
  - JavaScript

- **Back-end :**
  - PHP
  - SQL / PhpMyAdmin

- **Outils de développement :**
  - Visual Studio Code
  - XAMPP (Apache + MySQL)
 

---

## 📋 Fonctionnalités principales

### 👤 Utilisateur (acheteur ou vendeur) :
- Inscription / Connexion
- Publication de biens (villas, appartements)
- Consultation des annonces détaillées
- Modification de ses propres annonces
- Accès à son tableau de bord et profil

### 🛠️ Administrateur :
- Gestion des utilisateurs
- Gestion des annonces (valider, supprimer, modifier)
- Accès aux statistiques globales

---

## 🚀 Comment exécuter le projet avec XAMPP

1. **Télécharger et installer XAMPP**  
   https://www.apachefriends.org/index.html

2. **Cloner ce dépôt ou copier les fichiers** dans le dossier suivant :
   ```bash
   C:\xampp\htdocs\
   ```
   Exemple :  
   ```bash
   C:\xampp\htdocs\gestion-immobiliere\
   ```

3. **Importer la base de données :**
   - Ouvrir PhpMyAdmin via `http://localhost/phpmyadmin`
   - Créer une nouvelle base de données (`estateagency`)
   - Importer le fichier `.sql` fourni dans le dépôt (le fichier doit se trouver dans le dossier du projet)

4. **Lancer les services Apache et MySQL** depuis le panneau de contrôle XAMPP

5. **Accéder au projet via votre navigateur :**  
   ```bash
   http://localhost/gestion-immobiliere/
   ```

6. **Utiliser les interfaces :**
   - Créer un compte utilisateur ou se connecter si vous avez déjà un compte
   - Utiliser l’interface d’administration via `/admin` (par exemple)

---

## 🔗 Dépôt GitHub

[Voir le code source du projet](https://github.com/OuzzikiLhoussaine/La-gestion-des-biens-immobiliers-en-ligne.git)
