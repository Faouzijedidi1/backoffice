var gulp = require("gulp");
var webpack = require('webpack-stream');

gulp.task('default',['build']);

gulp.task('build', function() {
  return gulp.src('./src/main.js')
    .pipe(webpack( require('./webpack.config.js') ))
    .pipe(gulp.dest('../public/js/'));
});