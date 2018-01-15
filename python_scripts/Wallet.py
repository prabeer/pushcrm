# -*- coding: utf-8 -*-
"""
Created on Mon Nov 27 12:02:43 2017

@author: harsh.arora
"""

from pymongo import MongoClient
import mysql.connector
from mysql.connector import errorcode

#from pprint import pprint

connection = MongoClient("mongodb://10.85.28.47:27017") 
db = connection.userdb


#tags = db.APPMONITOR.find({"pkg_name": "com.whatsapp" },{ "imei": 1,"_id":0})
"""
tags = db.WALLET.insert_many([{ "package": "net.one97.paytm", "category": "Wallet" },
                             {"package": "com.phonepe.app", "category": "Wallet"},
                             {"package": "com.sc.scbupi", "category": "Wallet"}]) ;


"""

try:
    cnx = mysql.connector.connect(user='camp_mgmt', password='campmgmt',
                              host='10.85.28.49',
                              database='camp_mgmt_db')
except mysql.connector.Error as err:
  if err.errno == errorcode.ER_ACCESS_DENIED_ERROR:
    print("Something is wrong with your user name or password")
  elif err.errno == errorcode.ER_BAD_DB_ERROR:
    print("Database does not exist")
  else:
    print(err)
else:
    print ("connection established")
    
#  cnx.close()
 
curA = cnx.cursor(buffered=True)
curB = cnx.cursor(buffered=True)

query = ("SELECT s_no FROM category_filters "
         "WHERE upper(filter_name) = upper('Wallet') ")
Insertquery = ("INSERT INTO imei_filter_map (imei, filter_id) VALUES (%s, %s)")

curA.execute(query)
id_a = ""
for (s_no) in curA:
    id_a = s_no[0]
print(id_a)
if id_a != "": 
	coll = db.WALLET
	searchcoll = db.PACKAGE
	for c in coll.find():
	#	print(c['package'])
		for sc in searchcoll.distinct("imei",{"PkgName": c['package']}):
			curB.execute(Insertquery,(str(sc), str(id_a)))
		print("Number of affected rows: {}".format(curB.rowcount)) 

cnx.commit()
curA.close() 
curB.close()
cnx.close() 

