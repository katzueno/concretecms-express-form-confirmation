<?php

namespace Concrete\Block\ExpressForm;

use Concrete\Block\ExpressForm\Conttoller as CoreController;
use Application\Express\Entry\Notifier\Notification\FormBlockSubmissionEmailNotification;
use Concrete\Core\Express\Entry\Notifier\Notification\FormBlockSubmissionNotification;

class Controller extends CoreController
{
    public function getNotifications()
    {
        $notifications = [new FormBlockSubmissionEmailNotification($this->app, $this)];
        //if we don't save data we must not use this notifier because entry is already not saved
        if ($this->areFormSubmissionsStored()) {
            array_unshift($notifications, new FormBlockSubmissionNotification($this->app, $this));
        }

        return $notifications;
    }
}
