# Median Heap Challenge

PHP does not have a built in function for calculating the median of an array. 

Write an implementation of a “MedianHeap” class that takes an array of numbers and can output it’s median. 

Also write a simple array_median() function that does not utilize heap strategies.

> Please benchmark the 2 solutions and determine which is faster.

> Please give a brief explanation on why you believe the faster implementation is faster.


## Thoughts about performance

Well, as in array_median function is using php native sort function.
Which is based on quick_sort. After sorting we have only to get median.
So, the  performance will be inherits from quick sort and in avg O(nlogn).


In can of HeapSort solution. There will be used two Heaps.
With worst insert performance O(logn + 1\2 (logn + logn)).
And full performance for n elems will be O(n (2logn)) -> O(nlogn). `In theory!!`

But after benchmarking I've realised that my code is dramatically slower than built in sort implementation.
Which is explainable, guys who are writing PHP rocks.
 
 
## Running

> php composer.phar install

> php vendor/bin/phpunit

> php phpbench run --report=default


