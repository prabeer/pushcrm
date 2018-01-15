# -*- coding: utf-8 -*-
"""
Created on Thu Nov 16 11:53:59 2017

@author: harsh.arora
"""

from pymongo import MongoClient
import mysql.connector
from mysql.connector import errorcode



connection = MongoClient() 
db = connection.userdb


def getMessageAuthor():
    author_id = []
    # get a list of ids and author_ids for every message
    for author in db.TABLE.find():
        author_id.append( (author['package']))
    # iterate through every author_ids to find the corresponding username
    for package, item in enumerate(author_id):
        message = db.TABLE.find_one({"pkg_name": package})
        author = db.APPMONITOR.find_one({"pkg_name": item}, {"imei": 1,"_id":0})
#        merged = dict(chain((message.items() + author.items())))
        db.tempp.insert(author)
        print(author)
        
        
        
getMessageAuthor()


try:
  cnx = mysql.connector.connect(user='root', password='',
                              host='127.0.0.1',
                              database='filter')
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
 
cursor = cnx.cursor(buffered=True) 

query = ("SELECT s_no FROM category_filters "
         "WHERE filter_name = 'Travel' ")
sql = "insert imei_filter_map set `imei` = {} " 

pra_query = "insert imei_filter_map set 'filter_id' = {} "

collection = db.tempp 

for i in collection.find(): 
   cursor.execute(sql.format(int(i["imei"]))) 
   
   print("Number of affected rows: {}".format(cursor.rowcount)) 
   
 
cursor.execute(query) 

pra = cursor.fetchall()
print (pra)
   
for i in pra:
    cursor.execute(pra_query.format(int(i["filter_id"]))) 

   

db.drop_collection('tempp')

cnx.commit() 
cursor.close() 
cnx.close() 
db.close() 





