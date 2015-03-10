#!/bin/sh

set -e

# Setup build environment
pushd `dirname $0`/..
./yii app/version
source .env

sh build/images.sh

docker-compose -f build/stack/production.yml -p prod${APP_ID} up