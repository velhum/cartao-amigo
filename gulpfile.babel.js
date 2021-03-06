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
import concat from 'gulp-concat';
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
    proxy: "http://localhost:8888/wordpress/"
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
  return src('src/assets/scss/style.scss')
    .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
    .pipe(sass().on('error', sass.logError))
    .pipe(gulpif(PRODUCTION, postcss([ autoprefixer ])))
    .pipe(gulpif(PRODUCTION, cleanCss({compatibility:'ie8'})))
    .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
    .pipe(dest(`../wp-content/themes/${info.theme_directory}/`))
    .pipe(server.stream()); // injeta o CSS alterado sem precisar recarregar o site
}

/*
** Trata os scripts da página inicial
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
  .pipe(dest(`../wp-content/themes/${info.theme_directory}/assets/js`));
}

/*
** Trata os script da página rede-credenciada
*/

export const scriptRedeCredenciada = () => {
  return src('src/assets/js/rede-credenciada.js')
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
      filename: 'rede-credenciada.js'
    },
    externals: {
      jquery: 'jQuery'
    },
  }))
  .pipe(dest(`../wp-content/themes/${info.theme_directory}/assets/js`));
}

/*
** Otimiza as imagens para o build de produção '--prod'
*/

export const images = () => {
  return src('src/assets/images/**/*.{jpg,jpeg,png,svg}')
    .pipe(gulpif(PRODUCTION, imagemin()))
    .pipe(dest(`../wp-content/themes/${info.theme_directory}/assets/images`));
}

/*
** Apaga toda a pasta ../wp-content/themes/${info.theme_directory}
*/

export const clean = () => del([`../wp-content/themes/${info.theme_directory}`], { force: true });

/*
** Copia os arquivos das pasta /src para a pasta ../wp-content/themes/${info.theme_directory}
*/

export const copy = () => {
  return src([
       'src/**/*'
      ,'!src/assets/{images,js,scss}'
      ,'!src/assets/{images,js,scss}/**/*'
    ])
    .pipe(dest(`../wp-content/themes/${info.theme_directory}`));
}

/*
** Copia os arquivos .GIF (que não são tratados pelo imagemin) para a pasta ../wp-content/themes/${info.theme_directory}
*/

export const copyGif = () => {
  return src([
       'src/**/*.gif'
    ])
    .pipe(dest(`../wp-content/themes/${info.theme_directory}`));
}

/*
** Copia os arquivos das pasta /src para a pasta ../wp-content/themes/${info.theme_directory}
*/

export const copyJquery = () => {
  return src([
        'src/assets/js/jquery.mask.js'
       ,'src/assets/js/jquery.visible.min.js'
    ])
    .pipe(dest(`../wp-content/themes/${info.theme_directory}/assets/js`));
}

/*
** Concatena o arquivo header.css com o arquivo minimizado styles.css
*/

export const concatCssHeader = () => {
  console.log(`
    Concatenando arquivos 
    ../wp-content/themes/${info.theme_directory}/header.css e 
    ../wp-content/themes/${info.theme_directory}/style.css
  `);
  return src([
        `../wp-content/themes/${info.theme_directory}/header.css`
      , `../wp-content/themes/${info.theme_directory}/style.css`
    ], { "allowEmpty": true })
    .pipe(concat(
      'style.css'
      ))
    .pipe(dest(`../wp-content/themes/${info.theme_directory}/`));
}

/*
** Gera o arquivo .ZIP do tema
*/

export const compress = () => {
  return src([
    `../wp-content/themes/${info.theme_directory}/**/*`,
    // "!node_modules{,/**}",
    // "!bundled{,/**}",
    // "!src{,/**}",
    // "!.babelrc",
    // "!.gitignore",
    // "!gulpfile.babel.js",
    // "!package.json",
    // "!package-lock.json",
    "!.DS_Store",
    "!__MACOSX"
    ], { "allowEmpty": true })
    .pipe(replace("_themename", info.theme_name))
    .pipe(replace("_themeversion", info.version))
    .pipe(zip(`${info.theme_directory}.zip`))
    .pipe(dest('bundled'));
  };

/* 
** Observa as pastas de estilos e imagens e executa
** as funções necessárias em caso de mudanças
*/

export const watchForChanges = () => {
  watch('src/assets/scss/**/*.scss', styles);
  watch('src/assets/images/**/*.{jpg,jpeg,png,svg,gif}', series(images, copyGif, reload));
  watch(['src/**/*','!src/{images,js,scss}','!src/{images,js,scss}/**/*'], series(copy, reload));
  watch('src/assets/js/**/*.js', series(scripts, scriptRedeCredenciada, reload));
  watch("**/*.php", reload);
}

export const dev = series(
                    clean
                    , parallel(
                          styles
                        , images
                        , copy
                        , copyJquery
                        , copyGif
                        , scripts
                        , scriptRedeCredenciada
                      )
                      , serve
                      , watchForChanges
                    );

export const build = series(
                      clean
                      , parallel(
                          styles
                          , images
                          , copy
                          , copyJquery
                          , copyGif
                          , scripts
                          , scriptRedeCredenciada
                        )
                      , concatCssHeader
                      , compress);
export default dev;
