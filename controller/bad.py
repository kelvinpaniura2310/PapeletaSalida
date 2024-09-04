import sys
from time import sleep
import time
from termcolor import colored

def print_lyrics():
    lines = [
        ("Lo siento, mi amor,", "cyan", 0.08),
        ("solo me di mi lugar", "blue", 0.08),
        ("Busca otro corazón", "green", 0.07),
        ("con el que jugar", "yellow", 0.08),
        ("A ti fui religioso,", "magenta", 0.08),
        ("yo te adoré", "red", 0.08),
        ("La luna sabe", "white", 0.09),
        ("lo que por ti lloré", "cyan", 0.08),
        ("Cuando estaba triste", "yellow", 0.08),
        ("Y tú nunca viniste", "green", 0.07),
        ("Pero normal, normal", "red", 0.08),
        ("Tranquila que de ti,", "magenta", 0.09),
        ("yo no voy hablar mal", "blue", 0.08),
        ("Te puedo perdonar,", "cyan", 0.07),
        ("pero nunca olvidar", "white", 0.09),
        ("No me hables bonito,", "yellow", 0.08),
        ("vuelve y repito", "green", 0.08)
    ]

    delays = [1.0, 0.8, 0.9, 0.8, 1.0, 0.9, 1.2, 0.8, 
              0.7, 0.6, 1.0, 0.9, 0.8, 0.7, 1.1, 0.9, 3]

    for i, (line, color, char_delay) in enumerate(lines):
        for char in line:
            print(colored(char, color), end='', flush=True)
            sleep(char_delay)
        print('') 
        time.sleep(delays[i])

print_lyrics()
