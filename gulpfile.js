var gulp = require('gulp'),
    watch = require('gulp-watch'),
    sass = require('gulp-sass'),
    path = require('path'),
    cleanCSS = require('gulp-clean-css'),
    browserSync = require('browser-sync'),
    connect = require('gulp-connect-php'),
    htmlmin = require('gulp-htmlmin'),
    dirSync = require( 'gulp-directory-sync' ),
    runSequence = require('run-sequence'),
    del = require('del'),
    minify = require('gulp-minify');

gulp.task('sync', function() {
  connect.server({}, function (){
    browserSync({
      //port: 80,
      proxy: 'localhost/piano-teacher/public'
    });
  });
});

gulp.task('uglify', function() {
  return gulp.src('src/js/*.js')
    .pipe(minify({
      ext:{
        min:'.js'
      },
      noSource: true
    }))
    .pipe(gulp.dest('public/wp-content/themes/piano-teacher/js'));
});

gulp.task('reload', function() {
  browserSync.reload();
  return;
});

gulp.task('sass', function() {
  return gulp.src('src/sass/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('src/css'));
});

gulp.task('minify', function() {
  return gulp.src('public/wp-content/themes/piano-teacher/**/*.php')
    .pipe(htmlmin({collapseWhitespace: true}))
    .pipe(gulp.dest('public/wp-content/themes/piano-teacher'));
});

gulp.task('minifyHTML', function() {
  return gulp.src('src/**/*.html')
    .pipe(htmlmin({collapseWhitespace: true}))
    .pipe(gulp.dest('public/wp-content/themes/piano-teacher/'));
});

gulp.task('minify-css', () => {
  return gulp.src('public/wp-content/themes/piano-teacher/css/*.css')
    .pipe(cleanCSS({level: 2}))
    .pipe(gulp.dest('public/wp-content/themes/piano-teacher/css'))
    .pipe(browserSync.stream({match: '**/*.css'}));
});

gulp.task('clean', function () {
  del('public/wp-content/themes/piano-teacher/sass');
  del('public/wp-content/themes/piano-teacher/css/**/*.scss');
  del('public/wp-content/themes/piano-teacher/img/src');
  return;
});

gulp.task('clean-css', function () {
  return del(['src/css/**/!(style.css)*']);
});

gulp.task('dir-sync', function() {
  return gulp.src( '' )
    .pipe(dirSync( 'src', 'public/wp-content/themes/piano-teacher', { printSummary: true } ));
});

gulp.task('dir-sync-sass', function() {
  return gulp.src( '' )
    .pipe(dirSync( 'src/sass', 'src/css', { printSummary: true } ));
});

gulp.task('compile', function() {
  runSequence('dir-sync-sass', 'sass', 'clean-css', 'dir-sync', 'minify', 'minifyHTML', 'minify-css', 'clean', 'reload');
});

gulp.task('watch', ['sync'], function() {
  watch("src/js/**/*.js", function() {
    runSequence('dir-sync', 'uglify', 'clean', 'reload');
  });
  watch("src/**/*.php", function() {
    runSequence('dir-sync', 'minify', 'minifyHTML', 'minify-css', 'clean', 'reload');
  });
  watch("src/**/*.html", function() {
    runSequence('dir-sync', 'minify', 'minifyHTML', 'minify-css', 'clean', 'reload');
  });
  watch("src/sass/**/*.scss", function() {
    runSequence('sass', 'clean-css', 'dir-sync', 'minifyHTML', 'minify', 'minify-css', 'clean', 'reload');
  });
  watch("src/sass/**/*.css", function() {
    runSequence('dir-sync-sass', 'sass', 'clean-css', 'dir-sync', 'minifyHTML', 'minify', 'minify-css', 'clean', 'reload');
  });
});