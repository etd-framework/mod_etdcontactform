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

JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidator');

if (isset($contact->error)) : ?>
    <div class="contact-error">
        <?php echo $contact->error; ?>
    </div>
<?php endif; ?>
<div class="etd-contact-form">
    <form id="contact-form" action="<?php echo JRoute::_('index.php'); ?>" method="post" class="form-validate well">
        <?php foreach ($form->getFieldsets() as $fieldset): ?>
            <?php if ($fieldset->name === 'captcha' && !$captchaEnabled) : ?>
                <?php continue; ?>
            <?php endif; ?>
            <?php $fields = $form->getFieldset($fieldset->name); ?>
            <?php if (count($fields)) : ?>
                <?php foreach ($fields as $field) : ?>
                    <?php if ($field->name === 'contact_email_copy' && !$params->get('show_email_copy')) : ?>
                        <?php continue; ?>
                    <?php endif; ?>
                    <div class="form-group">
                        <?php echo $field->label; ?>
                        <?php echo $field->input; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php endforeach; ?>
        <div class="form-group">
            <button class="btn btn-info btn-submit validate" type="submit"><?php echo JText::_('MOD_ETDCONTACTFORM_CONTACT_SEND'); ?></button>
            <input type="hidden" name="option" value="com_contact" />
            <input type="hidden" name="task" value="contact.submit" />
            <input type="hidden" name="return" value="<?php echo JUri::current(); ?>" />
            <input type="hidden" name="id" value="<?php echo $contact->slug; ?>" />
            <?php echo JHtml::_('form.token'); ?>
        </div>
    </form>
</div>
