#!/bin/sh

set -e

echo "\n\n[task] Building production Docker image\n"

# Setup build environment
pushd `dirname $0`/..
./yii app/version
source .env

# Build assets
##### sh build/assets.sh


echo "\n\n[operation] Start Docker build\n"
# Build cli (source-code) and php-fom image
docker build -f Dockerfile -t ${APP_ID}:cli .
echo "\nDocker image '${APP_ID}:cli' (development, data) built and tagged.\n"
docker build -f Dockerfile-fpm -t ${APP_ID}:fpm .
echo "\nDocker image '${APP_ID}:fpm' (production) built and tagged.\n"

# Start production image
###docker-compose -f build/stack/production.yml -p ${APP_ID} up -d

popd