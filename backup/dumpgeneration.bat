@echo off
 
CLS

SET username=root
SET pwd=Aleajactaest#

set m=%date:~-7,2%
set /A m -= 1
set rundate=%date:~-4,4%-%date:~-10,2%-%m%


C:\xampp\mysql\bin\mysql.exe -e "select 'Creation Date','Activation Date','Dealer Name','Label','Total Pins','Total Cards','Amount','Login Name' union all select a.creation_date,a.activation_date,concat(b.dealername,' ',d.othername) as fullname,c.label,sum(a.pins) as tpins,sum(a.cards) as tcards,(sum(a.pins) * c.pinsvalue) as amount,e.loginname from cardsrequest1 a, dealers b,denomination c, activationno d, logins e where a.dealer_id=b.id and a.denom_id =c.id and a.act_id=d.id and a.user_id=e.id and  a.creation_date='%rundate%' and d.confirmation=1 and d.finconfirm=1 and d.billingconfirm=1  group by a.creation_date,a.act_id,a.dealer_id,a.denom_id,a.activation_date  into outfile '/xampp/htdocs/dumptest/dmp_%rundate%.csv' FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n'" --host="localhost" --port="3306" --user=%username% --password=%pwd% scratchcards

echo Zipping ...
 
"C:\Program Files\7-Zip\7z.exe" a -tzip "C:\xampp\htdocs\dumptest\dmp_%rundate%.zip" "C:\xampp\htdocs\dumptest\dmp_%rundate%.csv"
 
echo Deleting the SQL file ...
 
del "C:\xampp\htdocs\dumptest\dmp_%rundate%.csv"

echo Copying...

cmd /c echo F | xcopy "C:\xampp\htdocs\dumptest\dmp_%rundate%.zip" "C:\dumptest\dmp_%rundate%.zip"
 
echo Done!