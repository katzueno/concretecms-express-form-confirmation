# Concrete CMS patch for Express Form to send Confirmation Email to Form Submitter

Version 2.0.0
By @katzueno

This is override of express form of Concrete CMS so that you can send an notification email to form submitter.

This patch was tested and works with Concrete CMS 9.1.1 and later.

Please make sure to use [v1.0.0](https://github.com/katzueno/concretecms-express-form-confirmation/releases/tag/1.0.0) for Concrete CMS v 9.0.1~9.1.0.

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
