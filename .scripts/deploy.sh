#!/bin/bash
set -e

echo "Deployment started ..."

php /vendor/bin/envoy run deploy

echo "Deployment finished!"