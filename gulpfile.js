// DEPENDENCIES
var gulp		= require('gulp');
var sass 		= require('gulp-sass');
var browserSync	= require('browser-sync').create();


// SASS COMPILATION
gulp.task('sass', function(){
	return gulp.src('app/scss/**/*.scss')
		.pipe(sass()) // Using gulp-sass
		.pipe(gulp.dest('app/css'))
		.pipe(browserSync.reload({
			stream: true
		}))
});


// WATCH
gulp.task('watch', ['browserSync', 'sass'], function(){
	gulp.watch('app/scss/**/*.scss', ['sass']);
	gulp.watch('app/*.html', browserSync.reload);
	gulp.watch('app/js/**/*.js', browserSync.reload);
});


// BROWSERSYNC
gulp.task('browserSync', function() {
	browserSync.init({
		open: false,
		host: "sb1.jp.dev",
		proxy: "http://sb1.jp.dev/gulp/app",
		open: false
	})
});
