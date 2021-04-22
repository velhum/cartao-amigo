/*
** FONTE: https://css-tricks.com/gulp-for-wordpress-creating-the-tasks/
*/


import {
    dest
  , parallel
  , series
  , src
  , watch
} from 'gulp';
import autoprefixer from 'autoprefixer';
import browserSync from "browser-sync";
import cleanCss from 'gulp-clean-css';
import del from 'del';
import gulpif from 'gulp-if';
import imagemin from 'gulp-imagemin';
import info from "./package.json";
import postcss from 'gulp-postcss';
import replace from "gulp-replace";
import sass from 'gulp-sass';
import sourcemaps from 'gulp-sourcemaps';
import yargs from 'yargs';
import webpack from 'webpack-stream';
import zip from "gulp-zip";

const PRODUCTION = yargs.argv.prod;

/*
** Cria um proxy para o site no Mamp
*/

const server = browserSync.create();

export const serve = done => {
  server.init({
    proxy: "http://localhost:8888/cartao-amigo"
  });
  done();
};

/*
** Recarrega o site no navegador a cada alteração do código
*/

export const reload = done => {
  server.reload();
  done();
};

/*
** Compila, minimiza e cria o source map para os arquivos CSS 
** Trata arquivos CSS
** Se for para produção '--prod':
**    1. Compila os arquivos .scss para .css;
**    2. Insere prefixos para navegadores (-webkit, -moz, etc);
**    3. Minimiza o css
** Se não for para produção:
**    1. Compila os arquivos .scss para .css
**    2. Gera o sourcemap 
*/

export const styles = () => {
  return src('src/assets/scss/bundle.scss')
    .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
    .pipe(sass().on('error', sass.logError))
    .pipe(gulpif(PRODUCTION, postcss([ autoprefixer ])))
    .pipe(gulpif(PRODUCTION, cleanCss({compatibility:'ie8'})))
    .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
    .pipe(dest('../hestia-child/assets/css'))
    .pipe(server.stream()); // injeta o CSS alterado sem precisar recarregar o site
}

/*
** Trata os scripts
*/

export const scripts = () => {
  return src('src/assets/js/bundle.js')
  .pipe(webpack({
    module: {
      rules: [
        {
          test: /\.js$/,
          use: {
            loader: 'babel-loader',
            options: {
              presets: []
            }
          }
        }
      ]
    },
    mode: PRODUCTION ? 'production' : 'development',
    devtool: !PRODUCTION ? 'inline-source-map' : false,
    output: {
      filename: 'bundle.js'
    },
    externals: {
      jquery: 'jQuery'
    },
  }))
  .pipe(dest('../hestia-child/assets/js'));
}

/*
** Otimiza as imagens para o build de produção '--prod'
*/

export const images = () => {
  return src('src/assets/images/**/*.{jpg,jpeg,png,svg}')
    .pipe(gulpif(PRODUCTION, imagemin()))
    .pipe(dest('../hestia-child/assets/images'));
}

/*
** Apaga toda a pasta ../hestia-child
*/

export const clean = () => del(['../hestia-child']);

/*
** Copia os arquivos das pasta /src para a pasta ../hestia-child
*/

export const copy = () => {
  return src([
       'src/**/*'
      ,'!src/assets/{images,js,scss}'
      ,'!src/assets/{images,js,scss}/**/*'
    ])
    .pipe(dest('../hestia-child'));
}

/*
** Copia os arquivos das pasta /src para a pasta ../hestia-child
*/

export const copyJquery = () => {
  return src([
        'src/assets/js/jquery.mask.js'
       ,'src/assets/js/jquery.visible.min.js'
    ])
    .pipe(dest('../hestia-child/assets/js'));
}

/*
** Gera o arquivo .ZIP do tema
*/

export const compress = () => {
  return src([
    "**/*",
    "!node_modules{,/**}",
    "!bundled{,/**}",
    "!src{,/**}",
    "!.babelrc",
    "!.gitignore",
    "!gulpfile.babel.js",
    "!package.json",
    "!package-lock.json",
    ".DS_Store",
    "__MACOSX"
    ], { "allowEmpty": true })
    .pipe(replace("_themename", info.name))
    .pipe(zip(`${info.name}.zip`))
    .pipe(dest('bundled'));
  };

/* 
** Observa as pastas de estilos e imagens e executa
** as funções necessárias em caso de mudanças
*/

export const watchForChanges = () => {
  watch('src/scss/**/*.scss', styles);
  watch('src/images/**/*.{jpg,jpeg,png,svg}', series(images, reload));
  watch(['src/**/*','!src/{images,js,scss}','!src/{images,js,scss}/**/*'], series(copy, reload));
  watch('src/js/**/*.js', series(scripts, reload));
  watch("**/*.php", reload);
}

export const dev = series(
                    clean
                    , parallel(
                          styles
                        , images
                        , copy
                        , copyJquery
                        , scripts)
                    , watchForChanges
                    , serve);

export const build = series(
                      clean
                      , parallel(
                          styles
                          , images
                          , copy
                          , copyJquery
                          , scripts)
                      , compress);
export default dev;
