module.exports = function (grunt) {

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        paths: {
            src: {
                js: 'js/src/**/*.js',
                sassMainFile: 'style.scss',
                sass: 'css/src'
            },
            dest: {
                js: 'js/build.js',
                jsMin: 'js/build.min.js',
                cssMainFile: 'style.css',
                css: 'css'
            }
        },
        curl: {
            'google-fonts-source': {
                src: 'https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyC5c-CLSBYVpJP84UB67ftC4CWaha8qOgQ',
                dest: 'assets/fonts/src/google-fonts.json'
            }
        },
        /* Concat assembles all the Javascript files into one uncompressed file. Good for development */
        concat: {
            theme: {
                options: {
                    separator: "\n\n"
                },
                src: '<%= paths.src.js %>',
                dest: '<%= paths.dest.js %>'
            }
        },
        /* Uglify assembles the Javascript files into a minified/compressed version of all the
        JavaScript files, regardless of build.js. Good for production */
        uglify: {
            options: {
                banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n',
                compress: true,
                mangle: true,
                sourceMap: true,
                sourceMapIncludeSources: true
            },
            theme: {
                src: '<%= paths.src.js %>',
                dest: '<%= paths.dest.jsMin %>'
            }
        },
        sass: {
            theme: {
                files: [{
                    '<%= paths.dest.cssMainFile %>': '<%= paths.src.sassMainFile %>'
                }, {
                    expand: true,
                    cwd: '<%= paths.src.sass %>',
                    src: ['**/*.scss'],
                    dest: '<%= paths.dest.css %>',
                    ext: '.css'
                }]
            }
        },
        makepot: {
            target: {
                options: {
                    // Notice: makepot uses PHP Regex rather the standard Globbing
                    include: [
                        '^(?!vendor\/.*$).*.php', // Includes recursively all PHP files except the libraries loaded by Composer
                    ],
                    exclude: [
                    ],
                    mainFile: 'style.css',
                    domainPath: '/languages',
                    type: 'wp-theme'
                }
            }
        },
        watch: {
            javascript: {
                files: ['<%= paths.src.js %>'],
                tasks: ['concat:theme', 'uglify:theme']
            },
            css: {
                files: ['style.scss', '<%= paths.src.sass %>/**/*.scss'],
                tasks: ['sass:theme']
            },
            i18n: {
                files: ['*.php', './**/*.php', 'style.css'],
                tasks: ['makepot']
            }
        }
    });

    // Load the plugins
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-wp-i18n');
    grunt.loadNpmTasks('grunt-contrib-watch');

    // Default task(s).
    grunt.registerTask('theme', ['uglify']);
    grunt.registerTask('javascript', ['watch']);
    grunt.registerTask('css', ['watch']);
    grunt.registerTask('i18n', ['watch']);
}