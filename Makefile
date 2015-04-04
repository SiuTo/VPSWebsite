clean:
	rm -rf /var/www/html/*

install:
	cp *.css *.js *.php /var/www/html

run:
	/etc/init.d/apache2 start

