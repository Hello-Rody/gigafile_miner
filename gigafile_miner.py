import requests
import random

lower = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l",
         "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"]
upper = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L",
         "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"]
num = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"]


def rand_str(l):
    random_string = ""
    for lengh in range(l):
        one = random.choice(lower + upper + num)
        random_string += one
    return random_string


url = "https://xgf.nu/"

try:
    while True:
        rand_num = random.randint(4, 5)
        string = rand_str(rand_num)
        new_url = url + string
        print("\r[+] checking... [ " + string + " ] ", end=" ")
        get = requests.get(new_url, timeout=6)
        get_url = get.url
        if len(get_url) > 30:
            print("\r[+] collect!! --> " + new_url)
except KeyboardInterrupt:
    print("\nbye")
