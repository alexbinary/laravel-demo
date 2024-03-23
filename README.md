# Install

Générer l'image Docker pour le dev

    docker build . -t app_dev

Reconstruire la DB + données de tests

    docker run --rm -it -v .:/app app_dev php artisan migrate:fresh --seed
    
Lier les fichiers publics :

    docker run --rm -it -v .:/app app_dev php artisan storage:link
    
Lancer le serveur de dev :

    docker run --rm -it -v .:/app -p 8000:8000 --name app_dev_server app_dev php artisan serve --host=0.0.0.0 
    

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

