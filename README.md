# docker-apache-php-xdebug-mysql
Docker Apache PHP XDebug MySQL

### Spin up the container
```shell
cd docker
make up
```

### Get a bash shell in the container
```shell
cd docker
make bash
```

### Stop the container
```shell
cd docker
make down
```

### Remove containers, images, volumes, and networks
Note that running `docker system prune` will permanently delete the unused data, so it should be used with caution.
```shell
cd docker
make prune
```

### PHPInfo
<http://127.0.0.1:8080/info.php>

