# -*- coding: utf-8 -*-
"""
Created on Mon Nov 27 11:24:38 2017

@author: harsh.arora
"""

from pymongo import MongoClient

#from pprint import pprint

connection = MongoClient() 
db = connection.userdb


#tags = db.APPMONITOR.find({"pkg_name": "com.whatsapp" },{ "imei": 1,"_id":0})
"""
tags = db.FOOD.insert_many([{ "package": "com.Dominos", "category": "Food" },
                             {"package": "com.application.zomato", "category": "Food"},
                             {"package": "com.bigbasket.mobileapp", "category": "Food"}]) ;


"""

def getMessageAuthor():
    author_id = []
    # get a list of ids and author_ids for every message
    for author in db.FOOD.find():
        author_id.append( (author['package']))
    # iterate through every author_ids to find the corresponding username
    for package, item in enumerate(author_id):
        message = db.TABLE.find_one({"pkg_name": package})
        author = db.APPMONITOR.find_one({"pkg_name": item}, {"imei": 1})
#        merged = dict(chain((message.items() + author.items())))
        print(author)
        
        
        
getMessageAuthor()
        


collection = db.collection_names() # script for checking collections in MongoD

print(collection) # Print collectins
