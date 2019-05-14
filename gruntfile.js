const sass = require('node-sass');

module.exports = function(grunt) {

  // configure tasks
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    uglify: {
      dev: {
        options: {
          beautify: true,
          mangle: false,
          compress: false,
          preserveComments: 'all'
        },
        src:  'src/js/*.js',
        dest: 'js/main.js'
      },
      build: {
        src:  'src/js/*.js',
        dest: 'js/main.min.js'
      }
    },
    sass: {
      dev: {
        options: {
          implementation: sass,
          outputStyle: 'expanded',
          sourceMap: true
        },
        files: {
          'css/main.css' : 'src/scss/main.scss'
        }
      },
      build: {
        options: {
          implementation: sass,
          outputStyle: 'compressed'
        },
        files: {
          'css/main.min.css' : 'src/scss/main.scss'
        }
      }
    },
    watch: {
      options: {
        livereload: true
      },
      js: {
        files: ['src/js/*.js'],
        tasks: ['uglify:dev']
      },
      css: {
        files: ['src/scss/**/*.scss'],
        tasks: ['sass:dev']
      }
    }
  });

  // load the plugins
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-sass');

  // register tasks
  grunt.registerTask('default', ['uglify:dev', 'sass:dev']);
  grunt.registerTask('build',   ['uglify:build', 'sass:build']);

};