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
    <form id="etd-contact-form" action="<?php echo JUri::getInstance()->toString(); ?>" method="post" class="form-validate">
        <fieldset>
            <?php foreach ($form->getFieldsets() as $fieldset) : ?>
                <?php $fields = $form->getFieldset($fieldset->name); ?>
                <?php foreach ($fields as $field) : ?>
                    <?php if($field->type == 'Checkbox') : ?>
                        <div class="checkbox">
                            <label id="<?php echo $field->id; ?>-lbl" for="<?php echo $field->id; ?>">
                                <input name="<?php echo $field->name; ?>" id="<?php echo $field->id; ?>" value="" type="checkbox">
                                <?php echo JText::_($form->getFieldAttribute($field->fieldname, 'label')); ?>
                            </label>
                        </div>
                    <?php else: ?>
                        <div class="form-group">
                            <?php if ($field->hidden) : ?>
                                <?php echo $field->input; ?>
                            <?php else: ?>
                                <?php echo $field->label; ?>
                                <div><?php echo $field->input; ?></div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endforeach; ?>
            <div class="form-actions">
                <button class="btn btn-primary validate" type="submit"><?php echo JText::_('MOD_CONTACT_CONTACT_SEND'); ?></button>
                <input type="hidden" name="option" value="com_contact" />
                <input type="hidden" name="task" value="contact.submit" />
                <input type="hidden" name="id" value="<?php echo $contact->slug; ?>" />
                <?php echo JHtml::_('form.token'); ?>
            </div>
        </fieldset>
    </form>
</div>
