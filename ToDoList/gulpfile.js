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
            'composer install',
            'touch database/database.sqlite',
            'php artisan migrate'
        ]));
}

function clean() {
    return del([
        './database/database.sqlite',
        './vendor'
    ]);
}

function serve() {
    return gulp
        .src('.')
        .pipe(shell(['php artisan serve']));
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
