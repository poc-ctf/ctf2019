# Połamaniec

## Name
Połamaniec

## Category
Other

## Points
50

## Flag
scs2019{d79eeec0fb9117de4749db3ecdba4bfb167fe70c}

## Description
Znajdź hasło
```python
@route("/flag/<encoded_password>", method="GET")
def show_flag(encoded_password):
    password = base64.b64decode(encoded_password)
    regex = r"""^([a-z][\d][!#$%&'*+\-/=?^][_{|}~]+)("?=[1-3][^"\\])(\\[1-3]+"\.\.?[a-z]{5}[A-Z][\d][!#$%&]{2}['*+\-][/=?^_][{|}~]{3})("[1-3]{2,4}[^"\\])(\\[1-3]+"@-[a-zA-Z\d\-]+-\.+[a-zA-Z]{2,})(\[25[0-5])(2[0-4]\d[01]?\d?\d{4})([a-zA-Z\d\-]*[a-zA-Z\d])(:[1-3][^\\\[\]])(\\\[1-3\]\])"""
    r = re.compile(regex)

    if r.match(password):
        return Settings.get_flag()
    return "nothing happen"
```

## Solution
1. Wystarczy znaleźć rozwiązanie regexpa.
2. Hasłem może być: a1!_=11\1".aaaaaA1!!'/{{{"111\1"@-a-.aa[2502001111a:11\[1-3]]

## Created by
Mateusz Górny