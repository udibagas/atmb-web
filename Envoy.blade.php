@servers(['purwakarta' => ['atmb@114.6.180.154']])

@task('deploy', ['on' => 'purwakarta'])
    git pull
    php artisan migrate
@endtask
