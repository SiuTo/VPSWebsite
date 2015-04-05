install:
	rm -rf /var/www/html/*
	cp *.css *.js *.php /var/www/html
	cp -r PHPMailer/ /var/www/html/

run:
	/etc/init.d/apache2 start

