#!/usr/bin/env python
import redis
import sys
import subprocess

"""
arguments sensés êtres passés par le php

on vérifie si l utilisateur a le bon mdp et identifiant dans le php, ici on regarde juste cmb de fois l'utilisateur s'est connecté
"""
email = "user@gmail.com"


r = redis.Redis(decode_responses=True)


def connection():
    if(r.get(email)==None):
        r.set(email, 1)
        #expire permet de supprimer le fait que l'uitlisateur s'est deja connecte apres 600s 
        #ca nous permet de remettre à 0 ses connections
        r.expire(email, 600)
    else : 
        if(int(r.get(email)) < 10):
            r.incr(email)
        else : 
            print("trop de connexion en 10min")

    return int(r.get(email)) #retourne le nb de connections en 10min

def achat():
    if(r.get("achat" + email)==None):
        r.set("achat" + email, 1)
        r.expire("achat"+ email, 100)
    else : 
        if(int(r.get("achat"+ email)) < 10):
            r.incr("achat" + email)
        else : 
            print("trop d'achats en 10min")

    print(r.get("achat" + email) ) 


def vente():
    if(r.get("vente" + email)==None):
        r.set("vente" + email, 1)
        r.expire("vente"+ email, 100)
    else : 
        if(int(r.get("vente"+ email)) < 10):
            r.incr("vente" + email)
        else : 
            print("trop de vente en 10min")

    print(r.get("vente" + email) ) 



if __name__ == '__main__':
    connection()
    #achat()
    #vente()

