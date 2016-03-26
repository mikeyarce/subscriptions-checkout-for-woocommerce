var gulp = require('gulp');
var sass = require('gulp-sass');
var jshint = require('gulp-jshint');
var concat = require('gulp-concat');
var wpPot = require('gulp-wp-pot');

gulp.task('default', function(){

    console.log('default gulp task...')

});

gulp.task('sass', function () {

    gulp.src('./css/src/*.scss')

        .pipe(sass())

        .pipe(gulp.dest('./css'));

});

gulp.task('js', function () {

  gulp.src('js/src/*.js')
  .pipe(jshint())
  .pipe(jshint.reporter('fail'))
  .pipe(concat('theme.js'))
  .pipe(gulp.dest('js'));

});

gulp.task('makepot', function () {
	return gulp.src('src/*.php')
		.pipe(wpPot( {
			domain: 'subscriptions-checkout-for-woocommerce',
			destFile:'subscriptions-checkout-for-woocommerce.pot',
			package: 'subscriptions-checkout-for-woocommerce',
			bugReport: 'http://mikeyarce.com/contact'
		} ))
		.pipe(gulp.dest('languages'));
});

gulp.task('watch', function() {

  gulp.watch('css/src/*.scss', ['sass']);

  gulp.watch('js/src/*.js', ['js']);

  gulp.watch('src/*.php', ['makepot']);

});

gulp.task('default', ['sass', 'js', 'makepot', 'watch']);
