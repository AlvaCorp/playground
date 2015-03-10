#!/bin/sh
set -e

# Setup build environment
pushd `dirname $0`/..
./yii app/version
source .env

echo "\n\n[task] Running test suites\n"
echo "NOTE: If the acceptance test fail, try again after a few seconds, since the test stack may need some time to be started.\n"

#docker-compose -f build/stack/test.yml -p ${APP_ID} up
docker-compose -f build/stack/test.yml -p ${APP_ID} run testcli codecept run
