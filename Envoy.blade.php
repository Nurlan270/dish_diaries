@servers(['main' => ['root@213.139.210.239']])

@story('deploy')
    prepare
    install-dependencies
    proceed
@endstory

@task('prepare')
    cd /var/www/dish-diaries.nurlan.dev
    php artisan down --refresh=10 --with-secret
    rm -rf ./package-lock.json
    git reset --hard HEAD
    git pull
@endtask

@task('install-dependencies')
    cd /var/www/dish-diaries.nurlan.dev
    composer install --no-dev
    npm install
    npm run build
@endtask

@task('proceed')
    cd /var/www/dish-diaries.nurlan.dev
    @if($freshDb)
        php artisan migrate:reset --force
    @endif
    php artisan migrate --force
    php artisan up
@endtask
