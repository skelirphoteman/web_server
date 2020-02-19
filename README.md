# Serveur web sous docker, php, mysql et nginx

## French version :

### 1) clone 

Premièrement il faut télécharger les fichiers 

```
git clone https://github.com/skelirphoteman/web_server
```

### 2) Variable d'environement mysql

Deuxièmement il faut que vous modifié les variables d'environement correspondant à mysql. Il se situe dans le fichier `.env`

### 3) Docker compose

Pour finir lancer un `docker-compose up --build` pour charger les fichier necessaire.

### 4) Conclusion 

Voila ! Vous avez maintenant un espace de travaille pour vos projet php/mysql. Situez vos projet dans le dossier 'www/' .
Rendez-vous sur `localhost:8888` pour visualisé vos pages (On utilise le port 8888); 