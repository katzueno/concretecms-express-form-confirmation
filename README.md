# Concrete CMS patch for Express Form to send Confirmation Email to Form Submitter

By @katzueno

This is override of express form of Concrete CMS so that you can send an notification email to form submitter.

This patch was tested with Concrete CMS 9.0.1

## Files to override & copy to your Concrete CMS

Please copy the following files on this repo to your Concrete CMS.

- application/blocks/express_form/controller.php
- application/bootstrap/autoload.php
- application/mail/block_express_form_submission_user.php
- application/src/Express/Entry/Notifier/Notification/FormBlockSubmissionEmailNotification.php

## Email Template

You can modify inside of `block_express_form_submission_user.php` to add some custom message.
If you want more dynamic processing, you may also need to modify `FormBlockSubmissionEmailNotification.php`

## LICENSE

MIT License.

## History

- 2022.1.14 Initial working patch
