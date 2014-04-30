<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Descripción de block_simplehtml
 *
 * @author merma158 <jurbano@innodite.com en Innodite, C.A.> | javierurbano11@gmail.com
 */
class block_simplehtml extends block_base {
    public function init() {
        $this->title = get_string('simplehtml', 'block_simplehtml');
        $this->version = 2013110500;
    }
    
    function get_required_javascript() {
        parent::get_required_javascript();
 
        $this->page->requires->jquery();
        //$this->page->requires->jquery_plugin('ui');
        //$this->page->requires->jquery_plugin('ui-css');
    }
    
    function get_content() {
        global $USER;
        $context = context_block::instance($this->instance->id);
        
        if ($this->content !== NULL) {
            return $this->content;
        }
        
        if (has_capability('block/simplehtml:viewlist', $context, $USER->id, false)) {
            $this->content = new stdClass;
            $this->content->text   = '<input id="sendtoyii" type="button" value="Enviar Usuarios a Yii"/>';
            $this->content->footer = '<p><br>Bloque de Prueba</p>'
                                     . '<div id="resultset"></div>
                                        <script>
                                          $(function() {
                                            $( "#sendtoyii" ).click(function() {
                                                // Using YQL and JSONP
                                                $.ajax({
                                                    url: "blocks/simplehtml/process/send.php",
                                                    jsonp: "callback",
                                                    dataType: "jsonp",
                                                    // work with the response
                                                    success: function( response ) {
                                                        document.getElementById("resultset").innerHTML = "Exito.!";
                                                    }
                                                });
                                            });
                                          });
                                        </script>';
        }else{
            $this->content->footer = '';
        }

        return $this->content;
    }
    
    function specialization() {
        // Solo para asegurarse de que este método existe.
    }
    
    function instance_allow_config() {
        return true;
    }
    
    function instance_allow_multiple() {
        return true;
    }
    
    function has_config() {
        return true;
    }
    
    function config_save($data) {
        // Comportamiento por defecto: graba todas las variables como propiedades $CFG
        foreach ($data as $name => $value) {
            set_config($name, $value);
        }
        return true;
    }
    
    function hide_header() {
        return false;
    }
    /*
    function html_attributes() {
        return array(
            'onmouseover' => 'alert("Mouseover en simplehtml!");'
        );
    }*/
    
    function applicable_formats() {
        return array('site-index' => true,
                     'course-view' => true, 'course-view-social' => false,
                     'mod' => true, 'mod-quiz' => false);
    }
}