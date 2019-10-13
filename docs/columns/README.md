# Dziwne znaki

## Name
Dziwne znaki

## Category
Crypto

## Points
1

## Flag
scs2019{20c2cf24390e242677236c46883f455e6742da77}

## Description
Nasz zespół odkrył dziwne wiadomości wysyłane przez użytkowników. Wiemy, że przesyłają do siebie hasło. Spróbuj je znaleźć.

## Solution
echo 'e 17fscs20c 8b44b eb098 319{   ef92 9a3 fc5 520c2 54e9c5 fee b8a c  f2ca9d 70 43ee440439 0 632 12a f 281 e 2 41 ebfaa7b  4a9726 77f4 79 66e 2 0ad 23 61 f96d 8cc d43fc 4682 2cf 1 92eb11783f45e 396e 8636206 5 e 65 28ab 17 33 f6 742 7 3308a af1 72ada77}bf 32 0 5c' | sed -r 's/(.{5})/\1\n/g' | tail -n +2 | awk 'NR%4==1' | tr -d ' ' | tr -d '\n'
Zadanie głównie polega na pocięciu łańcucha na ciągi 5-literowe, a następnie wybranie odpowiedniej kolumny. Jest to wariacja szyfru skytale - zamiast kolumny z jednej litery jest kolumna z pięciu.

## Todo

## Created by
* Mateusz Górny