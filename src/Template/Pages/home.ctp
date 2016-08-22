<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;

if (!Configure::read('debug')):
    throw new NotFoundException();
endif;

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
</head>
<body class="home">
    <header>
        <div class="header-image">
            <?= $this->Html->image('http://cakephp.org/img/cake-logo.png') ?>
            <h1><?php echo $this->requestAction('app/get-translate/'.base64_encode('Get the Ovens Ready'));?></h1>
        </div>
    </header>
    <div id="content">
        <div class="row">
            <?php Debugger::checkSecurityKeys(); ?>
            <div id="url-rewriting-warning" class="columns large-12 url-rewriting checks">
                <p class="problem"><?php echo $this->requestAction('app/get-translate/'.base64_encode('URL rewriting is not properly configured on your server'));?>.</p>
                <p>
                    1) <a target="_blank" href="http://book.cakephp.org/3.0/en/installation.html#url-rewriting"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Help me configure it'));?></a>
                </p>
                <p>
                    2) <a target="_blank" href="http://book.cakephp.org/3.0/en/development/configuration.html#general-configuration"><?php echo $this->requestAction('app/get-translate/'.base64_encode("I don't / can't use URL rewriting"));?></a>
                </p>
            </div>
            <div class="columns large-5 platform checks">
                <?php if (version_compare(PHP_VERSION, '5.4.16', '>=')): ?>
                    <p class="success"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Your version of PHP is 5.4.16 or higher'));?>.</p>
                <?php else: ?>
                    <p class="problem"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Your version of PHP is too low. You need PHP 5.4.16 or higher to use CakePHP'));?>.</p>
                <?php endif; ?>

                <?php if (extension_loaded('mbstring')): ?>
                    <p class="success"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Your version of PHP has the mbstring extension loaded.</p>
                <?php else: ?>'));?>
                    <p class="problem"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Your version of PHP does NOT have the mbstring extension loaded'));?>.</p>;
                <?php endif; ?>

                <?php if (extension_loaded('openssl')): ?>
                    <p class="success"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Your version of PHP has the openssl extension loaded'));?>.</p>
                <?php elseif (extension_loaded('mcrypt')): ?>
                    <p class="success"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Your version of PHP has the mcrypt extension loaded'));?>.</p>
                <?php else: ?>
                    <p class="problem"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Your version of PHP does NOT have the openssl or mcrypt extension loaded'));?>.</p>
                <?php endif; ?>

                <?php if (extension_loaded('intl')): ?>
                    <p class="success"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Your version of PHP has the intl extension loaded'));?>.</p>
                <?php else: ?>
                    <p class="problem"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Your version of PHP does NOT have the intl extension loaded'));?>.</p>
                <?php endif; ?>
            </div>
            <div class="columns large-6 filesystem checks">
                <?php if (is_writable(TMP)): ?>
                    <p class="success"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Your tmp directory is writable'));?>.</p>
                <?php else: ?>
                    <p class="problem"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Your tmp directory is NOT writable'));?>.</p>
                <?php endif; ?>

                <?php if (is_writable(LOGS)): ?>
                    <p class="success"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Your logs directory is writable'));?>.</p>
                <?php else: ?>
                    <p class="problem"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Your logs directory is NOT writable'));?>.</p>
                <?php endif; ?>

                <?php $settings = Cache::config('_cake_core_'); ?>
                <?php if (!empty($settings)): ?>
                    <p class="success">The <em><?= $settings['className'] ?><?php echo $this->requestAction('app/get-translate/'.base64_encode('Engine'));?></em> <?php echo $this->requestAction('app/get-translate/'.base64_encode('is being used for core caching. To change the config edit config/app.php'));?></p>
                <?php else: ?>
                    <p class="problem"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Your cache is NOT working. Please check the settings in config/app.php'));?></p>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="columns large-12 database checks">
                <?php
                    try {
                        $connection = ConnectionManager::get('default');
                        $connected = $connection->connect();
                    } catch (Exception $connectionError) {
                        $connected = false;
                        $errorMsg = $connectionError->getMessage();
                        if (method_exists($connectionError, 'getAttributes')):
                            $attributes = $connectionError->getAttributes();
                            if (isset($errorMsg['message'])):
                                $errorMsg .= '<br />' . $attributes['message'];
                            endif;
                        endif;
                    }
                ?>
                <?php if ($connected): ?>
                    <p class="success"><?php echo $this->requestAction('app/get-translate/'.base64_encode('CakePHP is able to connect to the database'));?>.</p>
                <?php else: ?>
                    <p class="problem"><?php echo $this->requestAction('app/get-translate/'.base64_encode('CakePHP is NOT able to connect to the database'));?>.<br /><br /><?= $errorMsg ?></p>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="columns large-6">
                <h3><?php echo $this->requestAction('app/get-translate/'.base64_encode('Editing this Page'));?></h3>
                <ul>
                    <li><?php echo $this->requestAction('app/get-translate/'.base64_encode('To change the content of this page, edit: src/Template/Pages/home.ctp.'));?></li>
                    <li><?php echo $this->requestAction('app/get-translate/'.base64_encode('You can also add some CSS styles for your pages at: webroot/css/.'));?></li>
                </ul>
            </div>
            <div class="columns large-6">
                <h3><?php echo $this->requestAction('app/get-translate/'.base64_encode('Getting Started'));?></h3>
                <ul>
                    <li><a target="_blank" href="http://book.cakephp.org/3.0/en/"><?php echo $this->requestAction('app/get-translate/'.base64_encode('CakePHP 3.0 Docs'));?></a></li>
                    <li><a target="_blank" href="http://book.cakephp.org/3.0/en/tutorials-and-examples/bookmarks/intro.html"><?php echo $this->requestAction('app/get-translate/'.base64_encode('The 15 min Bookmarker Tutorial'));?></a></li>
                    <li><a target="_blank" href="http://book.cakephp.org/3.0/en/tutorials-and-examples/blog/blog.html"><?php echo $this->requestAction('app/get-translate/'.base64_encode('The 15 min Blog Tutorial'));?></a></li>
                </ul>
                <p>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="columns large-12">
                <h3 class=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('More about Cake'));?></h3>
                <p>
                    <?php echo $this->requestAction('app/get-translate/'.base64_encode('CakePHP is a rapid development framework for PHP which uses commonly known design patterns like Front Controller and MVC'));?>.
                </p>
                <p>
                    <?php echo $this->requestAction('app/get-translate/'.base64_encode('Our primary goal is to provide a structured framework that enables PHP users at all levels to rapidly develop robust web applications, without any loss to flexibility'));?>.
                </p>
                <ul>
                    <li><a href="http://cakefoundation.org/"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Cake Software Foundation'));?></a>
                    <ul><li><?php echo $this->requestAction('app/get-translate/'.base64_encode('Promoting development related to CakePHP'));?></li></ul></li>
                    <li><a href="http://www.cakephp.org"><?php echo $this->requestAction('app/get-translate/'.base64_encode('CakePHP'));?></a>
                    <ul><li><?php echo $this->requestAction('app/get-translate/'.base64_encode('The Rapid Development Framework'));?></li></ul></li>
                    <li><a href="http://book.cakephp.org/3.0/en/"><?php echo $this->requestAction('app/get-translate/'.base64_encode('CakePHP Documentation'));?></a>
                    <ul><li><?php echo $this->requestAction('app/get-translate/'.base64_encode('Your Rapid Development Cookbook'));?></li></ul></li>
                    <li><a href="http://api.cakephp.org/3.0/"><?php echo $this->requestAction('app/get-translate/'.base64_encode('CakePHP API'));?></a>
                    <ul><li><?php echo $this->requestAction('app/get-translate/'.base64_encode('Quick Reference'));?></li></ul></li>
                    <li><a href="http://bakery.cakephp.org"><?php echo $this->requestAction('app/get-translate/'.base64_encode('The Bakery'));?></a>
                    <ul><li><?php echo $this->requestAction('app/get-translate/'.base64_encode('Everything CakePHP'));?></li></ul></li>
                    <li><a href="http://plugins.cakephp.org"><?php echo $this->requestAction('app/get-translate/'.base64_encode('CakePHP plugins repo'));?></a>
                    <ul><li><?php echo $this->requestAction('app/get-translate/'.base64_encode('A comprehensive list of all CakePHP plugins created by the community'));?></li></ul></li>
                    <li><a href="https://groups.google.com/group/cake-php"><?php echo $this->requestAction('app/get-translate/'.base64_encode('CakePHP Google Group'));?></a>
                    <ul><li><?php echo $this->requestAction('app/get-translate/'.base64_encode('Community mailing list'));?></li></ul></li>
                    <li><a href="irc://irc.freenode.net/cakephp"><?php echo $this->requestAction('app/get-translate/'.base64_encode('irc.freenode.net #cakephp'));?></a>
                    <ul><li><?php echo $this->requestAction('app/get-translate/'.base64_encode('Live chat about CakePHP'));?></li></ul></li>
                    <li><a href="https://github.com/cakephp/"><?php echo $this->requestAction('app/get-translate/'.base64_encode('CakePHP Code'));?></a>
                    <ul><li><?php echo $this->requestAction('app/get-translate/'.base64_encode('For the Development of CakePHP Git repository, Downloads'));?></li></ul></li>
                    <li><a href="https://github.com/cakephp/cakephp/issues"><?php echo $this->requestAction('app/get-translate/'.base64_encode('CakePHP Issues'));?></a>
                    <ul><li><?php echo $this->requestAction('app/get-translate/'.base64_encode('CakePHP issues and pull requests'));?></li></ul></li>
                    <li><a href="http://training.cakephp.org/"><?php echo $this->requestAction('app/get-translate/'.base64_encode('CakePHP Training'));?></a>
                    <ul><li><?php echo $this->requestAction('app/get-translate/'.base64_encode('Learn to use the CakePHP framework'));?></li></ul></li>
                    <li><a href="http://certification.cakephp.org/"><?php echo $this->requestAction('app/get-translate/'.base64_encode('CakePHP Certification'));?></a>
                    <ul><li><?php echo $this->requestAction('app/get-translate/'.base64_encode('Become a certified CakePHP developer'));?></li></ul></li>
                </ul>
            </div>
        </div>
    </div>
    <footer>
    </footer>
</body>
</html>
