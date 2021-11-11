# jason-expedition

## A propos du projet
Ce projet utilise :
- Symfony 5.3
- Bootstrap 5
- Chart.js

## Cloner le dépôt
1. git clone https://github.com/PatrickVongsa/jason-expedition.git

## Lancer le projet
1. Copier le fichier .env et le renommer .env.local
2. Remplacer db_user et db_password par vos identifiants MySQL
3. Remplacer db_name par jason-expedition
4. Dans le terminal, écrire les commandes suivantes :
   - composer install
   - yarn install
   - symfony console doctrine:database:create
   - symfony console doctrine:migrations:migrate
   - symfony console doctrine:fixtures:load
   - yarn dev
   - symfony server:start
5. Rendez-vous sur localhost:8000
