<?php

    namespace Tests {

        class EnvironmentTest extends KnownTestCase {

            /** 
             * Assert a compatible version of PHP
             */
            function testPHPVersion() {
                $this->assertTrue(version_compare(phpversion(), '5.4', '>='));
            }
            
            /**
             * Assert that required extension modules are present
             */
            function testExtensions() {
                foreach (['curl','date','dom','gd','json','libxml','mbstring','mysql','reflection','session','simplexml', 'openssl'] as $extension) {
                    $this->assertTrue(extension_loaded($extension));
                }
            }
            
            /** 
             * Assert that configuration files have been installed correctly
             */
            function testKnownConfigFileExists() {
                $this->assertTrue(file_exists(dirname(dirname(__FILE__)). '/config.ini'));
            }
            
            /** 
             * Assert that htaccess is there
             */
            function testHTAccessExists() {
                $this->assertTrue(file_exists(dirname(dirname(__FILE__)). '/.htaccess'));
            }
            
            /**
             * Assert that the configuration has been loaded correctly
             */
            function testKnownConfig() {
                $this->assertFalse(\Idno\Core\site()->config()->isDefaultConfig());
            }
        }

    }