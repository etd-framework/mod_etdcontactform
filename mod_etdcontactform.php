<?php
/**
 * @package     Joomla Contact Form Module
 *
 * @author      ETD Solutions (@etd-framework)
 * version      1.0.0
 * @copyright   Copyright (C) 2017 ETD Solutions. All rights reserved.
 * @license     Apache License version 2 or later; see LICENSE.md
 */

defined('_JEXEC') or die;

require_once dirname(__FILE__) . '/helper.php';

$contact = ModContactHelper::getContact($params->get('id'));
if ($contact) {

    $cparams = JComponentHelper::getParams('com_contact');
    $contact->params = $cparams->merge($contact->params);

    $form = ModContactHelper::getContactForm();

    $captchaEnabled = false;
    $captchaSet     = $cparams->get('captcha', JFactory::getApplication()->get('captcha', '0'));

    foreach (JPluginHelper::getPlugin('captcha') as $plugin) {
        if ($captchaSet === $plugin->name) {
            $captchaEnabled = true;
            break;
        }
    }

    require JModuleHelper::getLayoutPath('mod_etdcontactform', $params->get('layout', 'default'));
}
