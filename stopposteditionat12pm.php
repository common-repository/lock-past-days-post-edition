<?php
/*
Plugin Name: Lock edition of past days post 
Plugin URI: http://wordpress.org/extend/plugins/lock-past-days-post-edition/
Description: This plugin lock the edition possibility of existing posts after 12pm.
Version: 0.5
Author: Philippe RICHARD
License: GPL2


    Copyright 2010  Philippe RICHARD  (email : philrich123 at gmail dot com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


function stoppostedition_filter( $capauser, $capask, $param){
   global $wpdb;
   /* On ne touche pas aux droits de l'admin , et on ne fait pas de test si le post est sticky*/
   if ( empty( $capauser['administrator'] ) || !$capauser['administrator'] ) {
      /* On va filtrer les tests d'edition et d'effacement */
      if ( ( $param[0] == "edit_post") || ( $param[0] == "delete_post" ) ) {
         /* ici on test si la date du post concerne par l'operation est differente de la date du jour,
            si c'est le cas on met a¦ zero la capability correspondante dans le tableau des capabilities si elle existe */
         $post = get_post( $param[2] );

         /* Les messages qui ont été "stickés" en page d'accueil restent modifiable afin de pouvoir les "désticker" */
         $sticky= in_array( $post->ID, get_option('sticky_posts') ) ;
         /* Prise en compte du plugin "WP-Sticky" pour les mêmes raisons */
         if ( $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->prefix"."sticky" )!= NULL ) {
            $check = intval( $wpdb->get_var( "SELECT sticky_status FROM $wpdb->sticky WHERE sticky_post_id = $post->ID"));
            if ($check>0) {
               $sticky= true;
            }
         }

         if ( ! $sticky && (strcmp (substr(current_time('mysql'), 0, 10), substr($post->post_date, 0, 10)) > 0 ) ) {
            foreach( (array) $capask as $capasuppr) {
               if ( array_key_exists($capasuppr, $capauser) ) {
                  $capauser[$capasuppr]=0;
               }
            }
         }
      }
   }
   return $capauser;
}

add_filter('user_has_cap', 'stoppostedition_filter', 100, 3 );

?>
