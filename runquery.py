import pymongo
from pymongo import Connection

connection = Connection()
db = connection.userdb
collection = db.APPMONITOR
cursor = collection.find()
for employee in collection.distinct("pkg_name"):
	data = {"package" : employee}
	db.packages.insert(data)
	print(employee)