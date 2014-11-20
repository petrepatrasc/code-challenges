# Extending Kernel Events Plan

- Log some information before the Kernel boots up.
- kernel.request:
    - Do some checks if a particular header is not present in the request, return a Response.
    - Otherwise look for Controller.