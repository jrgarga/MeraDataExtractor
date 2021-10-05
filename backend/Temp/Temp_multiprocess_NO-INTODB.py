#
# Copyright 2005-2018 ECMWF.
#
# This software is licensed under the terms of the Apache Licence Version 2.0
# which can be obtained at http://www.apache.org/licenses/LICENSE-2.0.
#
# In applying this licence, ECMWF does not waive the privileges and immunities granted to it by
# virtue of its status as an intergovernmental organisation nor does it submit to any jurisdiction.
#
 


from __future__ import print_function
import traceback
import sys
import time
import datetime
from random import randint
#import mysql.connector

from multiprocessing import Process
from threading import Thread
 
from eccodes import *

INPUT = '../../data/reduced_latlon_surface.grib1'
VERBOSE = 1  # verbose error reporting
missingValue = 1e+20  # A value out of range


#def example(INPUT):
#def example(INPUT,y,yarr):
def example(INPUT,OUT,w,m,y,yarr):








    indexarray = yarr.split(",");
    forthenameoffile = yarr.replace(",","_");
    test = datetime.datetime.now();
#    name = "GribIndexPoints_"+forthenameoffile+"_"+m+"_"+y+"_" +OUT+"_"+test.strftime("%d_%m_%Y_%H:%M:%S")+".csv";
#    name = OUT+"_"+y+"_"+m+"_GribIndexPoints_"+forthenameoffile+"_"+test.strftime("%d_%m_%Y_%H:%M:%S")+".csv";
#    name = OUT+"_"+y+"_"+m+"_GribIndexPoints_"+test.strftime("%d_%m_%Y_%H:%M:%S")+".csv";
#    name = OUT+"_"+y+"_"+m+"_GribIndexPoints_Ronan_IW.csv";
#    name = OUT+"_"+y+"_"+m+"_SWIMFull.csv";
#    name = OUT+"_"+y+"_"+m+"_SWIMFull_started_"+test.strftime("%d_%m_%Y_%H:%M")+".csv";
    name = OUT+"_"+y+"_"+m+"_GribIndexPoints_"+forthenameoffile+"_started_"+test.strftime("%d_%m_%Y_%H_%M")+".csv";





    f = open(INPUT, 'rb')
    f2 = open('../../files/'+name, "a") 

#critics ? ;)
#    f2.write("index,lat,lon,value,dataDate,dataTime,validityDate,validityTime,name,shortname,units\n")

    if w=='true':
     sys.stdout.write("index,lat,lon,value,timestamp,name,shortname,units\n")
     f2.write("index,lat,lon,value,dataDate,dataTime,validityDate,validityTime,name,shortname,units\n")


    while 1:
        gid = codes_grib_new_from_file(f)
        if gid is None:
            break
 
        # Set the value representing the missing value in the field.
        # Choose a missingValue that does not correspond to any real value in the data array
        codes_set(gid, "missingValue", missingValue)
 
        iterid = codes_grib_iterator_new(gid, 0)
 
        i = 0
        while 1:

         result = codes_grib_iterator_next(iterid)
         if not result:
                break

         for x in indexarray:
          if i==int(x):
          #if 1==1:


            timestamp = ""
            if codes_get(iterid, 'day') < 10:
             timestamp = timestamp+"0"+str(codes_get(iterid, 'day'))
            else:
             timestamp = timestamp+str(codes_get(iterid, 'day'))

            timestamp = timestamp+"-"+str(codes_get(iterid, 'month'))+"-"+str(codes_get(iterid, 'year'))

            if codes_get(iterid, 'validityTime') == 0:
             timestamp = timestamp+" 00:00:00"
            elif codes_get(iterid, 'validityTime') < 1000:
             eben = str(codes_get(iterid, 'validityTime'))
             timestamp = timestamp+" 0"+eben[0]+":00:00"
            else:
             eben2 = str(codes_get(iterid, 'validityTime'))
             timestamp = timestamp+" "+eben2[0]+eben2[1]+":00:00"

            [lat, lon, value] = result
            #if lat >=54.0651 and lat<=54.1051 and lon >=359.7829 and lon <=359.8229: #EA1
            #if lat >=50.327 and lat<=50.367 and lon >=355.2843 and lon <=355.3243: #EA2
            #sys.stdout.write("%d,%.6f,%.6f,%.6f,%s,%s,%s,%s,%s,%s,%s\n" % (i, lat, (lon-360), value, codes_get(iterid, 'dataDate'), codes_get(iterid, 'dataTime'), codes_get(iterid, 'validityDate'), codes_get(iterid, 'validityTime'), codes_get(iterid, 'name'), codes_get(iterid, 'shortName'),codes_get(iterid, 'units')))
            #sys.stdout.write("%d,%.6f,%.6f,%.6f,%s,%s,%s,%s\n" % (i, lat, (lon-360), value, timestamp, codes_get(iterid, 'name'), codes_get(iterid, 'shortName'),codes_get(iterid, 'units')))
            sys.stdout.write("%d,%.6f,%.6f,%.6f,%s,%s,%s,%s\n" % (i, lat, (lon-360), (value-(273.15)), timestamp, codes_get(iterid, 'name'), codes_get(iterid, 'shortName'),'Celsius'))


            f2.write("%d,%.6f,%.6f,%.6f,%s,%s,%s,%s,%s,%s,%s\n" % (i, lat, (lon-360), value, codes_get(iterid, 'dataDate'), codes_get(iterid, 'dataTime'), codes_get(iterid, 'validityDate'), codes_get(iterid, 'validityTime'), codes_get(iterid, 'name'), codes_get(iterid, 'shortName'),codes_get(iterid, 'units')))

         i += 1
 
        codes_grib_iterator_delete(iterid)
        codes_release(gid)
    f.close()
 



def main():
 try:
  year=sys.argv[1]
  yar=sys.argv[2]
 except CodesInternalError as err:
  if VERBOSE:
   traceback.print_exc(file=sys.stderr)
  else:
   sys.stderr.write(err.msg + '\n')
  return 1

if __name__ == "__main__":
    year=sys.argv[1]
    yar=sys.argv[3]

    month=sys.argv[2]
    if(int(month)<10):
     smonth='0'+month;
    else:
     smonth=month;
#    Thread(target = example,args=('../andrew/MERA_PRODYEAR_'+year+'_12_33_105_10_0_FC3hr',year,yar)).start()
#    Thread(target = example,args=('../andrew/MERA_PRODYEAR_'+str(int(year)+1)+'_01_33_105_10_0_FC3hr',str(int(year)+1),yar)).start()
#    example('MERA_PRODYEAR_2016_12_61_105_0_4_FC33hr','TotalPrecip')

#    Process(target = example,args=('./backup/thread/Rainfall/MERA_PRODYEAR_'+year+'_'+smonth+'_61_105_0_4_FC33hr','TotalPrecip','true',smonth,year,yar)).start()
#    Process(target = example,args=('/var/www/html/mera/map/backup/thread/Press/MERA_PRODYEAR_'+year+'_'+smonth+'_1_103_0_0_FC3hr','Pressure','true',smonth,year,yar)).start()
    Process(target = example,args=('/var/www/html/mera/map/backup/thread/Temp/MERA_PRODYEAR_'+year+'_'+smonth+'_11_105_2_0_FC3hr','Temp','true',smonth,year,yar)).start()
