<?php
use App\MoneyFormatter;
use App\NumberFormatter;
use PHPUnit\Framework\TestCase;
class MoneyFormatterTest extends TestCase
{
    // Fake NumberFormatter class
    private $mock;
    // Testing class - MoneyFormatter
    private $sut;

    public function setUp(): void
    {
        // Set Fake Class
        $this->mock = $this->getMockBuilder(NumberFormatter::class)->getMock();

        // Set Testing class
        $this->sut = new MoneyFormatter();
    }

    public function testFormatEurMillions()
    {
        // Expected
        $expected = '1.49M €';

        // Actual
        $FakeNumberFormatter = $this->mock;
        $FakeNumberFormatter->method('format')->with(1489201)->willReturn('1.49M');
        $FakeNumberFormatterResult = $FakeNumberFormatter->format(1489201);

        $result = $this->sut->EurFormatter($FakeNumberFormatterResult);

        // Test
        $this->assertSame($expected, $result);
    }

    public function testFormatDollarsMillions()
    {
        // Expected
        $expected = '$ 1.49M';

        // Actual
        $FakeNumberFormatter = $this->mock;
        $FakeNumberFormatter->method('format')->with(1489201)->willReturn('1.49M');
        $FakeNumberFormatterResult = $FakeNumberFormatter->format(1489201);

        $result = $this->sut->DollarFormatter($FakeNumberFormatterResult);

        // Test
        $this->assertSame($expected, $result);
    }

    public function testFormatEurThousands()
    {
        // Expected
        $expected = '580K €';

        // Actual
        $FakeNumberFormatter = $this->mock;
        $FakeNumberFormatter->method('format')->with(579870)->willReturn('580K');
        $FakeNumberFormatterResult = $FakeNumberFormatter->format(579870);

        $result = $this->sut->EurFormatter($FakeNumberFormatterResult);

        // Test
        $this->assertSame($expected, $result);
    }

    public function testFormatDollarsThousands()
    {
        // Expected
        $expected = '$ 580K';

        // Actual
        $FakeNumberFormatter = $this->mock;
        $FakeNumberFormatter->method('format')->with(579870)->willReturn('580K');
        $FakeNumberFormatterResult = $FakeNumberFormatter->format(579870);

        $result = $this->sut->DollarFormatter($FakeNumberFormatterResult);

        // Test
        $this->assertSame($expected, $result);
    }

    public function testFormatEur()
    {
        // Expected
        $expected = '5 874 €';

        // Actual
        $FakeNumberFormatter = $this->mock;
        $FakeNumberFormatter->method('format')->with(5874)->willReturn('5 874');
        $FakeNumberFormatterResult = $FakeNumberFormatter->format(5874);

        $result = $this->sut->EurFormatter($FakeNumberFormatterResult);

        // Test
        $this->assertSame($expected, $result);
    }

    public function testFormatDollars()
    {
        // Expected
        $expected = '$ 5 874';

        // Actual
        $FakeNumberFormatter = $this->mock;
        $FakeNumberFormatter->method('format')->with(5874)->willReturn('5 874');
        $FakeNumberFormatterResult = $FakeNumberFormatter->format(5874);

        $result = $this->sut->DollarFormatter($FakeNumberFormatterResult);

        // Test
        $this->assertSame($expected, $result);
    }

}