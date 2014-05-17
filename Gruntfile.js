'use strict';
module.exports = function(grunt) {

  grunt.initConfig({
    jshint: {
      options: {
        jshintrc: '.jshintrc'
      },
      all: [
        'Gruntfile.js',
        'assets_src/js/*.js',
      ]
    },
    less: {
      dist: {
        files: {
          'public/assets/css/main.min.css': [
            'assets_src/less/app.less'
          ]
        },
        options: {
          compress: true,
          // LESS source map
          // To enable, set sourceMap to true and update sourceMapRootpath based on your install
          sourceMap: false,
          sourceMapFilename: 'assets/css/main.min.css.map',
          sourceMapRootpath: '/'
        }
      }
    },
    uglify: {
      dist: {
        files: {
          'public/assets/js/scripts.min.js': [
            'assets_src/js/plugins/bootstrap/transition.js',
            'assets_src/js/plugins/bootstrap/alert.js',
            'assets_src/js/plugins/bootstrap/button.js',
            'assets_src/js/plugins/bootstrap/carousel.js',
            'assets_src/js/plugins/bootstrap/collapse.js',
            'assets_src/js/plugins/bootstrap/dropdown.js',
            'assets_src/js/plugins/bootstrap/modal.js',
            'assets_src/js/plugins/bootstrap/tooltip.js',
            'assets_src/js/plugins/bootstrap/popover.js',
            'assets_src/js/plugins/bootstrap/scrollspy.js',
            'assets_src/js/plugins/bootstrap/tab.js',
            'assets_src/js/plugins/bootstrap/affix.js',
            'assets_src/js/plugins/*.js',
            'assets_src/js/_*.js'
          ]
        },
        options: {
          // JS source map: to enable, uncomment the lines below and update sourceMappingURL based on your install
          // sourceMap: 'assets/js/scripts.min.js.map',
          // sourceMappingURL: '/app/themes/roots/assets/js/scripts.min.js.map'
        }
      }
    },
    imagemin: {
      compressImages: {
        options: {
          optimizationLevel: 3,
          pngquant: true
        },
        files: [{
          expand: true,
          cwd: 'assets_src/img/',
          src: ['**/*.{png,jpg,gif}'],
          dest: 'public/assets/img/'
        }]
      }
    },
    watch: {
      less: {
        files: [
          'assets_src/less/**/*.less',
        ],
        tasks: ['less']
      },
      js: {
        files: [
          '<%= jshint.all %>'
        ],
        tasks: ['jshint', 'uglify']
      },
      livereload: {
        // Browser live reloading
        // https://github.com/gruntjs/grunt-contrib-watch#live-reloading
        options: {
          livereload: 1337
        },
        files: [
          'public/assets/css/main.min.css',
          'public/assets/js/scripts.min.js',
          'app/**/*.php'
        ]
      }
    },
    clean: {
      dist: [
        'public/assets/css/main.min.css',
        'public/assets/js/scripts.min.js'
      ]
    }
  });

  // Load tasks
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks("grunt-contrib-imagemin");


  // Register tasks
  grunt.registerTask('default', [
    'clean',
    'less',
    'uglify',
    'imagemin'
  ]);
  grunt.registerTask('dev', [
    'watch'
  ]);

};
