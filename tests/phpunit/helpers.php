<?php

/**
 * Create a mock for a sample class with a method.
 */
function createSampleClassMock() {
    $mock = Mockery::mock('SampleClass');
    $mock->shouldReceive('getValue')->andReturn('mocked value');
    return $mock;
}

/**
 * Returns a closure that mocks a function's return value.
 * Usage: $mockFn = mockFunction('mocked_value'); $result = $mockFn();
 */
function mockFunction($return) {
    return function () use ($return) {
        return $return;
    };
}
