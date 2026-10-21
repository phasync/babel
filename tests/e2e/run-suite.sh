#!/bin/sh
# Usage: tests/e2e/run-suite.sh <project dir> <plain|hooked|classes> <out dir> [extra test runner args]
# Runs the project's vendor/bin/pest (or phpunit) with a JUnit log; hooked/classes runs prepend boot.php to
# the test runner and to every PHP process the tests start through SWERVE_PHP_ARGS.
set -u
proj=$1; mode=$2; out=$3; shift 3
here=$(cd "$(dirname "$0")" && pwd)
mkdir -p "$out"
runner=vendor/bin/pest; [ -x "$proj/$runner" ] || runner=vendor/bin/phpunit
args=""
if [ "$mode" != plain ]; then
    args="-d auto_prepend_file=$here/boot.php"
    export E2E_COUNTS="$out/counts.jsonl"
    rm -f "$E2E_COUNTS"
    [ "$mode" = classes ] && export E2E_CLASSES=1
    export SWERVE_PHP_ARGS="${SWERVE_PHP_ARGS:-} $args"
fi
cd "$proj"
start=$(date +%s.%N)
php $args $runner --colors=never --log-junit "$out/junit.xml" "$@" > "$out/stdout.txt" 2>&1
rc=$?
end=$(date +%s.%N)
echo "rc=$rc seconds=$(echo "$end - $start" | bc)" > "$out/result.txt"
cat "$out/result.txt"
