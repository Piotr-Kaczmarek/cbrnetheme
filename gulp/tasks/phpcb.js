// Dependencies
const { src, dest } = require('gulp');
var gutil = require('gulp-util');
const phpcbplugin = require('gulp-phpcbf');
const config = require('../config.js');

// Task
function phpcb() {
  return src(config.phpcb.src, { base:"./"})

    // Fix files using PHP Code fixer
    .pipe(phpcbplugin(config.phpcb.opts))

    // Log all problems that was found
    .on('error', gutil.log)
    .pipe(dest("./"));
}

exports.phpcb = phpcb;
