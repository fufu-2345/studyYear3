import math

def factorial(n):
    if n < 0:
        return "ERROR"
    result = 1
    for i in range(1, n + 1):
        result *= i
    return result

def fibonacci(n):
    if n < 0:
        return "ERROR"
    a, b = 0, 1
    for _ in range(n):
        a, b = b, a + b
    return a

def is_prime(n):
    if n < 2:
        return False
    for i in range(2, int(math.sqrt(n)) + 1):
        if n % i == 0:
            return False
    return True

def mean(values: list) -> float:
    if len(values) == 0:
        return "ERROR"
    return sum(values) / len(values)

def median(arr):
    if len(arr) == 0:
        return "ERROR"
    values_sorted = sorted(arr)
    n = len(values_sorted)
    mid = n // 2
    if n % 2 == 0:
        return (values_sorted[mid - 1] + values_sorted[mid]) / 2
    return values_sorted[mid]

def std_dev(arr):
    if len(arr) == 0:
        return "ERROR"
    m = mean(arr)
    variance = sum((x - m) ** 2 for x in arr) / len(arr)
    return math.sqrt(variance)

def permutation(n,r):
    if r > n or n < 0 or r < 0:
        return "ERROR"
    return factorial(n) // factorial(n - r)

def plusAll(x,y,z):
    return x+y+z

def minusAll(x,y,z):
    return x-y-z

def mulAll(x,y,z):
    return x*y*z

def divAll(x,y,z):
    return x/y/z

def circle_area(r):
    if r < 0:
        return "ERROR"
    return math.pi * r ** 2

def square_area(x,y):
    if x < 0 | y < 0:
        return "ERROR"
    return x*y

def tri_area(x,y):
    if x < 0 | y < 0:
        return "ERROR"
    return 0.5*x*y

def percentOf(x,y):
    if x < 0 | y < 0:
        return "ERROR"
    return x*y/100

def percentOf(x,y):
    if x < 0 | y < 0:
        return "ERROR"
    return x*y/100

def celsius_to_fahrenheit(c):
    return (c * 9/5) + 32

def celsius_to_kevin(c):
    return c+273

def celsius_to_reaumur(c):
    return c*0.8

def kevin_to_fahrenheit(k):
    return (k - 273.15) * 9/5 + 32

def is_palindrome(n):
    n_str = str(n)
    return n_str == n_str[::-1]

def is_palindrome(n):
    n_str = str(n)
    return n_str == n_str[::-1]

def decimal_to_binary(n):
    if n == 0:
        return "0"
    binary = ""
    while n > 0:
        binary = str(n % 2) + binary
        n = n // 2
    return binary

def hours_to_min(h):
    if h < 0:
        return "ERROR"
    return h*60