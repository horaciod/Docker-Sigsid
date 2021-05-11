#!/bin/bash

docker exec -e sigsidBD=siglocalv2 sigsid2021_webserver_1  php /var/www/html/sigsid/cli/cron.php $1 $2 $3 $4 $5 $6 


