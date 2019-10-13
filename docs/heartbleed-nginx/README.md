# Heartbleed

## Description
Posłanka poprosiła o zrobienie strony kogoś, ale zrobiono ją około 2012 lub 2013 roku. Boimy się, że może zawierać pewne zagrożenia.
Sprawdź stronę i zobacz czy da się wyciągnąć hasło. Co kilka sekund jest wysyłany request przez admina z hasłem. Może uda Ci się do niego dobrać. 

## Solution
python docs/heartbleed-nginx/solution/heartbleed-poc.py localhost -p 443 | head -60

## Created by
* Mateusz Górny.