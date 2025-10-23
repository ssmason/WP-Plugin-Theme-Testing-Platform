<?php

test('true is true', function () {
    expect(true)->toBeTrue();
});

test('false is false', function () {
    expect(false)->toBeFalse();
});

test('1 + 1 equals 2', function () {
    expect(1 + 1)->toBe(2);
});

test('string contains substring', function () {
    expect('WordPress')->toContain('Press');
});

test('array has key', function () {
    expect(['foo' => 'bar'])->toHaveKey('foo');
});

test('value is null', function () {
    expect(null)->toBeNull();
});

test('exception is thrown', function () {
    expect(fn () => throw new Exception('Error'))->toThrow(Exception::class);
});

test('SampleClass mock returns mocked value', function () {
    $mock = createSampleClassMock();
    expect($mock->getValue())->toBe('mocked value');
});

test('mockFunction returns mocked value', function () {
    $mockFn = mockFunction('mocked_option');
    expect($mockFn())->toBe('mocked_option');
});