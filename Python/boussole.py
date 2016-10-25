#!/usr/bin/python
# coding: utf-8

from sense_hat import SenseHat

# position [ligne, colonne] des leds situées au bord de l'afficheur (matrice 8 x 8)
# dans le sens des aiguilles d'une montre de la led n°0 à la led n°28
led_contour = [[0,0],[1,0],[2,0],[3,0],[4,0],[5,0],[6,0],[7,0],[7,1],[7,2],[7,3],[7,4],[7,5],[7,6],[7,7],[6,7],[5,7],[4,7],[3,7],[2,7],[1,7],[0,7],[0,6],[0,5],[0,4],[0,3],[0,2],[0,1]]


# initialisation du Sense Hat
sense = SenseHat()
sense.clear()
sense.set_rotation(90) # orientation de la matrice de led du Sense Hat pour que la led [0,0] soit au nord

# calcul l'angle entre chaque led sachant qu'un cercle fait 360 °
degree_par_led = 360. / len(led_contour)

# initialisation des variables pour mémoriser la position de la led précédement allumée
prec_ligne = 0
prec_colonne = 0


# boucle principale
while True:
    # récupérer la valeur mesurée par le magnétomètre
    direction = sense.get_compass() # retourne un angle entre 0 et 360 °
    print("Magnétomètre > " + str(direction) + "°")

    # pour retrouver la position de la led, on divise la direction mesurée par l'angle d'une led
    led_index = int(direction / degree_par_led)

    # rechercher les coordonnées (ligne, colonne) de la led depuis le tableau du contour
    led = led_contour[led_index]
    colonne=led[0] # numéro de ligne
    ligne=led[1] # numéro de colonne

    # si une autre led était précédement allumée
    if ligne != prec_ligne or colonne != prec_colonne:
        # alors on l'etteind
        sense.set_pixel(prec_ligne, prec_colonne, 0, 0, 0)

    # allumée la bonne led
    sense.set_pixel(ligne, colonne, 0, 0, 255)

    # mémoriser les coordonnées de la led allumée pour la boucle suivante
    prec_ligne = ligne
    prec_colonne = colonne
