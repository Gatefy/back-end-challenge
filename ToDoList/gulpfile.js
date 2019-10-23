"use strict";

// Load plugins
const del = require("del");
const gulp = require("gulp");
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
        .pipe(
            shell(['composer install']),
            shell(['touch database/database.sqlite']),
            shell(['php artisan migrate'])
        );
}

function serve() {
    return gulp
        .src('.')
        .pipe(
            shell(['php artisan serve'])
        );
}

// Export tasks
exports.help = help;
exports.install = install;
exports.serve = serve;
