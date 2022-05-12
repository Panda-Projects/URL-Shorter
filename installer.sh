while getopts u:a:f: flag
do
    case "${flag}" in
        d) domain=${OPTARG};;
    esac
done

if [-n $domain]
then
    source /etc/os-release

    apt update && apt upgrade -y
    apt install ca-certificates apt-transport-https lsb-release gnupg curl nano unzip git -y

    if [ $ID == 'debian' ]
    then
      wget -q https://packages.sury.org/php/apt.gpg -O- | apt-key add -
      echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | tee /etc/apt/sources.list.d/php.list
    else
      apt install software-properties-common -y
      add-apt-repository ppa:ondrej/php
    fi

    apt update
    apt install apache2 -y
    apt install php8.1 php8.1-cli php8.1-common php8.1-curl php8.1-gd php8.1-intl php8.1-mbstring php8.1-mysql php8.1-opcache php8.1-readline php8.1-xml php8.1-xsl php8.1-zip php8.1-bz2 libapache2-mod-php8.1 -y

    sudo sed -i -e 's,PrivateTmp=true,PrivateTmp=false\nNoNewPrivileges=yes,g' /lib/systemd/system/apache2.service
    sudo systemctl daemon-reload
    sudo systemctl start apache2.service

    sudo  php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    sudo  php composer-setup.php --install-dir=/usr/bin --filename=composer
    sudo chmod +x /usr/bin/composer

    mkdir "/var/www/url-shorter/"
    cd /var/www/url-shorter
    git clone https://github.com/Panda-Projects/URL-Shorter.git .

    composer install -y

    file="/etc/apache2/sites-available/url-shorter.conf"
    echo "        <VirtualHost *:80>" >> $file
    echo "            ServerName go.demo.projects-studios.eu" >> $file
    echo "            DocumentRoot \"/var/www/url-shorter/public\"" >> $file
    echo "            <Directory /var/www/url-shorter/public>" >> $file
    echo "                    AllowOverride All" >> $file
    echo "            </Directory>" >> $file
    echo "        </VirtualHost>" >> $file
    cat $file

    a2ensite url-shorter.conf
    service apache2 restart

    mv .env.example .env

    echo "URL Shorter was install"
else
  echo "Please use the command with -d and then your domain"