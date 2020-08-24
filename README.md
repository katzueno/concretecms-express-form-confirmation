# concrete5 Git Boiler Plate for client work

By @katzueno

This is basic git template for concrete5 site development by concrete5 Japan, Inc.

## Concept

I'm in charge of setting up a new server and git repo for multiple projects.

It's troublesome to make initial git repo by hand. So I made this git repo.

Whenever there is a new concrete5 site project for a client, we can just simply copy and paste these files.

## Design

This repo ignores

- OS and file system files
- concrete5 core file
- concrete5 language files
- concrete5 File Manager files & cache
- concrete5 config
    - generated_overrides
    - main database.php
    - Doctrine
    - valet related config (Laravel's Mac OS local LNMP environment)
- Composer's vendor folde
- Sitemap.xml
- PHP Composer files
- Node files
- Major IDE System files
    - PHP Storm
    - Visual Studio Code

I welcome any PR and suggestion.
If you don't like ".gitkeep" files. You are welcome to remove them.

This repo has

- application/config/concrete.php
    - Hide concrete5 version
    - Email from addresses & name

**You must change** config setting accordingly.

### [ATTENTION] Composer Vendor file

I've added to ignore "vender" folders to git repo.

If you install the package with vendor folder, you must manage to run `composer install` or modify to include the vendor directories.

If you don't do anything with current gitignore, **you will get error** when you deploy the package with composer.json.

## LICENSE

MIT License.

## History

- 2020.8.24 Keep /composer.json & add vendor folder to gitignore
- 2020.4.17 Added Panic's Nova project files to gitignore
- 2019.2.20 Initial commit based on 8.4.4 & 8.5.0RC1