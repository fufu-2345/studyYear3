import pytest
import demo as a

def test_factorial():
    assert a.factorial(12) == 479001600
    assert a.factorial(0) == 1

def test_fibonacci():
    assert a.fibonacci(10) == 55
    assert a.fibonacci(0) == 0
    
def test_is_prime():
    assert a.is_prime(-21) == False
    assert a.is_prime(1000000007) == True
    
def test_median():
    assert a.median([5,1,2,3,4])==3
    
def test_std_dev():
    assert a.std_dev([5,1,2,3,4]) == 1.4142135623730951
    assert a.std_dev([1,1,1,1,1,1,1,1,1,1,1,50]) == 13.542884560617882
    
def test_permutation():
    assert a.permutation(10,10) == 3628800
    assert a.permutation(5,5) == 120
    
def test_plusAll():
    assert a.plusAll(1,2,3) == 6
    assert a.plusAll(999,20,-999) == 20
    
def test_minusAll():
    assert a.minusAll(1,2,3) == -4
    assert a.minusAll(999,20,-999) == 1978
    
def test_mulAll():
    assert a.mulAll(1,2,3) == 6
    assert a.mulAll(-1,-2,35) == 70   
    
def test_divAll():
    assert a.divAll(9,3,3) == 1
    assert a.divAll(-35,5,-7) == 1   
    
def test_circle_area():
    assert a.circle_area(10) == 314.1592653589793
    assert a.circle_area(250) == 196349.54084936206
    
def test_square_area():
    assert a.square_area(10,10) == 100
    assert a.square_area(22,33) == 726
    
def test_tri_area():
    assert a.tri_area(10,10) == 50
    assert a.tri_area(22,33) == 363
    
def test_percentOf():
    assert a.percentOf(123,10) == 12.3
    assert a.percentOf(555,50) == 277.5
    
def test_celsius_to_fahrenheit():
    assert a.celsius_to_fahrenheit(35) == 95
    assert a.celsius_to_fahrenheit(-1) == 30.2
    
def test_celsius_to_reaumur():
    assert a.celsius_to_reaumur(10) == 8
    assert a.celsius_to_reaumur(40) == 32
    
def test_kevin_to_fahrenheit():
    assert a.kevin_to_fahrenheit(273.15) == 32
    assert a.kevin_to_fahrenheit(310.15) == 98.60

def test_is_palindrome():
    assert a.is_palindrome("123321") == True
    assert a.is_palindrome("123") == False
    
def test_decimal_to_binary():
    assert a.decimal_to_binary(17) == "10001"
    assert a.decimal_to_binary(256) == "100000000"
    
def test_hours_to_min():
    assert a.hours_to_min(1.2) == 72
    assert a.hours_to_min(10) == 600