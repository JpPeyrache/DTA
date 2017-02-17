#!/usr/bin/python
# coding: utf-8

from sense_hat import SenseHat

sense = SenseHat()

while True:
    temp = sense.get_temperature()
    print(temp)
    couleur = [(0, 255, 0) if i < temp else (0, 0, 0) for i in range(64)]
    sense.set_pixels(couleur)
