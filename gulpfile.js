var gulp = require('gulp'),
    bower = require('gulp-bower'),
    sass = require('gulp-sass'),
    shell = require('gulp-shell');

gulp.task('bower', function() {
    return bower()
        .pipe(gulp.dest('public/vendor/'))
});

gulp.task('sass', function () {
    gulp.src('./scss/*.scss')
        .pipe(sass({
            includePaths: ['./scss','public/vendor/foundation/scss'],
            errLogToConsole: true
        }))
        .pipe(gulp.dest('./public/stylesheets'));
});

gulp.task('watch', function(event) {
    gulp.watch('./scss/*.scss', ['sass']);
});

gulp.task('server', shell.task([
        'php -S localhost:8020'
    ],{
        cwd: './public'
    }
));

gulp.task('build', ['bower', 'sass']);

gulp.task('default', ['watch', 'server']);
