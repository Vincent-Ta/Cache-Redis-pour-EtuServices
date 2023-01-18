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

if(r.get(email)==None):
    r.set(email, 1)
else : 
    if(r.get(email) < 10):
        r.incr(email)
    else : 
        print("trop de connexion en 10min")


