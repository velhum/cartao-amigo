const
       autoprefixer  = require('gulp-autoprefixer')    // Adiciona prefixo de navegadores às propriedades CSS (-webkit, -moz, etc)
      ,browserSync   = require('browser-sync')         // Live server
      ,clean         = require('gulp-clean')           // Apaga um diretório
      ,concat        = require('gulp-concat')          // Concatena vários arquivos em um só
      ,cssmin        = require('gulp-cssmin')          // Minimiza os arquivos CSS
      ,csslint       = require('gulp-csslint')         // Exibe erros nos arquivos CSS
      ,gulp          = require('gulp')                 // O próprio Gulp
      ,htmlReplace   = require('gulp-html-replace')    // Substitui as chamadas a arquivos .js 
      ,imagemin      = require('gulp-imagemin')        // Reduz o tamanho de arquivos de imagens
      ,jshint        = require('gulp-jshint')          // Valida o código do script
      ,jshintStylish = require('jshint-stylish')       // Melhora a formatação da saída do jshint
      ,uglify        = require('gulp-uglify')          // Minimiza arquivos .js
      ,usemin        = require('gulp-usemin')          // Automatiza as tarefas de concatenação e minimização de arquivos
    ;
/*
** Referências:
** Fluxo de tarefas gulp 4: https://fettblog.eu/gulp-4-parallel-and-series/
*/

/*
** Remove a pasta ./dist
** { allowEmpty: true } para evitar erro caso a pasta não exista
*/

    function removeDir(cb){
        gulp.src('dist', { allowEmpty: true })
            .pipe(clean());
    }

/*
** Copia os arquivos do tema para a pasta /dist 
*/ 

    function copy(cb) {
        gulp.src('wp-content/themes/hestia-child/**/*')
            .pipe(gulp.dest('dist/hestia-child'));
    }

/*
** Otimiza imagens e copia para a pasta /dist
** O padrão "duplo asterisco barra asterisco", conhecido como "glob pattern"
** indica que todos os diretorios e arquivos dentro da pasta
** deve ser coipiado, sem ele, a pasta seria copiada, mas sem conteúdo
*/

    /*
    ** Pasta /hestia-child/assets/images
    */

    function otimizaImages(cb){
        gulp.src('wp-content/themes/hestia-child/assets/images/**/*.png')
            .pipe(imagemin())
            .pipe(gulp.dest('dist/hestia-child/assets/images'));
    }

    /*
    ** Pasta /hestia-child/assets/favicons
    */

    function otimizaFavicons(cb){
        gulp.src('wp-content/themes/hestia-child/assets/favicons/**/*.png')
            .pipe(imagemin())
            .pipe(gulp.dest('dist/hestia-child/assets/favicons'));
    }


/*
** Concatena todos arquivos .js em all.js
** OBS: a concatenação de sccripts não é uma boa no Wordpress
**      pois quebra a regra de carregar alguns scripts apenas em 
**      páginas específicas, por isso esta tarefa não será executada
*/

    function concatenaJs(cb){
        gulp.src([
            './dist/hestia-child/assets/js/jquery.mask.js',
            './dist/hestia-child/assets/js/jquery.visible.min.js',
            './dist/hestia-child/assets/js/associe-se.js',
            './dist/hestia-child/assets/js/mapa.js',
            './dist/hestia-child/assets/js/rede-credenciada.js',
            './dist/hestia-child/assets/js/simulator.js',
            ])
            .pipe(concat('all.js'))
            .pipe(uglify()) // Para minimizar o arquivo final
            .pipe(gulp.dest('dist/hestia-child'))
    }

/*
** Substitui a chamada de todos os scripts .js por all.js
** OBS: Também não será utilizada neste projeto
**
** Nos arquivos onde a substituição ocorrerá, é preciso
** delimitar o bloco da seguinte maneira:
** <!-- buil:js -->
**    [bloco de código a ser substituído]
** <!-- endbuild -->
*/

    function replaceHtml(cb){
        gulp.src('./dist/hestia-child/**/*')
            .pipe(htmlReplace({
                js: 'all.js'
            }))
            .pipe(gulp.dest('./dist/hestia-child'))

    }

/*
** Minimiza os arquivos .js
*/

    function minimizaJs(cb){
        gulp.src('./dist/hestia-child/assets/js/*.js')
            .pipe(uglify())
            .pipe(gulp.dest('./dist/hestia-child/assets/js'))
    }
    
/*
** Minimiza os arquivos CSS
*/

    function minimizaCSSassets(cb){
        
        gulp.src('./dist/hestia-child/assets/css/*.css')
            .pipe(cssmin())
            .pipe(autoprefixer())
            .pipe(gulp.dest('./dist/hestia-child/assets/css'))
            
        cb();

    }


/*
** Inicia o servidor web BrowserSync
*/

    function startServer(cb){
        // Configura o BrowserSync para trabalhar sozinho
        // browserSync.init({
        //     server: {
        //         baseDir: './'
        //     }
        // });
        // Configura o BrowserSync para trabalhar com o MAMP (Não funcionou)
        browserSync.init({
            server: {
                proxy: 'http://localhost:8888'
            }
        });
        // Fica de olho na pasta do tema e recarrega o site no navegador caso 
        // algum arquivo dentro dela seja alterado
        gulp.watch('./wp-content/themes/hestia-child/**/*').on('change', browserSync.reload);
    }

/*
** Exibe mensagens de erro na sintaxe do javascript em arquivos .js
** sempre que eles são salvos
*/

    function startHints(cb) {

        gulp.watch('./wp-content/themes/hestia-child/assets/js/*')
            .on('change', (path, stats) => {
                gulp.src(path)
                    .pipe(jshint())
                    .pipe(jshint.reporter(jshintStylish))
             });

        gulp.watch(['./wp-content/themes/hestia-child/assets/css/*', './wp-content/themes/hestia-child/style.css'])
            .on('change', (path, stats) => {
                console.log(`Linting arquivo ${path}`);
                gulp.src(path)
                    .pipe(csslint())
                    .pipe(csslint.formatter())
             });
    }


/*
** Exporta tarefas
*/

exports.copy               = copy;
exports.concatenaJs        = concatenaJs;
exports.minimizaJs         = minimizaJs;
exports.minimizaCSSassets  = minimizaCSSassets;
exports.otimizaImages      = otimizaImages;
exports.otimizaFavicons    = otimizaFavicons;
exports.removeDir          = removeDir;
exports.replaceHtml        = replaceHtml;
exports.startHints         = startHints;
exports.startServer        = startServer;

/*
** Tarefa Default
*/

exports.default = gulp.series(
                    removeDir,
                    copy,
                    gulp.parallel(
                        otimizaFavicons,
                        otimizaImages,
                        minimizaJs
                    )
                )