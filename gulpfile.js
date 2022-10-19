let syntax = 'less';

let gulp          = require('gulp'),
    browserSync   = require('browser-sync'),
    less          = require('gulp-less'),
    concat        = require('gulp-concat'),
    uglify        = require('gulp-uglify-es').default,
    autoprefixer  = require('autoprefixer'),
    postCss       = require('gulp-postcss'),
    cssnano       = require('cssnano');

gulp.task('styles', function() {
    return gulp.src('.frontend/styles/'+syntax+'/*.'+syntax+'')
    .pipe(eval(syntax)({ 'include css': true }))
    .pipe(postCss([
        autoprefixer({ grid: 'autoplace' }),
        cssnano({ preset: ['default', { discardComments: { removeAll: true } }] })
    ]))
    .pipe(gulp.dest('public/css'))
    .pipe(browserSync.stream())
});

gulp.task('scripts', function() {
    return gulp.src(['.frontend/js/main.js'])
        .pipe(concat('app.min.js'))
        .pipe(uglify({ output: { comments: false } }))
        .pipe(gulp.dest('public/js'))
        .pipe(browserSync.stream())
});

gulp.task('img', function() {
    return gulp.src('.frontend/img/**/*.*')
        .pipe(gulp.dest('public/img'))
});

gulp.task('serve', () => {
    browserSync.init({
        proxy: 'localhost:80'
    });
});

gulp.task('watch', function() {
    gulp.watch('.frontend/styles/'+syntax+'/**/*', gulp.parallel('styles'));
    gulp.watch('.frontend/js/**/*.js', gulp.parallel('scripts'));
    gulp.watch('.frontend/img/**/*', gulp.parallel('img'));
    gulp.watch('public/**/*').on('change', browserSync.reload);
    gulp.watch('resources/**/*').on('change', browserSync.reload);
});

gulp.task('default', gulp.parallel('styles', 'scripts', 'img', 'watch', 'serve'));
