# Hacker hacked v2

## Name
Hacker hacked v2

## Category
Web

## Points
20

## Flag
scs2019{aaedabce34860e28bd5f5ad35ba902db3745d29a}

## Description
Strona jednego z posłów wydaje się zawierać dziurę w walidacji hasła. Hasło jest walidowane po stronie frontendu. Sprawdź czy tak jest rzeczywiście. Problemem jest tutaj `salt`, ale nie powinno to być przeszkodą przy brutalnych metodach. Jedyne co wiemy to hasło jest wyjątkowo słabe. Zawiera tylko małe litery oraz cyfry.

## Solution
1. W tym wypadku należy zrobić bruteforce na sha1


## Created by
* Mateusz Górny.