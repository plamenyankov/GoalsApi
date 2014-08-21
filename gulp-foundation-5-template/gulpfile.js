// Gulp
var gulp = require('gulp');

// Plugins
var jade = require('gulp-jade');
var sass = require('gulp-sass');
var plumber = require('gulp-plumber');
var prefix = require('gulp-autoprefixer');
var minifycss = require('gulp-minify-css');
var uglify = require('gulp-uglify');
var imagemin = require('gulp-imagemin');
var livereload = require('gulp-livereload');
var lr = require('tiny-lr');
var server = lr();

// Paths
var paths = {
    scripts: ['assets/js/*.js'],
    images: ['assets/img/**'],
    fonts: ['assets/fonts/**'],
    foundation:['assets/js/foundation.min.js'],
    main:['assets/js/main.js'],
    jquery:['bower_components/jquery/dist/jquery.js']
};
//jQuery
gulp.task('jQuery', function(){
   gulp.src(paths.jquery)
       .pipe(gulp.dest('../public/js/'));

});
gulp.task('foundation', function(){
   gulp.src(paths.foundation)
       .pipe(gulp.dest('../public/js/'));
});
gulp.task('main', function(){
   gulp.src(paths.main)
       .pipe(gulp.dest('../public/js/'));
});
// Jade to HTML
gulp.task('jade', function() {
    gulp.src(['**/*.jade', '!./{node_modules/**, node_modules}'])
        .pipe(plumber())
        .pipe(jade({
            pretty: true
        }))
        .pipe(gulp.dest('../public/'))
        .pipe(livereload(server));
});

// Compile Sass
gulp.task('sass', function() {
    gulp.src(['assets/scss/*.scss', '!assets/scss/_variables.scss'])
        .pipe(plumber())
        .pipe(sass({
            includePaths: ['assets/scss', 'bower_components/foundation/scss'],
            outputStyle: 'expanded'
        }))
        .pipe(prefix(
            "last 10 version"
        ))
        .pipe(gulp.dest('../public/css'))
        .pipe(minifycss())
        .pipe(gulp.dest('../public/css'))
        .pipe(livereload(server));
});
// Uglify JS
gulp.task('uglify', function() {
    gulp.src(paths.scripts)
        .pipe(plumber())
        .pipe(uglify({
            outSourceMap: false
        }))
        .pipe(gulp.dest('../public/js'));
});

// Compress images
gulp.task('imagemin', function() {
    gulp.src(paths.images)
        .pipe(plumber())
        .pipe(imagemin())
        .pipe(gulp.dest('../public/img'));
});

// Copy all static assets
gulp.task('copyFonts', function() {
    return gulp.src(paths.fonts)
        .pipe(gulp.dest('../public/fonts'));
});

// Livereload
gulp.task('listen', function(next) {
    server.listen(35729, function(err) {
        if (err) return console.log;
        next();
    });
});

// Watch files
gulp.task('watch', function(event) {
    gulp.watch('**/*.jade', ['jade']);
    gulp.watch('assets/scss/*.scss', ['sass']);
    gulp.watch(paths.images, ['imagemin']);
    gulp.watch(paths.fonts, ['copyFonts']);
    gulp.watch(paths.scripts, ['uglify']);
});

gulp.task('default', ['listen', 'watch', 'jQuery', 'foundation', 'main']);