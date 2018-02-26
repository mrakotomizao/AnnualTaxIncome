<?php


class AnnualTaxTest extends \PHPUnit\Framework\TestCase
{
    public function testCalculateTaxWithZeroValue() {
        $input = 0;
        $expected = 0;

        $annualTax = new \TestTdd\AnnualTaxIncome();
        $result = $annualTax->calculateTax($input);

        $this->assertEquals($expected, $result);
    }

    public function testCalculateFivePercent()
    {
        $input = 50000000;
        $expected = 50000000 * 0.05;

        $annualTax = new \TestTdd\AnnualTaxIncome();
        $result = $annualTax->calculateTax($input);

        $this->assertEquals($expected, $result);
    }

    public function testCalculateFifteenPercent()
    {
        $input = 75000000;
        $expected = 50000000 * 0.05 + 25000000 * 0.15;

        $annualTax = new \TestTdd\AnnualTaxIncome();
        $result = $annualTax->calculateTax($input);

        $this->assertEquals($expected, $result);
    }

    public function testCalculateTwentyFivePercent()
    {
        $input = 500000000;
        $expected = 50000000 * 0.05 + 200000000 * 0.15 + 250000000 * 0.25;

        $annualTax = new \TestTdd\AnnualTaxIncome();
        $result = $annualTax->calculateTax($input);

        $this->assertEquals($expected, $result);
    }

    public function testCalculateThirtyPercent()
    {
        $input = 750000000;
        $expected = 50000000 * 0.05 + 200000000 * 0.15 + 250000000 * 0.25 + 250000000 * 0.3;

        $annualTax = new \TestTdd\AnnualTaxIncome();
        $result = $annualTax->calculateTax($input);

        $this->assertEquals($expected, $result);
    }

    public function testCalculateTaxFailedWithNonNumericValue() {
        $input = "toto";

        $annualTax = new \TestTdd\AnnualTaxIncome();
        $result = $annualTax->calculateTax($input);
        $this->assertNull($result);
    }
}
