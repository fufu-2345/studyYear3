import math
import pytest
import demo as mf

def test_factorial():
    assert mf.factorial(0) == 1
    assert mf.factorial(5) == 120
    with pytest.raises(ValueError):
        mf.factorial(-1)

def test_fibonacci():
    assert mf.fibonacci(0) == 0
    assert mf.fibonacci(1) == 1
    assert mf.fibonacci(5) == 5
    with pytest.raises(ValueError):
        mf.fibonacci(-5)

def test_is_prime():
    assert mf.is_prime(2) is True
    assert mf.is_prime(4) is False
    assert mf.is_prime(17) is True
    assert mf.is_prime(1) is False

def test_mean():
    assert mf.mean([1, 2, 3]) == 2
    with pytest.raises(ValueError):
        mf.mean([])

def test_median():
    assert mf.median([1, 3, 2]) == 2
    assert mf.median([1, 2, 3, 4]) == 2.5
    with pytest.raises(ValueError):
        mf.median([])

def test_std_dev():
    assert math.isclose(mf.std_dev([1, 2, 3]), 0.8164965809, rel_tol=1e-9)
    with pytest.raises(ValueError):
        mf.std_dev([])

def test_permutation():
    assert mf.permutation(5, 2) == 20
    with pytest.raises(ValueError):
        mf.permutation(3, 5)

def test_combination():
    assert mf.combination(5, 2) == 10
    with pytest.raises(ValueError):
        mf.combination(2, 3)

def test_circle_area():
    assert math.isclose(mf.circle_area(1), math.pi, rel_tol=1e-9)
    with pytest.raises(ValueError):
        mf.circle_area(-1)

def test_distance_2d():
    assert math.isclose(mf.distance_2d(0, 0, 3, 4), 5.0, rel_tol=1e-9)
