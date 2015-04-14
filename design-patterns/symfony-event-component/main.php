<?php

spl_autoload_register(function ($class) {
    include_once $class . '.php';
});

$eventDispatcher = new EventDispatcher();

$smsNotificationSubscriber = new SmsEventSubscriber(15);
$emailNotificationSubscriber = new EmailNotificationSubscriber(20);
$faxNotificationSubscriber = new FaxNotificationSubscriber(10);

$eventDispatcher->attachEventSubscriber('user.notification', $emailNotificationSubscriber)
    ->attachEventSubscriber('user.notification', $faxNotificationSubscriber)
    ->attachEventSubscriber('user.notification', $smsNotificationSubscriber);

$eventDispatcher->dispatch('user.notification', new NotificationEvent('Hello Observers!'));
