#!/bin/bash
set -e


php vendor/bin/envoy run deploy --branch=main --cleanup

