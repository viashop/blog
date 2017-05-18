<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa user o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações
// com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'vialoja_blog');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '123456');

/** Nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ',Qh~V@?nJe.fs}6P>]_Z> L,?(<s}[k|hJ.4!?.^^JE%F7KlwO[$x}QkBcRQYd<%');
define('SECURE_AUTH_KEY',  '_^XxRyY- stL]+g5j~i|D X`0%tu~vzH_}IW}(;K-x7Rs$V|PXZq*DbIfkJl]f`b');
define('LOGGED_IN_KEY',    'Rg,s]D}iyapUZ{+ytl3(941:c&QCy|7;A5hWZ%sMve/$f0e1L.q!!zcLQ/6m}_cB');
define('NONCE_KEY',        '1z>h^VDAVh1B[8/cN[mhO2/13O[n+tSJ`{D7i.c#:AjBnma>4PTiN2vl;K);/#];');
define('AUTH_SALT',        '`d=TkBLI$HqTsrvBMX$:h!y#NFgY*?C0v7EL:W6XSFQx/mCcC* rw1YZX .|<j`c');
define('SECURE_AUTH_SALT', 'VpL<m--IXst]C!/Jg3bWA],0#kLLk:zm[}wMGK. HSDEpUUgEW:bJTa-[H]S^@Cn');
define('LOGGED_IN_SALT',   'Y[R%>OI7B`|j?}2[C8XFes*+yH.DVGy?hfNJH^I*DKH`Dp,p&3TnCBh~XY]4R**C');
define('NONCE_SALT',       '@4&[(,)>7-8;8k*+9dalPt_nru1yNCO q1I%wIpm?v8D>z*S+Acqtcvbu*:BA(1=');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * para cada um um único prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'blog_';

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
