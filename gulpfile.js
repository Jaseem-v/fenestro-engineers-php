const { src, dest, watch, series } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss');
const cssnano = require('cssnano');
const terser = require('gulp-terser');
const browsersync = require('browser-sync').create();

// Sass Task
function scssTask() {
    return src('public/assets/sass/style.scss')
        .pipe(sass())
        .pipe(postcss([cssnano()]))
        .pipe(dest("public/assets/dist"));
}

// JavaScript Task
function jsTask() {
    return src('public/assets/js/main.js')
        .pipe(terser())
        .pipe(dest('public/assets/dist'));
}


// Browsersync Tasks
function browsersyncServe(cb) {
    browsersync.init({
        server: {
            baseDir: './resources/views'
        }
    });
    cb();
}

function browsersyncReload(cb) {
    browsersync.reload();
    cb();
}

// Watch Task
function watchTask() {
    watch('*.html', browsersyncReload);
    watch(['public/assets/sass/**/*.scss', 'public/assets/js/**/*.js'], series(scssTask, jsTask, browsersyncReload));
}

// Default Gulp task
exports.default = series(
    scssTask,
    jsTask,
    browsersyncServe,
    watchTask
);