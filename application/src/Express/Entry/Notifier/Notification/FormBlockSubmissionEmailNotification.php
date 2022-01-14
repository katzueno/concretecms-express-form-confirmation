<?php
namespace Application\Express\Entry\Notifier\Notification;

use Concrete\Core\Express\Entry\Notifier\Notification\FormBlockSubmissionEmailNotification as CoreFormBlockSubmissionEmailNotification;
use Concrete\Core\Entity\Attribute\Value\ExpressValue;
use Concrete\Core\Entity\Express\Entry;
use Concrete\Core\User\UserInfoRepository;
use Doctrine\ORM\EntityManager;

class FormBlockSubmissionEmailNotification extends CoreFormBlockSubmissionEmailNotification
{
   public function notify(Entry $entry, $updateType)
    {
        $files = [];
        if ($this->blockController->notifyMeOnSubmission) {
            $mh = $this->app->make('mail');
            $mh->to($this->getToEmail());
            $mh->from($this->getFromEmail($entry));
            $mh->replyto($this->getReplyToEmail($entry));
            $mh->addParameter('entity', $entry->getEntity());
            $mh->addParameter('formName', $this->getFormName($entry));
            $mh->addParameter("dataSaveEnabled", $this->blockController->storeFormSubmission);
            if (!$this->blockController->storeFormSubmission) {
                //if save submitted data is not active we send also files as attachments in email becuase it will be removed after entry remove
                foreach ($this->getAttributeValues($entry) as $attributeValue) {
                    if ($attributeValue->getAttributeTypeObject()->getAttributeTypeHandle() == "image_file") {
                        $file = $attributeValue->getValue();
                        if ($file) {
                            $files[] = $file;
                            $mh->addAttachment($file);
                        }
                    }
                }
            }
            $mh->addParameter('attributes', $this->getAttributeValues($entry));
            $mh->load('block_express_form_submission');
            if (empty($mh->getSubject())) {
                $mh->setSubject(t('Website Form Submission – %s', $this->getFormName($entry)));
            }
            $mh->sendMail();
            unset($mh);
            $mh = $this->app->make('mail');
            $mh->to($this->getReplyToEmail($entry));
            $mh->from($this->getFromEmail($entry));
            $mh->addParameter('entity', $entry->getEntity());
            $mh->addParameter('formName', $this->getFormName($entry));
            /* TBD: It won't include attachment files to user
            if (!$this->blockController->storeFormSubmission) {
                //if save submitted data is not active we send also files as attachments in email becuase it will be removed after entry remove
                foreach ($this->getAttributeValues($entry) as $attributeValue) {
                    if ($attributeValue->getAttributeTypeObject()->getAttributeTypeHandle() == "image_file") {
                        $file = $attributeValue->getValue();
                        if ($file) {
                            $files[] = $file;
                            $mh->addAttachment($file);
                        }
                    }
                }
            }
            */
            $mh->addParameter('attributes', $this->getAttributeValues($entry));
            $mh->load('block_express_form_submission_user');
            if (empty($mh->getSubject())) {
                $mh->setSubject(t('Website Form Submission – %s', $this->getFormName($entry)));
            }
            $mh->sendMail();
            //we have to delete the files as they are created automatically and are not attached to the entry save
            if (!$this->blockController->storeFormSubmission) {
                foreach ($files as $file) {
                    $file->delete();
                }
            }
        }
    }
}
