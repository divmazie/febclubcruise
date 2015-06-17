module.exports = function(grunt) {

    // Project configuration.
    grunt.initConfig({
        pkg : grunt.file.readJSON('package.json'),
        uglify : {
            bower : {
                options : {
                    mangle : true,
                    compress : true
                },
                files : {
                    'js/bower.min.js' : 'js/bower.js'
                }
            },
            options : {
                banner : '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
            },
            build : {
                src : 'src/<%= pkg.name %>.js',
                dest : 'build/<%= pkg.name %>.min.js'
            }
        },
        bower_concat : {
            all : {
                dest : 'js/bower.js'
                //cssDest: 'build/_bower.css'
            }
        }
    });

    require('load-grunt-tasks')(grunt);

    // Load the plugin that provides the "uglify" task.
    //grunt.loadNpmTasks('grunt-contrib-uglify');
    //grunt.loadNpmTasks('grunt-bower-concat');

    // Default task(s).
    grunt.registerTask('default', ['uglify']);

    grunt.registerTask('buildbower', ['bower_concat', 'uglify:bower']);

}; 