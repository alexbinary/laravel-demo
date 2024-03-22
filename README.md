Générer l'image Docker pour le dev

    docker build . -t app_dev

Lancer une commande dans l'image :

    docker run --rm -it -v .:/app app_dev CMD ARGS
    # multiple commands
    docker run --rm -it -v .:/app app_dev sh -c "CMD1 ARGS && CMD2 ARGS"

Lancer le serveur de dev :

    docker run --rm -it -v .:/app -p 8000:8000 --name app_dev_server app_dev php artisan serve --host=0.0.0.0 

Lancer une commande dans le serveur de dev en éxécution :

    docker exec -it app_dev_server CMD ARGS

Reconstruire la DB + données de tests

    docker run --rm -it -v .:/app app_dev php artisan migrate:fresh --seed