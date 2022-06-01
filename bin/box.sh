#!/bin/bash

wget https://github.com/box-project/box/releases/download/3.9.1/box.phar

composer install --no-dev --prefer-dist

php -d memory_limit=512M box.phar compile --no-parallel
