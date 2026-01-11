# 🎓 Portfolio – Decottignies Jérémy

Portfolio personnel réalisé dans le cadre de mes études en **BTS SIO** (Services Informatiques aux Organisations).  
Ce site présente mes **projets**, mon **parcours scolaire**, mes **expériences**, ainsi que mes **compétences techniques**.

---

## 🚀 Technologies utilisées

- **PHP 8**
- **Symfony 6**
- **Twig**
- **Doctrine ORM**
- **MySQL**
- **EasyAdmin** (back-office)
- **Bootstrap 5**
- **HTML / CSS / JavaScript**
- **Git / GitHub**

---

## 🧩 Fonctionnalités principales

- 🏠 Page d’accueil avec présentation
- 📁 Liste des projets avec page de détail
- 🛠️ Back-office sécurisé (`/admin`) pour gérer :
  - projets
  - expériences professionnelles
  - parcours scolaire
- 📧 Formulaire de contact avec envoi d’email
- 🔐 Authentification (connexion / déconnexion)
- 🌙 Mode sombre / clair
- 📱 Design responsive (mobile, tablette, desktop)

---

## 🔐 Accès administrateur

L’accès à l’administration est protégé par authentification.

- URL : `/admin`
- Accès réservé aux utilisateurs avec le rôle `ROLE_ADMIN`

---

## 🗂️ Installation en local

### 1️⃣ Cloner le projet

```bash
git clone https://github.com/TON-USERNAME/portfolio.git
cd portfolio
composer install
DATABASE_URL="mysql://user:password@127.0.0.1:3306/portfolio"
MAILER_DSN="smtp://localhost"
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
symfony serve
