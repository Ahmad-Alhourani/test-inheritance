<?php namespace App\Events\Backend\Test;

use Illuminate\Queue\SerializesModels;
/**
 * Class TestUpdated.
 */
class TestUpdated
{
    use SerializesModels;
    /**
     * @var
     */

    public $test;

    /**
     * @param $test
     */
    public function __construct($test)
    {
        $this->test = $test;
    }
}
