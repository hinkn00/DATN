## Hướng dẫn cài đặt
mở file hướng dẫn cài đặt.pdf để xem chi tiết hướng dẫn
## Update

Since this skeleton is a starting point for your application and various files
would have been modified as per your needs, there isn't a way to provide
automated upgrades, so you have to do any updates manually.

## Clone code from git

1. git clone code branch develop.
2. Run

```bash
composer update
```

3. Read "Configuration" to connect databases.
4. Run "composer require fzaninotto/faker"
5. ```bash
   bin/cake migrations migrate
   bin/cake migrations seed
   ```

```

## Configuration

Read and edit the environment specific `config/app_local.php` and setup the
`'Datasources'` and any other configuration relevant for your application.
Other environment agnostic settings can be changed in `config/app.php`.

## Layout

The app skeleton uses [Milligram](https://milligram.io/) (v1.3) minimalist CSS
framework by default. You can, however, replace it with any other library or
custom styles.
```
