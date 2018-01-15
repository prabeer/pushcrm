# -*- coding: utf-8 -*-
"""
Created on Wed Nov 15 12:39:15 2017

@author: harsh.arora
"""

from pymongo import MongoClient

#from pprint import pprint

connection = MongoClient() 
db = connection.userdb


#tags = db.APPMONITOR.find({"pkg_name": "com.whatsapp" },{ "imei": 1,"_id":0})
"""
tags = db.SHOP.insert_many([{ "package": "in.amazon.mShop.android.shopping", "category": "Shopping" },
                             {"package": "com.myntra.android", "category": "Shopping"},
                             {"package": "fc.admin.fcexpressadmin", "category": "Shopping"},
                             {"package": "com.urbanladder.catalog", "category": "Shopping"},
                             {"package": "com.amazon.sellermobile.android", "category": "Shopping"},
                             {"package": "com.flipkart.seller", "category": "Shopping"},
                             {"package": "com.paytm.merchants", "category": "Shopping"},
                             {"package": "com.flipkart.android", "category": "Shopping"},
                             {"package": "com.homeshop18.activity", "category": "Shopping"},
                             {"package": "com.kraftly.app", "category": "Shopping"},
                             {"package": "com.snapdeal.main", "category": "Shopping"},
                             {"package": "com.daraz.android", "category": "Shopping"},
                             {"package": "com.daraz.android", "category": "Shopping"},
                             {"package": "com.daraz.android", "category": "Shopping"}]) ;

"""

def getMessageAuthor():
    author_id = []
    # get a list of ids and author_ids for every message
    for author in db.SHOP.find():
        author_id.append( (author['package']))
    # iterate through every author_ids to find the corresponding username
    for package, item in enumerate(author_id):
        message = db.TABLE.find_one({"pkg_name": package})
        author = db.APPMONITOR.find_one({"pkg_name": item}, {"imei": 1})
#        merged = dict(chain((message.items() + author.items())))
        print(author)
        
        
        
getMessageAuthor()
        


#db.TABLE.delete_one( { "package": "com.whatsapp" } )

#tags = db.TABLE.find()

#for harsh in tags:
#    print(harsh)
#print(tags.__str__)

#db.create_collection("TABLE")


#collection_1 = db.TABLE.insert_one({"package":"com.whatsapp"},{"category":"communication"})

#print(collection_1)

collection = db.collection_names() # script for checking collections in MongoD

print(collection) # Print collectins


#collection_1 = db.inventory.distinct( "EARJACK" )
#print(collection_1)
#collection = db.PACKAGE
#cursor = collection.find()

#for employee in collection.inventory({ "com.lenovo.anyshare.gps" }):
	#data = {"package" : employee}
	#db.packages.insert(data)
#	print(employee)
    