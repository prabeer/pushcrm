# -*- coding: utf-8 -*-
"""
Created on Mon Nov 27 11:12:49 2017

@author: harsh.arora
"""

from pymongo import MongoClient

#from pprint import pprint

connection = MongoClient() 
db = connection.userdb


#tags = db.APPMONITOR.find({"pkg_name": "com.whatsapp" },{ "imei": 1,"_id":0})
"""
tags = db.GAME.insert_many([{ "package": "com.bindass.CupCake_OPT", "category": "Game" },
                             {"package": "com.king.candycrushsaga", "category": "Game"},
                             {"package": "com.nekki.shadowfight3", "category": "Game"},
                             {"package": "com.dualcarbon.drivesimulator2016Lite", "category": "Game"},
                             {"package": "com.ansangha.drdriving", "category": "Game"},
                             {"package": "com.outfit7.mytalkingtomfree", "category": "Game"},
                             {"package": "com.nazara.tinylabproductions.mpsr", "category": "Game"},
                             {"package": "com.lf.Army.Bus.Soldiers.free.apps", "category": "Game"},
                             {"package": "com.junesoftware.nazara.motupatlurace", "category": "Game"},
                             {"package": "com.lf.garbage.cleaner.truck.free.apps", "category": "Game"},
                             {"package": "com.mms.hummer.transformer.robot", "category": "Game"},
                             {"package": "com.gta.truck.driver.city.crush", "category": "Game"},
                             {"package": "com.mms.tron.bike.transform.robot", "category": "Game"},
                             {"package": "com.mms.motor.bike.driving.school", "category": "Game"},
                             {"package": "com.mms.classic.car.transform.robot", "category": "Game"},
                             {"package": "com.mms.police.elevated.car.driver.simulator", "category": "Game"},
                             {"package": "com.xtreme.offroad.driving.hummer.simulator", "category": "Game"},
                             {"package": "com.spirit.race.simulation.cars.drive.rally.safari.apps", "category": "Game"},
                             {"package": "com.fungames.sniper3d", "category": "Game"},
                             {"package": "com.pjmasks.moonlightheroes", "category": "Game"},
                             {"package": "com.kidroider.kids.winter.holidays.fun", "category": "Game"},
                             {"package": "com.funnyplaygames.pickupgirls.minicar", "category": "Game"}]) ;


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


collection = db.collection_names() # script for checking collections in MongoD

print(collection) # Print collectins


