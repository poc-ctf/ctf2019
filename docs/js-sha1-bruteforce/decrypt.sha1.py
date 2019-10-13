from urllib.request import urlopen, hashlib
import itertools
import sys

salt = "bluefire2"
password = "mnil5qp"
sha1hash = hashlib.sha1(bytes(salt + password, 'utf-8')).hexdigest()

for i in range(4, 8):
    print("Sprawdzamy hasło dla długości: %d" % i)
    sys.stdout.flush()
    for j in map(''.join, itertools.product('abcdefghijklmnopqrstuvwxyz0123456789', repeat=i)):
        hashedGuess = hashlib.sha1(bytes(salt + j, 'utf-8')).hexdigest()
        if hashedGuess == sha1hash:
            print("The password is ", str(j))
            quit()

print("Password not in database, we'll get them next time.")