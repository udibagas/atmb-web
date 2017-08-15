@servers(['testing' => ['root@128.199.105.141']])

@task('deploy', ['on' => 'testing'])
    cd /home/udibagas/apps/atmb-web
    git pull
    php artisan migrate
@endtask
