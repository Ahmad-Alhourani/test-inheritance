<?php
namespace App\Events\Backend\Test;

use Illuminate\Queue\SerializesModels;
/**
 * Class TestCreated.
 */
class TestCreated
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
