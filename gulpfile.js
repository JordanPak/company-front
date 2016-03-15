//======================================//
//       COMPANY FRONT - GULPFILE       //
//======================================//
//   Jordan Pakrosnis | JordanPak.com   //
//======================================//


//-- DEPENDENCIES --//
var gulp		= require('gulp');
var sass 		= require('gulp-sass');
// var plumber		= require('gulp-plumber');
var browserSync	= require('browser-sync').create();


//-- TASKS --//

// SASS
gulp.task('sass', function(){
	return gulp.src('assets/scss/**/*.scss')
		.pipe(sass().on('error', sass.logError)) // Using gulp-sass
		.pipe(gulp.dest('css'))
		.pipe(browserSync.reload({
			stream: true
		}))
});

// WATCH
gulp.task('watch', ['browserSync', 'sass'], function(){
	gulp.watch('assets/scss/**/*.scss', ['sass']);
	gulp.watch('**/*.php', browserSync.reload);
	gulp.watch('assets/js/**/*.js', browserSync.reload);
});

// BROWSERSYNC
gulp.task('browserSync', function() {
	browserSync.init({
		open: false,
		host: "sb1.jp.dev",
		proxy: "http://sb1.jp.dev/company-front",
		open: false
	})
});
