# Extending Kernel Events Plan

1. Get Sudoku result.
2. kernel.request:
    1. Check if the `Development` header is set to 1457, return message otherwise.
3. kernel.controller:
	1. Check if the `Authentication` header has been set - if not, redirect to DefaultController::noAuthenticationHeaderAction.
4. kernel.view:
	1. When the DefaultController::noAuthenticationHeaderAction method is called, an array will be returned. A JSON listener will monitor the views being called and if an array is returned, it will return a JsonResponse of the data.
5. kernel.exception:
	1. If the `Authentication` header is invalid (not matching the string `apiKeyTest`), then it will throw an Exception - this Exception will be caught, and a JsonResponse will be made out of it, using its errorCode and errorMessage.
6. kernel.response:
	1. With the final Response generated, the Sudoku result will be appended as a Header - PP-Sudoku-Result.