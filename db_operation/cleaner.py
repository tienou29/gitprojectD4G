import csv
#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

def search(target,item):
    for line in target:
        for element in line:
            if element == item:
                print(line)


# opening the CSV file
def cmpt_ligne(line):
    r=0
    for i in range(len(line)):
        r=r+len(line[0])
    return (r)
Categorie=[]
Incontournable=[]
nb_ligne=0
filename='source/Plus-Automaton-11-2021-bis.csv'
with open(filename, mode ='r')as file:
  # reading the CSV file
  csvFile = csv.reader(file)
  # displaying the contents of the CSV file
  for lines in csvFile:
      if cmpt_ligne(lines) != 0:#ligne non vide ????
          #print(lines)
          nb_ligne=nb_ligne+1
          tmp=lines[0]
          #tmp=lines[1]
          if tmp not in Categorie:
              Categorie.append(tmp)
          if "INCONTOURNABLE" in lines:
              Incontournable.append(lines)
print("\n####################################################################################\n")
print("nombre de ligne total    :"+str(nb_ligne))
print("nombre de incontournable :"+ str(len(Incontournable)))

#STRATEGIE ==> 4
#SPECIFICATIONS ==> 5
#UX/UI ==> 12
#CONTENUS ==> 4
#ARCHITECTURE ==> 3
#FRONTEND ==> 5
#BACKEND ==> 4
#HEBERGEMENT ==> 6


Sous_categorie={}
for i in (Incontournable):
    tmp=i[0]
    #tmp=i[1]
    if not(tmp in Sous_categorie):
        Sous_categorie[tmp]=1
    else:
        Sous_categorie[tmp]=Sous_categorie[tmp]+1

#veriifcation
somme=0
print(Sous_categorie)
for i in range(len(Sous_categorie)):
    somme=somme+Sous_categorie[Categorie[i+1]]

#print(somme)
for i in Sous_categorie:
    print(i + " ==> "+str(Sous_categorie[i]))
print("\n\n")

#print(str(Sous_categorie['STRATEGIE']))

#search(Incontournable,"java")



### save DATA
# field names
fields = ['ID',
'Famille Origine',
'ID-base',
'Planet',
'People',
'prosperity',
'RECOMMANDATION',
'CRITERES',
'JUSTIFICATIONS',
'Etape Cycle de Vie',
'TEST 1.1.1',
'TEST 1.1.2',
'TEST 1.1.3',
'CORRESPONDANCE',
'Lien',
'Type',
'Difficulté de mise en oeuvre',
'Objectif ODD couverts par la recommandation',
'incontournables',
'Tags Opérationnel',
'Acteurs',
'Indicateurs',
'X Indicateurs',
'Y Indicateurs',
'Priorité',
'Récurrence',
'Use Case',
'Exemple',
'Limites',
'Automatisable',
'Automatisation',
'Automatisation Level',
'Automatisation Informations']


fields = list(map(lambda a: a.lower(), fields))#format en tête

# data rows of csv file
cmp=0
rows=[]
for ligne in Incontournable:
    rows.append([cmp]+ligne)
    cmp=cmp+1


#verification
base=len(fields)
for i in rows:
    if len(i)!=base:
        print("error")
        print(len(i))
print(len(fields))
print(fields)
print(len(rows[0]))
print(rows[0])
# name of csv file
filename = "output/cleaned_data.csv"

# writing to csv file
with open(filename, 'w') as csvfile:
    # creating a csv writer object
    csvwriter = csv.writer(csvfile)

    # writing the fields
    csvwriter.writerow(fields)

    # writing the data rows
    csvwriter.writerows(rows)
