#!/bin/bash
set -e

echo "Deployment started ..."

php vendor/bin/envoy run deploy --branch=main --cleanup

echo "Deployment finished!"