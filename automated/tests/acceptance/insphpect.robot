*** Settings ***
Documentation     
...
...               This test has a workflow that is created using keywords in
...               the imported resource file.
Resource          resource.robot

*** Test Cases ***
Awesome Booking Service Insphpect Flexitility Acceptance Test
    Open Browser To Landing Page
    [Teardown]    Close Browser