#!/usr/bin/python
# coding: utf-8

from sense_hat import SenseHat

sense = SenseHat()
sense.clear()


while True:
    temp = sense.get_temperature()
    print(temp)
    for x in range(0, 8):
        for y in range(0, 8):
            if temp > (8 * x + y):
                sense.set_pixel(x, y, 255, 0, 0)
            else:
                sense.set_pixel(x, y, 0, 0, 0)
