#PHP ASSESMENT SOLUTION

## API ASSESMENT SOLUTION
* Navigate to the project dir to run the api
* run php -S localhost:8000 to start the server on terminal
* navigate to browser to run http://localhost:8000/getSecureRandomApi.php?min=1&max=10
* where this min=1 and max=10 can have any int value

## TESTS ASSESMENT SOLUTION

* run php test.php in the terminal
** tests Runs Are:
  **testReturnType
  **testBasicRange
  **testLargeRange
  **testEdgeCase(Zero Range)
  **testRandomness
![Tests Ouput](images/tests_result.png)

---------------------------------------------

# PHP Evaluation

## You must create a branch on this repository to push your work.

### Task 1

* Write testing functions to check the function `getSecureRandom` in `utils.php` really returns strong and accpetable random numbers

  * Try at least to write 3 testing cases
  * Structure/write the testing function in any way you think is best and fast

### Task 2

* Create `getSecureRandom` API that is served on some server
* The API must use `getSecureRandom` in `utils.php` to get the response
* Structure/write the API in any way you think is best and fast

### Note
* You have to compromise implementation quality for task speed. Simple working approaches that are implemented fast is more preferred than best implementation that is written slow.

