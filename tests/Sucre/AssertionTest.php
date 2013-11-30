<?php
namespace Sucre;

use LogicException;

class AssertionTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        Assertion::enable();
    }

    public function testCombinedAssertion()
    {
        $a = 0;
        $b = null;
        Assertion::factory()
            ->mustNotNull($a)
            ->mustNull($b)
            ->assert();

    }

    public function testAssertionDisable()
    {
        $value = 'foo';
        Assertion::disable();
        self::assertTrue(Assertion::factory()->mustBool($value)->assert());
    }

    /**
     * @dataProvider dataProviderForMustBool
     */
    public function testMustBool($value)
    {
        self::assertTrue(Assertion::factory()->mustBool($value)->assert());
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
        Assertion::factory()->mustBool($value)->assert();
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
        self::assertTrue(Assertion::factory()->mustFloat($value)->assert());
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
        Assertion::factory()->mustFloat($value)->assert();
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
        self::assertTrue(Assertion::factory()->mustInt($value)->assert());
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
        Assertion::factory()->mustInt($value)->assert();
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
        self::assertTrue(Assertion::factory()->mustString($value)->assert());
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
        Assertion::factory()->mustString($value)->assert();
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
