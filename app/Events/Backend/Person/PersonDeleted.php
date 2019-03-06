<?php namespace App\Events\Backend\Person;

use Illuminate\Queue\SerializesModels;
/**
 * Class PersonDeleted.
 */

class PersonDeleted
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
