from urllib.request import urlopen, hashlib
import itertools
import sys

salt = "ort12"
password = "bluefire2"
# password = "blue29"
sha1hash = hashlib.sha1(bytes(salt + password, 'utf-8')).hexdigest()

# for i in range(1, 8):
#     for j in map(''.join, itertools.product('abcdefghijklmnopqrstuvwxyz1234567890', repeat=i)):
#         hashedGuess = hashlib.sha1(bytes(salt + j, 'utf-8')).hexdigest()
#         if hashedGuess == sha1hash:
#             print("The password is ", str(j))
#             quit()

LIST_OF_COMMON_PASSWORDS = str(urlopen('https://raw.githubusercontent.com/danielmiessler/SecLists/master/Passwords/xato-net-10-million-passwords.txt').read(), 'utf-8')

for guess in LIST_OF_COMMON_PASSWORDS.split('\n'):
    hashedGuess = hashlib.sha1(bytes(salt + guess, 'utf-8')).hexdigest()
    if guess.find("bluefire2") == 0:
        print(guess)
        print(hashedGuess)
        print(sha1hash)
        print(salt + guess)
        sys.stdout.flush()

    if hashedGuess == sha1hash:
        print("The password is ", str(guess))
        quit()

print("Password not in database, we'll get them next time.")