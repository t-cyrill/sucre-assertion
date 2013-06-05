<?php
namespace Sucre;

use LogicException;

class AssertionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProviderForMustBool
     */
    public function testMustBool($value)
    {
        Assertion::mustBool($value);
    }

    public function dataProviderForMustBool()
    {
        return $this->getTypeData('bool_', true);
    }

    /**
     * @expectedException LogicException
     * @dataProvider dataProviderForMustBoolThrown
     */
    public function testMustBoolThrown($value)
    {
        Assertion::mustBool($value);
    }

    public function dataProviderForMustBoolThrown()
    {
        return $this->getTypeData('bool_', false);
    }

    /**
     * @dataProvider dataProviderForMustFloat
     */
    public function testMustFloat($value)
    {
        Assertion::mustFloat($value);
    }

    public function dataProviderForMustFloat()
    {
        return $this->getTypeData('float_', true);
    }

    /**
     * @expectedException LogicException
     * @dataProvider dataProviderForMustFloatThrown
     */
    public function testMustFloatThrown($value)
    {
        Assertion::mustFloat($value);
    }

    public function dataProviderForMustFloatThrown()
    {
        return $this->getTypeData('float_', false);
    }

    /**
     * @dataProvider dataProviderForMustInt
     */
    public function testMustInt($value)
    {
        Assertion::mustInt($value);
    }

    public function dataProviderForMustInt()
    {
        return $this->getTypeData('int_', true);
    }

    /**
     * @expectedException LogicException
     * @dataProvider dataProviderForMustIntThrown
     */
    public function testMustIntThrown($value)
    {
        Assertion::mustInt($value);
    }

    public function dataProviderForMustIntThrown()
    {
        return $this->getTypeData('int_', false);
    }

    /**
     * @dataProvider dataProviderForMustString
     */
    public function testMustString($value)
    {
        Assertion::mustString($value);
    }

    public function dataProviderForMustString()
    {
        return $this->getTypeData('string_', true);
    }

    /**
     * @expectedException LogicException
     * @dataProvider dataProviderForMustStringThrown
     */
    public function testMustStringThrown($value)
    {
        Assertion::mustString($value);
    }

    public function dataProviderForMustStringThrown()
    {
        return $this->getTypeData('string_', false);
    }

    private function getTypeData($prefix, $match)
    {
        $dataset = array(
            'bool_true' => true,
            'bool_false' => false,
            'string_empty' => '',
            'string_abc' => 'abc',
            'string_-1' => '-1',
            'string_0' => '0',
            'string_1' => '1',
            'string_123a' => '123a',
            'int_-1' => -1,
            'int_0' => 0,
            'int_1' => 1,
            'int_42' => 42,
            'float_0' => 0.0,
            'float_1' => 1.0,
            'float_42' => 42.0,
            'float_7e-10' => 7e-10,
            'null' => null,
            'array' => array(),
            'object_stdClass' => new \stdClass,
            'resource_stdout' => STDOUT,
        );

        $return_set = array();
        foreach ($dataset as $key => $val) {
            $result = (strpos($key, $prefix, 0) === 0);
            if ($result === $match) {
                $return_set[] = array($key => $val);
            }
        }

        return $return_set;
    }
}
