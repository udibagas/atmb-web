@servers(['purwakarta' => ['atmb@10.45.5.20']])

@task('deploy', ['on' => 'purwakarta'])
    git pull
    php artisan migrate
@endtask
