<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Descripción de settings
 *
 * @author merma158 <jurbano@innodite.com en Innodite, C.A.> | javierurbano11@gmail.com
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
    $settings->add(new admin_setting_configtext('block_simplehtml', get_string('testtime', 'block_simplehtml'),
                   get_string('testimedf', 'block_simplehtml'), 5, PARAM_INT));
}