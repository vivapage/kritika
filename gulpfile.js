var gulp = require("gulp"),
	autoprefixer = require("gulp-autoprefixer"),
	browsersync = require("browser-sync"),
	concat = require("gulp-concat"),
	cache = require("gulp-cache"),
	cleancss = require("gulp-clean-css"),
	ftp = require("vinyl-ftp"),
	imagemin = require("gulp-imagemin"),
	notify = require("gulp-notify"),
	pngquant = require("imagemin-pngquant"),
	gutil = require("gulp-util"),
	rename = require("gulp-rename"),
	rsync = require("gulp-rsync"),
	sass = require("gulp-sass"),
	uglify = require("gulp-uglify");

// Незабываем менять 'wp-gulp.loc' на свой локальный домен
gulp.task("browser-sync", function() {
	browsersync({
		proxy: "http://www.kritika.localhost/",
		notify: false
		//open: true
		// tunnel: true,
		// tunnel: "gulp-wp-fast-start", //Demonstration page: http://gulp-wp-fast-start.localtunnel.me
	});
});

// Обьединяем файлы sass, сжимаем и переменовываем
gulp.task("styles", function() {
	return (
		gulp
			.src("./sass/**/*.scss")
			.pipe(sass({ outputStyle: "expand" }).on("error", notify.onError()))
			.pipe(rename({ suffix: ".min", prefix: "" }))
			.pipe(concat("style.css"))

			.pipe(autoprefixer(["last 15 versions"]))
			//.pipe(cleancss({ level: { 1: { specialComments: 2 } } })) // Opt., comment out when debugging
			.pipe(gulp.dest("./"))

			.pipe(browsersync.stream())
	);
});

// Обьединяем файлы скриптов, сжимаем и переменовываем
gulp.task("scripts", function() {
	return gulp
		.src(["./js/*.js"])
		.pipe(concat("scripts.min.js"))
		.pipe(uglify()) // Mifify js (opt.)
		.pipe(gulp.dest("./js"))
		.pipe(browsersync.reload({ stream: true }));
});

// Watch
gulp.task("watch", function() {
	gulp.watch("./sass/**/*.scss", gulp.parallel("styles"));
	gulp.watch(["./**/*.js", "!./**/scripts.min.js"], gulp.parallel("scripts"));
	//gulp.watch('./js/*.js', ['js', reload]);
	//gulp.watch('images/src/*', ['images', reload]);
	//gulp.watch("./**/*.php", browsersync.reload);
	gulp.watch("./**/*.php").on("change", browsersync.reload);
});

gulp.task(
	"default",
	gulp.parallel("styles", "scripts", "browser-sync", "watch")
);
