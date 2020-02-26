#!/bin/bash
docker-compose exec parser_php composer install
docker-compose exec parser_php php src/init.php app:crawler https://www.stadiumgoods.com/adidas