<?php
/**
 * moosh - Moodle Shell
 *
 * @copyright  2012 onwards Tomasz Muras
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace Moosh\Command\Moodle23\Course;
use Moosh\MooshCommand;

class CourseDelete extends MooshCommand
{
    public function __construct()
    {
        parent::__construct('delete', 'course');

        $this->addArgument('name');

        //$this->addOption('t|test', 'option with no value');
        //$this->addOption('o|option:', 'option with value and default', 'default');

    }

    public function execute()
    {
        
        global $CFG, $DB, $COURSE;
        $table='course';
        $select="fullname LIKE '".$this->arguments[0]."%'";
        $courses = $DB->get_records_select($table,$select);
        
        foreach ($courses as $course){
            delete_course($course);
        }
        
        
    }
}
