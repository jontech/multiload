FROM php:8.2-cli
VOLUME /srv
WORKDIR /srv

CMD [ "php", "./run.php" ]
