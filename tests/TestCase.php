<?php namespace Jacopo\Library\Tests;
/**
 * Test TestCase
 *
 * @author jacopo beschi jacopo@jacopobeschi.com
 */
class TestCase extends \Orchestra\Testbench\TestCase  {

    public function setUp()
    {
        parent::setUp();
    }

    protected function getPackageProviders()
    {
        return [
            'Jai\Library\LibraryServiceProvider',
        ];
    }

    protected function getPackageAliases()
    {
        return [
        ];
    }

    /**
     * @test
     **/
    public function dummy()
    {

    }
}