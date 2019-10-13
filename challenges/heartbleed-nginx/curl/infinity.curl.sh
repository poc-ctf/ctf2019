#!/usr/bin/env sh

echo "start"

while :; do
  curl -s 'https://web/index.html?username=awd&password=awd' \
  -H 'Connection: keep-alive' \
  -H 'Sec-Fetch-Site: same-origin' \
  -H "Referer: https://web/index.html?username=&password=${FLAG}" \
  --compressed \
  --insecure > /dev/null

  sleep 1
done
