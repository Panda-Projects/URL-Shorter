[![License](https://img.shields.io/badge/License-Apache%202.0-blue.svg)](https://opensource.org/licenses/Apache-2.0)

<img width="100px" style="border-radius: 10px;" src="https://cdn.panda-studios.eu/logo-transparent.png" alt="Panda-Studios Logo">

# URL Shorter

## Requirements:

- Apache2
- PHP 8

## Installation via .sh
```
bash <(curl -s https://raw.githubusercontent.com/Panda-Projects/URL-Shorter/master/installer.sh )
```
OR
```
wget https://raw.githubusercontent.com/Panda-Projects/URL-Shorter/master/installer.sh
bash installer.sh
```

## Installation




### Installation und Webserver Konfiguration

#### Apache2

1. To install Apche2 use the following command:
   ```apt install apache2```
2. Danach verwenden Sie den Befehl zum Erstellen einer Apache2-Konfiguration
   ```nano /etc/apache2/sites-available/url-shorter.conf```
3. Then copy the following text
```
        <VirtualHost *:80>
            ServerName url-shorter.example.com
            DocumentRoot "/var/www/url-shorter/public"
            <Directory /var/www/url-shorter/public>
                    AllowOverride All
            </Directory>
        </VirtualHost>
```
4. Exit the application with ``STRG+X`` and then save with ``y`` and ``RETURN``
5. Now activate the page with the following command
   ```a2ensite url-shorter.conf```
6. Restart Apache2
   ```service apache2 restart```



### Composer installation
#### Debian 11
1. Download ``composer-setup.php``

        php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"

2. Install Composer Global

        php composer-setup.php --install-dir=/usr/bin --filename=composer
        chmod +x /usr/bin/composer

## Support

- via Discord: https://discord.gg/rHD3CFB8x4
- via E-Mail: [info@panda-studios.eu](mailto:info@panda-studios.eu)

<a href="https://github.com/Panda-Projects/CloudNet-V3-Webinterface/graphs/contributors">
  <img src="https://contrib.rocks/image?repo=Panda-Projects/CloudNet-V3-Webinterface" alt="Contributors"/>
</a>