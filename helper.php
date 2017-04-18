<?php
/**
 * @package     Joomla Contact Form Module
 *
 * @author      ETD Solutions (@etd-framework)
 * version      1.0.0
 * @copyright   Copyright (C) 2017 ETD Solutions. All rights reserved.
 * @license     Apache License version 2 or later; see LICENSE.md
 */

// No direct access
defined('_JEXEC') or die;

class ModContactHelper {

    public static function getContact($id) {

        $model = self::getContactModel();
        $model->setState('contact.id', $id);

        return $model->getItem($id);
    }

    public static function getContactForm() {
        $model = self::getContactModel();

        return $model->getForm();
    }

    public static function getContactModel() {

        static $model;

        if (!isset($model)) {

            JModelLegacy::addIncludePath(JPATH_ROOT . "/components/com_contact/models");
            JForm::addFormPath(JPATH_ROOT . "/components/com_contact/models/forms");
            JForm::addFieldPath(JPATH_ROOT . "/components/com_contact/models/fields");
            $model = JModelLegacy::getInstance('Contact', 'ContactModel', array(
                'ignore_request' => true
            ));
            $model->setState('params', JComponentHelper::getParams('com_contact'));

        }

        return $model;
    }
}
