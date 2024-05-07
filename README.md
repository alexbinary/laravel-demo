# Install

Générer l'image Docker pour le dev

    docker build . -t app_dev

Reconstruire la DB + données de tests

    docker run --rm -it -v .:/app app_dev php artisan migrate:fresh --seed
    
Lier les fichiers publics :

    docker run --rm -it -v .:/app app_dev php artisan storage:link
    
Lancer le serveur back :

    docker run --rm -it -v .:/app -p 8000:8000 -p 5173:5173 --name app_dev_server app_dev php artisan serve --host=0.0.0.0

Lancer le serveur front :

    docker exec -it app_dev_server npm run dev

Lancer la compilation tailwind :

    docker exec -it app_dev_server npx tailwindcss -i ./resources/css/app.in.css -o ./resources/css/app.css --watch
    

# Commandes utiles

Lister les routes :

    docker run --rm -it -v .:/app app_dev php artisan route:list --except-vendor


# Autres commandes

Lancer une commande dans l'image Docker de dev :

    docker run --rm -it -v .:/app app_dev CMD ARGS
    # multiple commands
    docker run --rm -it -v .:/app app_dev sh -c "CMD1 ARGS && CMD2 ARGS"

Lancer une commande dans le conteneur du serveur de dev en éxécution :

    docker exec -it app_dev_server CMD ARGS

