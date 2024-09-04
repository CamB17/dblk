<?
function dblk_custom_query_vars( $vars ){
  $vars[] = "wp";
  return $vars;
}
add_filter( 'query_vars', 'dblk_custom_query_vars');