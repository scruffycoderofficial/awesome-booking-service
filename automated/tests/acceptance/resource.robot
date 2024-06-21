*** Settings ***
Documentation     A resource file with reusable keywords and variables for Automation Test Suite for Awesome Booking Service.
...
...               The system specific keywords created here form our own
...               domain specific language. They utilize keywords provided
...               by the imported SeleniumLibrary.
Library           SeleniumLibrary

*** Variables ***
${TEST TOOL URL}         https://insphpect.com/
${BROWSER}        Firefox
${DELAY}          0
${REPOSITORY URL}     https://github.com
${ATTLP TITLE}        Insphpect - Automated Code Reviews

*** Keywords ***
Open Browser To Landing Page
    Open Browser    ${TEST TOOL URL}    ${BROWSER}
    Maximize Browser Window
    Set Selenium Speed    ${DELAY}
    Test Tool Landing Page Be Open
    Add Code Review Repository

Test Tool Landing Page Be Open
    Title Should Be    ${ATTLP TITLE}

Add Code Review Repository
    Set Selenium Speed      ${DELAY}
    Input Text    name:url    https://github.com/scruffycoderofficial/awesome-booking-service