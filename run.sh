#!/bin/bash
docker-compose exec --workdir=/var/www/parser parser_php composer install
docker-compose exec --workdir=/var/www/parser parser_php php src/init.php app:crawler https://www.stadiumgoods.com/adidas