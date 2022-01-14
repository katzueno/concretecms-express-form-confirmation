<?php

defined('C5_EXECUTE') or die("Access Denied.");

$subject = t('Website Form Submission – %s', $formName);

$submittedData = '';
foreach ($attributes as $value) {
    if ("image_file" != $value->getAttributeTypeObject()->getAttributeTypeHandle() || ($dataSaveEnabled && "image_file" == $value->getAttributeTypeObject()->getAttributeTypeHandle())) {
        $submittedData .= $value->getAttributeKey()->getAttributeKeyDisplayName('text') . ":\r\n";
        $submittedData .= $value->getPlainTextValue() . "\r\n\r\n";
    }
}

$body = t("
There has been a submission of the form %s through your Concrete website.

%s

", $formName, $submittedData);
