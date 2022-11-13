import csv
import redis
import json
# initialisation de la connection avec la bdd redis
#service redis-server stop
#service redis-server start
#redis-cli -a d4gpassword pour edité en local
#KEYS * pour affichier toute les clef
#https://www.tutorialspoint.com/redis/redis_hashes.htm
#HGETALL <id> pour accedé a tout les fields et values
#https://github.com/redis-developer/redis-php-getting-started/blob/main/README.md

h='redis-14012.c2.eu-west-1-3.ec2.cloud.redislabs.com'
p='14012'
pwd='0t4Hg0ju4ZcmzP8hRmGIENEBR5G6QnFX'

h1='45.91.168.241'
p1='6379'
pwd1='d4gpassword'

r = redis.Redis(host=h, port=p,password=pwd)

test =1
if test:
    r.set('hello', 'world')
    print(r.get('hello'))
    print("test passed")

filename = "output/cleaned_data.csv"#recupere le fichier data netoyer avec les champs selectionné prealablement
cmpt=0
with open(filename, mode ='r')as file:
  # reading the CSV file
  csvFile = csv.reader(file)
  redis_line=[]
  for line in csvFile:
      if cmpt==0:
          fields=line#isole les fiels en fonction de la donnée d'entrée
          if len(fields)!=len(line):print("error data uncomplete")#verifie la consistance des données
          cmpt=cmpt+1

      else:
          cmpt1=1
          print("send data .....  id :"+line[0])
          for i in line[1:]:
              #ajout de tout les fiels avec les sous-cle
              r.hset(line[0], fields[cmpt1], i)
              cmpt1=cmpt1+1
