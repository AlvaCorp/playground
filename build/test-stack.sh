#!/bin/sh
set -e

echo "\n\n[task] Initializing test stack\n"

# Setup build environment
pushd `dirname $0`/..
./yii app/version
source .env

sh build/images.sh

#docker-compose -f build/stack/test.yml -p ${APP_ID} build testweb
#docker-compose -f build/stack/test.yml -p ${APP_ID} up -d testweb

docker-compose -f build/stack/test.yml run testcli codecept build

echo "\nTest stack up, run test suites with:"
echo "\n  sh build/test.sh\n"