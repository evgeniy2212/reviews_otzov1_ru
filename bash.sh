#!/bin/sh
/usr/bin/php /home/u931663450/domains/otzov1.ru/otzov1.ru/artisan schedule:run 1>> /dev/null 2>&1
/usr/bin/php /home/u931663450/domains/otzov1.ru/otzov1.ru/artisan queue:work --queue=high,default
