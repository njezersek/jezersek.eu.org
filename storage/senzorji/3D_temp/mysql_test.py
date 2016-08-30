import serial
import time
import math
import mysql.connector
from mysql.connector import Error


# method for temperature calculation from thermistor: original MicroC code for Arduino
#double Thermistor(int RawADC) {
# double Temp;
 #Temp = log(10000.0*((1024.0/RawADC-1))); 
#//         =log(10000.0/(1024.0/RawADC-1)) // for pull-up configuration
# Temp = 1 / (0.001129148 + (0.000234125 + (0.0000000876741 * Temp * Temp ))* Temp );
# Temp = Temp - 273.15;            // Convert Kelvin to Celcius
# Temp = (Temp * 9.0)/ 5.0 + 32.0; // Convert Celcius to Fahrenheit
# return Temp;
#}

testString = "b'S0000;0492;0499;0498;0492;0492;0493;\rS0001;0490;0490;0505;0497;0502;0506;\rS0002;0495;0500;0501;0489;0495;0494;\rS0003;0498;0487;0496;0485;0497;0506;\rS0004;0494;0497;0495;0494;0493;0488;\rS0005;0499;0492;0495;0497;0489;0504;\rS0006;0490;0489;0484;0485;0490;0492;\rS0007;0490;0497;0498;0494;0492;0490;\rS0008;0492;0492;0495;0490;0492;0490;\rS0009;0486;0493;0489;0491;0491;0488;\rS0010;0496;0492;0492;0496;0496;0486;\rS0011;0495;0494;0490;0498;0493;0496;\r\n'"
vrstica = ""

def connect():
    try:
        global conn
        conn = mysql.connector.connect(host='localhost',database='senzorji',user='root',password='tapir123')
        if conn.is_connected():
            print('Connected to database')
            return True
        else:
            print('Not connected to database')
            return False
            
    except Error as e:
        print(e)
        return False


def closeConnection():
    conn.close()
    print('Connection closed')

    
def returnTemperature(RawADC):
    temp = math.log1p(10000.0*((1024.0/RawADC-1)))
    temp = 1 / (0.001129148 + (0.000234125 + (0.0000000876741 * temp * temp ))* temp )
    temp = temp - 273.15
    return temp  


def insertSensorData(sensor, temperature):
    query = "INSERT INTO meritev (id_senzorja, temperatura, cas) " \
            " VALUES (%s, %s, now())"
    args = (sensor, temperature)

    try:
        cursor = conn.cursor()
        cursor.execute(query, args)

        #if cursor.lastrowid:
        #    print('Zapis dodan', cursor.lastrowid)
        #else:
        #    print('Zapis ni dodan')

        #conn.commit()            
            
    except Error as e:
        print(e)
        print('Zapis ni dodan')
        

def parseLine(line):
    #print(line.find('S'))
    line = line[line.find('S'):len(line)]  # odvrže vse do prvega senzorja
    #print(line)

    connect()
    while ((line.find('S')>=0) and (len(line)>2)): # za vse senzorje
        sensor = line[1:5]
        #print("senzorsko mesto "+sensor)
        line = line[6:len(line)]
        sensorLine = line[0:line.find('S')]
        counter = 1
        while len(sensorLine)>2:   # meritve za posamezno senzorsko mesto
            meritev = sensorLine[0:4]
            temperature = returnTemperature(int(meritev))
            #sensorID = 2000+int(sensor)*6+counter
            sensorID = int(sensor)*6+counter            
            #print("meritev "+str(counter)+" "+meritev+" "+str(temperature)+" "+str(sensorID))
            sensorLine = sensorLine[5:len(sensorLine)]
            #print(sensorLine+"*"+str(len(sensorLine)))
            # insert into database

            insertSensorData(sensorID, temperature)

            counter = counter + 1
        line = line[line.find('S'):len(line)]
        #print("vrstica")
    #print("parse line")
    conn.commit()         
    closeConnection()
      

ser = serial.Serial('COM17')         # open serial port
#print(ser.name)                      # check which port was really used

#connect()
#parseLine(testString)
#closeConnection()

while True:
    vrstica = str(ser.readline())             # reads buffer until \n
    vrstica = vrstica.replace('\\r', '')
    vrstica = vrstica.replace('\\n', '')
    #print(vrstica)
    parseLine(vrstica)
    time.sleep(1)    # pause for 1 s
    ser.flushInput()
    #print(vrstica.find(";"))
    #print(time.localtime())
    #print(Temperatura(508))

ser.close()

#testSerial()    
