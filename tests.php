<?php

require_once 'utils.php';
use General\Utils;

function testReturnType(){
    $min = 1;
    $max= 10;
    $result = Utils::getSecureRandom($min, $max);
    assert(is_int($result), "Security Validation Failed: Result is not an integer");

    echo "Test 1 Passed: Security Validation, Return Type {$result} is Of Integer Type \n";
}
// Test 2: Basic Range Verification
function testBasicRange() {
    $min = mt_rand(1, 999699);
    $max = mt_rand($min + 1, $min + 299); // Ensure the range difference is < 300

    $result = Utils::getSecureRandom($min, $max);
    assert($result >= $min && $result <= $max, "Basic Range Test Failed");
    assert(($max - $min) < 300, "Range difference must be less than 300");

    echo "Test 2 Passed: Basic Range Testing (min: $min, max: $max, difference: " . ($max - $min) . ") and Secure Random Number is {$result} \n ";
}

// Test 3: Stress Testing
function testLargeRange() {
    $min = mt_rand(1, 999699);
    $max = mt_rand($min + 300, $min + 1000000); // Ensure the range difference is >= 300

    $result = Utils::getSecureRandom($min, $max);
    assert($result >= $min && $result <= $max, "Stress Test Failed");
    assert(($max - $min) >= 300, "Range difference must be at least 300");

    echo "Test 3 Passed: Stress Testing (min: $min, max: $max, difference: " . ($max - $min) . ")\n";
}

// Test 3: Edge Case Testing
function testEdgeCases() {
    // Identical min and max
    $min = 5;
    $max = 5;
    $result = Utils::getSecureRandom($min, $max);
    assert($result == 5, "Edge Case Test Failed for identical min and max");
    echo "Test 4 Passed: Zero Range gives Result {$result} \n ";
}

// Test 6: Randomness Test
function testRandomness() {
    $min = 1;
    $max = 20;
    $iterations = mt_rand($min, $max);
    $previousResults = [];

    for ($i = 0; $i < $iterations; $i++) {
        $result = Utils::getSecureRandom($min, $max);
        
        // Ensure that the result is within the expected range
        assert($result >= $min && $result <= $max, "Randomness Test Failed: $result is not between $min and $max");
        
        // Check that the result is not repeating too often (i.e., randomness is happening)
        if (in_array($result, $previousResults)) {
            echo "Test 5 Moderate: Random number {$result} was repeated.\n";
            return;
        }

        $previousResults[] = $result;
    }

    echo "Test 6 Passed: Randomness Test - All values are unique in {$iterations} iterations.\n";
}


// Run all tests
testReturnType();
testBasicRange();
testLargeRange();
testEdgeCases();
testRandomness();