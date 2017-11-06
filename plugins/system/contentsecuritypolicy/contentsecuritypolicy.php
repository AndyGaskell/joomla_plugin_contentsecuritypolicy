<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  System.ContentSecurityPolicy
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

class plgSystemContentSecurityPolicy extends JPlugin {

    
    public function __construct($subject, $config) {
        $this->doc = JFactory::getDocument();

        parent::__construct($subject, $config);

        $tag_content_string = "";



        # default-src:        Serves as a fallback for the other fetch directives.
        $default_src_enable = $this->params->get('default_src_enable', false);
        $default_src = $this->params->get('default_src', false);
        if ( $default_src_enable ) {
            $tag_content_string .= "default-src " . $default_src . "; ";
        }

        # child-src:         Defines the valid sources for web workers and nested browsing contexts loaded using elements such as <frame> and <iframe>.
        $child_src_enable = $this->params->get('child_src_enable', false);
        $child_src = $this->params->get('child_src', false);
        if ( $child_src_enable ) {
            $tag_content_string .= "default-src " . $child_src . "; ";
        }
        
        # connect-src:        Restricts the URLs which can be loaded using script interfaces
        $connect_src_enable = $this->params->get('connect_src_enable', false);
        $connect_src = $this->params->get('connect_src', false);
        if ( $connect_src_enable ) {
            $tag_content_string .= "default-src " . $connect_src . "; ";
        }

        # font-src:        Specifies valid sources for fonts loaded using @font-face.
        $font_src_enable = $this->params->get('font_src_enable', false);
        $font_src = $this->params->get('font_src', false);
        if ( $font_src_enable ) {
            $tag_content_string .= "default-src " . $font_src . "; ";
        }

        # frame-src:         Specifies valid sources for nested browsing contexts loading using elements such as <frame> and <iframe>.
        $frame_src_enable = $this->params->get('frame_src_enable', false);
        $frame_src = $this->params->get('frame_src', false);
        if ( $frame_src_enable ) {
            $tag_content_string .= "default-src " . $frame_src . "; ";
        }

        # img-src:         Specifies valid sources of images and favicons.
        $img_src_enable = $this->params->get('img_src_enable', false);
        $img_src = $this->params->get('img_src', false);
        if ( $img_src_enable ) {
            $tag_content_string .= "default-src " . $img_src . "; ";
        }

        # manifest-src:         Specifies valid sources of application manifest files.
        $manifest_src_enable = $this->params->get('manifest_src_enable', false);
        $manifest_src = $this->params->get('manifest_src', false);
        if ( $manifest_src_enable ) {
            $tag_content_string .= "default-src " . $manifest_src . "; ";
        }

        # media-src:         Specifies valid sources for loading media using the <audio> , <video> and <track> elements.
        $media_src_enable = $this->params->get('media_src_enable', false);
        $media_src = $this->params->get('media_src', false);
        if ( $media_src_enable ) {
            $tag_content_string .= "default-src " . $media_src . "; ";
        }

        # object-src:        Specifies valid sources for the <object>, <embed>, and <applet> elements.
        $object_src_enable = $this->params->get('object_src_enable', false);
        $object_src = $this->params->get('object_src', false);
        if ( $object_src_enable ) {
            $tag_content_string .= "default-src " . $object_src . "; ";
        }

        # script-src:         Specifies valid sources for JavaScript.
        $script_src_enable = $this->params->get('script_src_enable', false);
        $script_src = $this->params->get('script_src', false);
        if ( $script_src_enable ) {
            $tag_content_string .= "default-src " . $script_src . "; ";
        }

        # style-src:         Specifies valid sources for stylesheets.
        $style_src_enable = $this->params->get('style_src_enable', false);
        $style_src = $this->params->get('style_src', false);
        if ( $style_src_enable ) {
            $tag_content_string .= "default-src " . $style_src . "; ";
        }

        # worker-src:        Specifies valid sources for Worker, SharedWorker, or ServiceWorker scripts. 
        $worker_src_enable = $this->params->get('worker_src_enable', false);
        $worker_src = $this->params->get('worker_src', false);
        if ( $worker_src_enable ) {
            $tag_content_string .= "default-src " . $worker_src . "; ";
        }

        
        # https://developer.mozilla.org/en-US/docs/Web/HTTP/CSP
        $report_only = $this->params->get('report_only', false); 
        $report_uri = $this->params->get('report_uri', false);   
        $method = $this->params->get('method', "header");   
        $front_end = $this->params->get('front_end', false);
        $back_end = $this->params->get('back_end', false);

        if ( $tag_content_string ){
            if ( ( !JFactory::getApplication()->isAdmin() AND $front_end ) OR ( JFactory::getApplication()->isAdmin() AND $back_end )  ) {
                if ( $method == "header" ){
                    $this->app = JFactory::getApplication();
                    if ($report_only AND $report_uri) {
                        $this->app->setHeader('Content-Security-Policy-Report-Only', $tag_content_string . " report-uri " . $report_uri);
                    } else {
                        $this->app->setHeader('Content-Security-Policy', $tag_content_string);
                    } 
   
                } else {
                    if ($report_only AND $report_uri) {
                        $tag_string = "<meta http-equiv=\"Content-Security-Policy-Report-Only\" content=\"" . $tag_content_string . " report-uri " . $report_uri . "\">";
                    } else {
                        $tag_string = "<meta http-equiv=\"Content-Security-Policy\" content=\"" . $tag_content_string . "\">";
                    }
                    $this->doc->addCustomTag($tag_string);
                }
            }
        }
      


    }
}
