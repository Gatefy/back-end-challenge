'use strict';

// Load plugins
const del = require('del');
const gulp = require('gulp');
const shell = require('gulp-shell');

// show all tasks
function help() {
    return gulp
        .src('.')
        .pipe(shell(['gulp --tasks']));
}

function install() {
    return gulp
        .src('.')
        .pipe(shell([
            'if [ $(which composer | wc -c) -ne 0 ]; then composer install; else if [ ! -f ./composer.phar ]; then wget --output-document="composer.phar" "https://getcomposer.org/download/1.9.0/composer.phar"; chmod +x composer.phar; fi; ./composer.phar install; fi',
            'if [ ! -f database/database.sqlite ]; then touch database/database.sqlite; fi',
            'if [ ! -f .env ]; then cp -n .env.example .env; fi',
            'php artisan migrate'
        ]));
}

function clean() {
    return del([
        './database/database.sqlite',
        './public/css',
        './public/js',
        './public/fonts',
        './vendor'
    ]);
}

function serve() {
    return gulp
        .src('.')
        .pipe(shell([
            'npm run dev',
            'php artisan serve'
        ]));
}

function seed() {
    return gulp
        .src('.')
        .pipe(shell(['php artisan db:seed --class=UserTableSeeder']));
}

// Define complex tasks
const reinstall = gulp.series(clean, install);

// Export tasks
exports.help = help;
exports.install = install;
exports.clean = clean;
exports.serve = serve;
exports.seed = seed;
exports.reinstall = reinstall;
