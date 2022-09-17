import es6Promise from 'es6-promise';
es6Promise.polyfill();

import { resolve, dirname } from 'path';
import gulp from 'gulp';
import sourcemaps from 'gulp-sourcemaps';
import autoprefixer from 'gulp-autoprefixer';
import util from 'gulp-util';
import plumber from 'gulp-plumber';
import eslint from 'gulp-eslint';
import uglify from 'gulp-uglify';
import purge from 'gulp-css-purge';
import gulpSass from 'gulp-sass';
import dartSass from 'sass';
import bsc from 'browser-sync';
import { fileURLToPath } from 'url';
import del from 'del';

const __filename = fileURLToPath(import.meta.url);
const __dirname = dirname(__filename);

const { src, dest, watch, series, parallel } = gulp;
const { beep, log, colors } = util;
const { init, write } = sourcemaps;
const { formatEach } = eslint;
const sass = gulpSass(dartSass);
const browserSync = bsc.create();
const STYLES = resolve(__dirname, 'assets/stylesheets/**/*.scss');
const SCRIPTS = resolve(__dirname, 'assets/scripts/**/*.js');
const BUILD_DIR = resolve(__dirname, 'dist');
const BUILD_STYLES_DIR = resolve(__dirname, BUILD_DIR, 'css');
const BUILD_SCRIPTS_DIR = resolve(__dirname, BUILD_DIR, 'js');

const onError = function (err) {
    console.log('An error occurred:', colors.magenta(err.message));
    beep();
    this.emit('end');
};

const clean = () => del(['dist']);

const reload = (done) => {
    browserSync.reload();

    done();
};

export function stylesDev(done) {
    return src(STYLES)
        .pipe(plumber({ errorHandler: onError }))
        .pipe(init())
        .pipe(sass().on('error', sass.logError))
        .pipe(write())
        .pipe(autoprefixer())
        .pipe(dest(BUILD_STYLES_DIR))
        .pipe(browserSync.stream());
}

export const stylesProd = (done) => {
    return src(STYLES)
        .pipe(plumber({ errorHandler: onError }))
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer())
        .pipe(
            purge({
                shorten: true,
                verbose: true,
                trim: true,
            })
        )
        .pipe(dest(BUILD_STYLES_DIR));
};

export const scriptsDev = (done) => {
    return src(SCRIPTS)
        .pipe(eslint())
        .pipe(formatEach('compact', process.stderr))
        .pipe(dest(BUILD_SCRIPTS_DIR));
};

export const scriptsProd = (done) => {
    return src(SCRIPTS)
        .pipe(eslint())
        .pipe(formatEach('compact', process.stderr))
        .pipe(uglify().on('error', log))
        .pipe(dest(BUILD_SCRIPTS_DIR));
};

export const serve = (done) => {
    browserSync.init({
        proxy: {
            target: 'http://markomilo.local',
        },
        logLevel: 'debug',
        open: false,
        watchOptions: {
            usePolling: true,
            interval: 500,
        },
    });

    done();
};

export const fonts = (done) => {
    return src('./assets/fonts/*.otf').pipe(dest('./dist/fonts'));
};

export const watchForChanges = (done) => {
    watch('assets/stylesheets/**/*.scss', stylesDev);
    watch('assets/scripts/**/*.js', series(scriptsDev, reload));
    watch('**/*.php', reload);

    done();
};
export const dev = series(
    clean,
    fonts,
    parallel(stylesDev, scriptsDev),
    watchForChanges,
    serve
);
export const build = series(clean, fonts, parallel(stylesProd, scriptsProd));
export default dev;
