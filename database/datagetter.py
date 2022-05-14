import csv

rows = []

def importData(filename): 
    file = open(filename)
    csvreader = csv.reader(file)
    next(csvreader)

    for row in csvreader: 
        rows.append(row)

    file.close()

def writeToFile(filename):
    file = open(filename)

    for row in rows: 
        counter = 0
        for elem in row: 
            if (counter == 0): #restaurantID

            if (counter == 1): #restaurant name

            if (counter == 2): #country


importData("restaurantsDataset.csv")