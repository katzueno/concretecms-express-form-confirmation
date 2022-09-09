<?php

defined('C5_EXECUTE') or die("Access Denied.");

$formDisplayUrl = URL::to('/dashboard/reports/forms', 'view', $entity->getEntityResultsNodeId());
/**
 * @var $entity \Concrete\Core\Entity\Express\Entity
 * @var $associations \Concrete\Core\Entity\Express\Entry\Association[]
 */
if (!isset($associations)) {
    $associations = [];
}

$subject = t('Website Form Submission – %s', $formName);

$submittedData = '';
foreach ($attributes as $value) {
    if ("image_file" != $value->getAttributeTypeObject()->getAttributeTypeHandle() || ($dataSaveEnabled && "image_file" == $value->getAttributeTypeObject()->getAttributeTypeHandle())) {
        $submittedData .= $value->getAttributeKey()->getAttributeKeyDisplayName('text') . ":\r\n";
        $submittedData .= $value->getPlainTextValue() . "\r\n\r\n";
    }
}
foreach ($associations as $association) {
    $submittedData .= $association->getAssociation()->getTargetEntity()->getEntityDisplayName() .  ":\r\n";
    $selectedEntries = $association->getSelectedEntries();
    foreach ($selectedEntries as $selectedEntry) {
        $submittedData .= $selectedEntry->getLabel() . "\r\n";
    }
    $submittedData .= "\r\n";
}

$body = t("
There has been a submission of the form %s through your Concrete website.

%s

", $formName, $submittedData);
