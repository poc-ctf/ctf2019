#!/bin/sh
url="https://web/Ustawa%20o%20przejeciu%20wladzy%20ver%205362.docx?281664193712344556765448888"
while true; do curl -k -X POST "$url" -d "url=$url" 1>/dev/null 2>&1; echo "Sent"; sleep 1; done
