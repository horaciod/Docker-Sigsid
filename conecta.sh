#!/bin/bash

docker exec -it  -e PGPASSWORD=ache  sid21-db12  /usr/bin/psql -Upostgres  -hlocalhost $1 $2 $3 
