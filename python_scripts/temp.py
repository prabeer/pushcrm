# -*- coding: utf-8 -*-
"""
Created on Thu Aug 31 10:37:11 2017
@author: harsh.arora
"""

import os, zipfile, shutil
import pandas as pd
from pathlib import Path


dir_name = '/var/www/media/pushapp/uploads/'
extension = ".zip"
#mongoloader = 'D:\\xamp\\htdocs\\pushapp\\uploads\\mongoimport.exe'

os.chdir(dir_name) # change directory from working dir to dir with files
if(os.path.isdir(dir_name+".erqwwre")==True):
		shutil.rmtree(dir_name+".erqwwre")
for item in os.listdir(dir_name): # loop through items in dir
    if item.endswith(extension): # check for ".zip" extension
			file_name = os.path.abspath(item) # get full path of files
			zip_ref = zipfile.ZipFile(file_name) # create zipfile object
			zip_ref.extractall(dir_name) # extract file to dir
			zip_ref.close() # close file
			os.remove(file_name) # delete zipped file

for item in os.listdir(dir_name):
    for item1 in os.listdir(dir_name+'/'+item):
			# print(os.path.abspath(item+'\\'+item1))
			print(dir_name+'/'+item);
			new = item1.split('_')
			x=new[len(new)-1]
			y=x.split('.')
			z=y[0]
			c=new[0]
			a = os.path.abspath(item+'/'+item1);
			#a = a.replace('\'','')
			#print(a)
			price=pd.read_csv(a)
			price.insert(0,'imei',z)
			price.to_csv(a)
			mongdcmd = str('mongoimport --host 10.85.28.47 -d userdb --collection '+c+' --type csv --file '+os.path.abspath(item+'/'+item1)+' --headerline')
			print(mongdcmd)
			os.system(mongdcmd)
		
