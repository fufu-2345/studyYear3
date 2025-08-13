import math

def factorial(n: int) -> int:
    if n < 0:
        raise ValueError("n ต้องไม่เป็นค่าลบ")
    result = 1
    for i in range(1, n + 1):
        result *= i
    return result

def fibonacci(n: int) -> int:
    if n < 0:
        raise ValueError("n ต้องไม่เป็นค่าลบ")
    a, b = 0, 1
    for _ in range(n):
        a, b = b, a + b
    return a

def is_prime(num: int) -> bool:
    if num < 2:
        return False
    for i in range(2, int(math.sqrt(num)) + 1):
        if num % i == 0:
            return False
    return True

def mean(values: list) -> float:
    if len(values) == 0:
        raise ValueError("list ต้องไม่ว่าง")
    return sum(values) / len(values)

def median(values: list) -> float:
    if len(values) == 0:
        raise ValueError("list ต้องไม่ว่าง")
    values_sorted = sorted(values)
    n = len(values_sorted)
    mid = n // 2
    if n % 2 == 0:
        return (values_sorted[mid - 1] + values_sorted[mid]) / 2
    return values_sorted[mid]

def std_dev(values: list) -> float:
    if len(values) == 0:
        raise ValueError("list ต้องไม่ว่าง")
    m = mean(values)
    variance = sum((x - m) ** 2 for x in values) / len(values)
    return math.sqrt(variance)

def permutation(n: int, r: int) -> int:
    if r > n or n < 0 or r < 0:
        raise ValueError("ค่าไม่ถูกต้อง")
    return factorial(n) // factorial(n - r)

def combination(n: int, r: int) -> int:
    if r > n or n < 0 or r < 0:
        raise ValueError("ค่าไม่ถูกต้อง")
    return factorial(n) // (factorial(r) * factorial(n - r))

def circle_area(radius: float) -> float:
    if radius < 0:
        raise ValueError("รัศมีต้องไม่ติดลบ")
    return math.pi * radius ** 2

def distance_2d(x1: float, y1: float, x2: float, y2: float) -> float:
    return math.sqrt((x2 - x1) ** 2 + (y2 - y1) ** 2)
