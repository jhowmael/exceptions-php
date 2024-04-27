<?php


class testingVariables 
{
    public $value = 1.22;
    public $divider = 0;

    public function getBackTrace($skipLevels = 1)
    {
        $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, $skipLevels + 1);
        $callerIndex = $skipLevels;
        echo 'Current Function : ' . $trace[$callerIndex]['function'] . ' / BackTrace : File : ' . $trace[$callerIndex]['file'] . ' : Line : ' . $trace[$callerIndex]['line']. "</br>";
    }

    public function isInt()
    {
        try{
            if (!is_int($this->value)) {
                $this->getBackTrace();
                throw new Exception("The argument is not of type integer". "</br>");
            } else {
                echo "The argument is of type integer". "</br>";
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }
        finally{
            echo "Treating exceptions". "</br>";
        }
    }

    public function isDivisible()
    {
        try{
            if ($this->divider == 0) {
                $this->getBackTrace();
                throw new RangeException("The number cannot be divided by zero". "</br>");
            } else {
                $division = $this->value / $this->divider;
                echo "The Result is " . $division. "</br>";
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }
        finally{
            echo "Treating Range exception". "</br>";
        }
    }

    public function testing()
    {
        $this->isInt();
        $this->isDivisible();
    }
}

$testingVariables = New testingVariables();
$testingVariables->testing();
