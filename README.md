# cartao-amigo
Tema Wordpress para o site do Cartão Amigo

# Ao desenvolver
* clonar o repositório dentro da pasta 'wp-content/themes'
* `npm install`
* `npm start`
* Para exportar o tema `npm build`

## Pacotes utilizados
| Pacote | Descrição |
| ------ | --------- |
| Gulp | Automação de tarefas |
| Babel | Permite escrever o arquivo de configuração do Gulp (gulpfile.babel.js) em ES6 |
| Yargs | Permite a criação dos modos desenvolvimento e produção (gulp --prod) |
| Gulp-Sass | Compila os arquivos .scss para .css |
| Gulp-Clean-Css | Minifica os arquivos .css |
| Gulp-If | Permite executar ações baseadas em uma condição (if --prod == true) |
| Gulp-SourceMaps | Para os 'source maps' de minificação |
| Gulp-PostCSS | Para que o AutoPrefixer funcione |
| AutoPrefixer | Para inserir os prefixos específicos de navegadores (-webkit, -moz, etc)|
| Gulp-Imagemin | Otimização de imagens |
| Del | Apaga diretório |
| Webpack-Stream | Empacotamento (bundle) |
| Bable-Loader | Necessário para o Webpack |
| Browser-Sync | Recarrega o site toda vez que uma tarefa termina |
| Gulp_Zip | Compacta os arquivos do tema |
| Gulp-Replace | Substitui strings nos arquivos | 
| Gulp-Concat | Concatena arquivos texto |

Fonte: https://css-tricks.com/gulp-for-wordpress-creating-the-tasks/