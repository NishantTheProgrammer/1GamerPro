@echo off
set MYDIR=%CD%



set apachehost=C:\xampp\apache\conf\extra\httpd-vhosts.conf
set vhost=C:\Windows\System32\drivers\etc\hosts

for %%f in (%MYDIR%) do set dName=%%~nxf

@echo off 
Rem Adding Entry in apache

echo ^<VirtualHost *:80^> >> %apachehost%
@echo   DocumentRoot "C:/xampp/htdocs/%dName%/public/" >> %apachehost%
@echo   ServerName %dName%.test>> %apachehost%
echo ^</VirtualHost^> >> %apachehost%
echo 127.0.0.1	%dName%.test >> %vhost%

@echo off 
Rem Restarting apache
net stop Apache2.4
net start Apache2.4

