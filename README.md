W katalogu challenges tworzymy katalog jako labelkę zadania. Tam wrzucamy całą konfigurację zadania. Tutaj powinien być zarówno Dockerfile jak i docker-compose do uruchomienia zadania. Docker-compose powinien być tak przygotowany, żeby wystarczyło uruchomić jedynie `docker-compose up`. 

W katalogu docs tworzymy taki sam katalog jak w challenges. Tutaj należy wrzucić README.md z opisem jak rozwiązać zadanie. W README powinno być również `description` jaki należy dodać na platformie do zadania. W docs można wrzucić również wszelkiego rodzaju skrypty, które pomogą rozwiązać zadanie.

Katalog `platform` nie ruszamy. Tutaj jest konfiguracja uruchomienia platformy, skrypty dns oraz inne rzeczy nie związane z zadaniami. 