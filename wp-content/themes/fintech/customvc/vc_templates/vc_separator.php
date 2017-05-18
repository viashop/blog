<?php

$output = '';
extract( shortcode_atts( array(
	'el_class'	 => '',
	'type'		 => '',
	'position'	 => '',
	'color'		 => '',
	'up'		 => '',
	'down'		 => '',
	'thickness'	 => '',
), $atts ) );

$fintechcommercegurus_css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'separator ', $this->settings['base'] );

$fintechcommercegurus_separator_classes = "";

$fintechcommercegurus_separator_classes .= $fintechcommercegurus_css_class . " ";
$fintechcommercegurus_separator_classes .= $type . " ";
$fintechcommercegurus_separator_classes .= $position . " ";
$fintechcommercegurus_margin_top = '';
$fintechcommercegurus_margin_bottom = '';
$fintechcommercegurus_background_color = '';
$fintechcommercegurus_height = '';

if ( $up != "" ) {
	$fintechcommercegurus_margin_top = 'margin-top:' . $up . 'px; ';
}

if ( $down != "" ) {
	$fintechcommercegurus_margin_bottom = 'margin-bottom:' . $down . 'px; ';
}

if ( $color != "" ) {
	$fintechcommercegurus_background_color = 'background-color:' . $color . ';';
}

if ( $thickness != "" ) {
	$fintechcommercegurus_height .= 'height:' . $thickness . 'px;';
}

?>

<div class="<?php echo esc_attr( $fintechcommercegurus_separator_classes ); ?>" style="<?php echo esc_attr( $fintechcommercegurus_margin_top) . esc_attr( $fintechcommercegurus_margin_bottom ) . esc_attr( $fintechcommercegurus_background_color ) . esc_attr( $fintechcommercegurus_height ); ?>">
</div>
<?php echo esc_attr( $this->endBlockComment( 'separator' ) ); ?>
