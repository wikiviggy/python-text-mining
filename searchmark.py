import urllib2
import re
import os
import time
import smtplib

 
while 1:
 
    html_content = urllib2.urlopen('http://localhost/results.php').read() 
 
    matches = re.findall('B.tech SEM 5', html_content);  
    
    TO='pvignesh_sr@srmuniv.edu.in'
    
    SUBJECT='Results declared'
    
    TEXT="check your sem exam result at http://localhost/results.php "
    
    gmail_sender='vgnshprabhakar@gmail.com'
    
    gmail_password='02021998@'
    
    server=smtplib.SMTP('smtp.gmail.com:587')
    
    BODY = '\r\n'.join([
           'TO : %s'% TO,
           'FROM : %s'% gmail_sender,
           'SUBJECT : %s'% SUBJECT,
           '',
           TEXT
           ])
    if len(matches) == 0: 
       os.system("notify-send 'Yeah' 'Result is not declared yet'")
       time.sleep(90)
 
    else:
       server.starttls()
       server.login(gmail_sender,gmail_password)
       server.sendmail(gmail_sender,TO,BODY)
       server.quit()
       os.system("notify-send 'Oops' 'Result Declared'")
       quit()
