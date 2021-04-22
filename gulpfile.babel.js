import {
    src
  , dest
  , watch
} from 'gulp';
import autoprefixer from 'autoprefixer';
import cleanCss from 'gulp-clean-css';
import gulpif from 'gulp-if';
import postcss from 'gulp-postcss';
import sass from 'gulp-sass';
import sourcemaps from 'gulp-sourcemaps';
import yargs from 'yargs';

const PRODUCTION = yargs.argv.prod;

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
    .pipe(dest('dist/assets/css'));
}

/* 
** Observa arquivos .sccs e aplica a função styles
** toda vez que são feitas alterações 
*/

export const watchForChanges = () => {
  watch('src/assets/scss/**/*.scss', styles);
}