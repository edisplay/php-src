--TEST--
Bug #80290: Double free when ASSERT_CALLBACK is used with a dynamic message
--FILE--
<?php

assert_options(ASSERT_CALLBACK, function($file, $line, $unused, $message) {
    var_dump($message);
});

$x = 'x';
assert(false, 'Dynamic message: ' . $x);

?>
--EXPECTF--
Deprecated: Constant ASSERT_CALLBACK is deprecated since 8.3, as assert_options() is deprecated in %s on line %d

Deprecated: Function assert_options() is deprecated since 8.3 in %s on line %d
string(18) "Dynamic message: x"

Fatal error: Uncaught AssertionError: Dynamic message: x in %s:%d
Stack trace:
#0 %s(%d): assert(false, 'Dynamic message...')
#1 {main}
  thrown in %s on line %d
