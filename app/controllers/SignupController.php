<?php

class SignupController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }
    public function registerAction()
    {
        $user = new Users();

        //Store and check for errors
        $success = $user->save($this->request->getPost(), array('name', 'email'));

        if ($success) {
            echo "Thanks for registering!";
        } else {
            echo "Sorry, the following problems were generated: ";
            foreach ($user->getMessages() as $message) {
                echo $message->getMessage(), "<br/>";
            }
        }

        $this->view->disable();
    }
}

/**
 *
 * Works:
 *CREATE TABLE `users` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`name` varchar(70) NOT NULL,
`email` varchar(70) NOT NULL,
PRIMARY KEY (`id`)
);
 *
 * Works:
 *CREATE TABLE `users` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`name` varchar(70) NOT NULL,
`email` varchar(70) NOT NULL,
`phone` varchar(25) NULL,
PRIMARY KEY (`id`)
);
 *
 * Error: phone required
 * CREATE TABLE `users` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`name` varchar(70) NOT NULL,
`email` varchar(70) NOT NULL,
`phone` varchar(25) NOT NULL,
PRIMARY KEY (`id`)
);
 */