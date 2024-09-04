<?
$buttons = gsf('buttons');
foreach ( $buttons as $button ) {
    fm_button(...$button['button']);
}