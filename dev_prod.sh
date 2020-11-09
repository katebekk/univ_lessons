cd /var/www/univ_lessons

git pull origin main

composer install
bin/console cache:clear
bin/console cache:warmup

echo "Succesfully deployed!"
