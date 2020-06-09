import csv
import random

file = open('test.txt', encoding='utf-8')
reader = csv.reader(file, delimiter='\t')
fichier = open("test2.txt", "wt", encoding='utf-8')
ecrivainCSV = csv.writer(fichier)
item_id = 1
for ligne in reader:
    price = random.randint(100, 10000)
    ecrivainCSV.writerow([
        f"INSERT INTO item (item_id, name, type, sub_type, size, level, price) VALUES ({item_id}, '{ligne[1]}', {ligne[2]}, {ligne[3]}, {ligne[4]}, {price}, {ligne[7]});"
    ])
    item_id += 1
file.close()


fichier.close()
