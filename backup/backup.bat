@echo off
 
CLS 
 
SET backuptime=%DATE:~10,4%-%DATE:~4,2%-%DATE:~7,2%%
 
echo %backuptime%
 
echo Running dump ...
 
set 7zip_path=
 
"C:\xampp\mysql\bin\mysqldump.exe" --host="10.138.80.31" --port="3306" --user="root" --password="Aleajactaest#" --routines  -Q --result-file="C:\xampp\htdocs\Backup\bk_%backuptime%.sql" scratchcards
 
echo Zipping ...
 
"C:\Program Files\7-Zip\7z.exe" a -tzip "C:\xampp\htdocs\Backup\bk_%backuptime%.zip" "C:\xampp\htdocs\Backup\bk_%backuptime%.sql"
 
echo Deleting the SQL file ...
 
del "C:\xampp\htdocs\Backup\bk_%backuptime%.sql"
 
echo Done!