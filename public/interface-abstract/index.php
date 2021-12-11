<?php
interface work
{
    public  function work();
}
interface sleep {
    public  function  sleep();
}
class HumanWorker implements work, sleep
{
    public  function work()
    {
        var_dump('works');
    }

    public  function  sleep()
    {
        var_dump('sleep');
    }

}

class RobotWorker implements sleep
{
    public  function work()
    {
        var_dump('works');
    }
}