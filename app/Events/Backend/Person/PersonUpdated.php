<?php namespace App\Events\Backend\Person;

use Illuminate\Queue\SerializesModels;
/**
 * Class PersonUpdated.
 */
class PersonUpdated
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
