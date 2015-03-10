#!/bin/bash

set -e

# create schema, disable with APP_ENABLE_AUTOMIGRATIONS=0
if [ "$APP_ENABLE_AUTOMIGRATIONS" != 0 ] ; then
  php /app/yii app/create-mysql-db $DB_ENV_MYSQL_DATABASE --interactive=0
  php /app/yii app/setup --interactive=0
fi
