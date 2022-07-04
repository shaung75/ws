var gulp = require('gulp'),
    sass = require('gulp-sass')(require('node-sass')),
    concat = require('gulp-concat'),
    cleanCSS = require('gulp-clean-css'),
    minify = require('gulp-minify'),
    sourcemaps = require('gulp-sourcemaps'),
    livereload = require('gulp-livereload');

/* SASS */
gulp.task('sass', function () {
  return gulp.src(['./css/**/*.css', './scss/*.scss'])
      .pipe(sass().on('error', sass.logError))
      .pipe(cleanCSS({compatibility: 'ie8'}))
      //.pipe(concat('main.css'))
      .pipe(gulp.dest('../public/assets/css'))
      .pipe(livereload());
});


gulp.task('js', function() {
    return gulp.src([
        './js/bsb/**/*.js'
    	])
      .pipe(sourcemaps.init())
      .pipe(concat('scripts.js'))
      .pipe(sourcemaps.write('./'))
      .pipe(gulp.dest("../public/assets/js"))
      .pipe(livereload());
});

gulp.task('watch', function() {
  livereload.listen();
  gulp.watch('./scss/**/*.scss', gulp.parallel('sass'));
  gulp.watch('./css/**/*.css', gulp.parallel('sass'));
  gulp.watch('./js/**/*.js', gulp.parallel('js'));
});

gulp.task('default', gulp.series(gulp.parallel('sass', 'js'), 'watch'));