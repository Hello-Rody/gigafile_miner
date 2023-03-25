import requests
from random import choice

lower = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l",
         "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"]
upper = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L",
         "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"]
num = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"]


def rand_str(l):
    random_string = ""
    for lengh in range(l):
        one = choice(lower + upper + num)
        random_string += one
    return random_string


url = "https://xgf.nu/"

try:
    while True:
        string = rand_str(4)
        true_url = url + string
        get = requests.get(true_url)
        get_url = get.url
        print("\r[+]checking... [ " + string + " ]", end="")
        if len(get_url) > 30:
            print("\r[+]collect!! --> " + get_url)
except KeyboardInterrupt:
    print("\nbye")
