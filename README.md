# Notifications

## Laravel 4.2.x Package

This package provides an abstract layer to manage notifications (eg. email notifications) in Laravel Framework, fired by triggers. This package was developed to work with Laravel 4.2.x but it will work with 5.1 LTS.

## Instalation

1. Run `composer require jmpatricio/notifications`

2. Add `Jmpatricio\Notifications\NotificationsServiceProvider` to your service providers in `config/app.php`

3. Instalation Done.

## Basic usage

Create the trigger

	$notificationsManager = new \Jmpatricio\Notifications\Manager();
    $trigger = $notificationsManager->getTriggerRepository()->add('user.newRegistration', 'When the user register');
    
    
Once we have the trigger instace created, we can create an action to be fired. 

An action have a configuration, which depends of the notification provider.

	$configuration = [
        'view'      => 'emails/newUserRegistration',
        'fromEmail' => 'noreply@mywebsite.dev',
        'fromName'  => 'Notifications',
        'toEmail'   => 'some@email.dev',
        'toName'    => 'Staff user',
        'subject'   => 'New user registered!'
    ];
    $configuration = \Jmpatricio\Notifications\Providers\Configuration::createFromArray($configuration);


Now we have the desired configuration. Let's create the action for this trigger

	$notificationsManager->getActionRepository()->add($trigger, 'email', $configuration);
	
	
At this point we already have the action configured to run every time the trigger `user.newRegistration` is fired. Eg:

	// Payload will be the new user object This is only an example
	$payload = new stdClass();
    $payload->name = 'John';

    try {
        $notificationsManager->fire($trigger->slug, $payload);
    } catch (\Jmpatricio\Notifications\Exceptions\ConfigurationNotValidException $e){
        echo "<pre>";
            print_r($e->getErrors());
        echo "</pre>";
    }
    
    
