## Locust test bench

![](https://pbs.twimg.com/profile_images/1867636195/locust-logo-orignal.png)  

##### Table of Contents
[Locust](#locust)    
[Installation](#installation)  
 [Optional NGINX](#optionalnginx)  
 [Test cases](#testcases)  
 [Robot framework containerg](#robotframeworkcontainer)   
 


# Locust
(aka. Wat?)

[Locust](http://locust.io/) is open source load testing tool written in Python. Locust is web-oriented and tests are written in Python. Locust main purpose is to emulate real users and traffic so you can know your application stability and maximum operting capacity.  
Locust is event-based so its possible to run thousands of concurrent users on a single host.  
Locust tests are also possible to run distributed over multiple machines.  

Check links:  
[Understanding Load Testing](https://smartbear.com/learn/performance-testing/what-is-load-testing/)  
[Load testing](https://en.wikipedia.org/wiki/Load_testing)  
[Performance testing](https://en.wikipedia.org/wiki/Software_performance_testing)  
[Stress testing](https://en.wikipedia.org/wiki/Stress_testing)  


# Installation

First login to your virtual machine and install docker with following steps: [docs.docker.com](https://docs.docker.com/engine/installation/).  


## Optional NGINX  
If you dont have apache or nginx installed in your vm, pull NGINX image [Gitlab.com/jamkit](https://gitlab.com/JAMKIT/nginx-basic).  

```  
sudo docker pull registry.gitlab.com/jamkit/nginx-basic:latest
```    

Lets have look what parameteres you need to give to NGINX container.  
```
--name: Container name, could be anything..
-p: Container port and public port
-v: Volumes from! This is important!! modify first string before : !!!
```  

Next start NGINX container using following command:  
```
sudo docker run --name nginx -p 80:80 -d -v /opt/rfw-tests:/usr/share/nginx/html jamkit/nginx-basic  
```  

Navigate to your ip:80 and make sure that NGINX is working.  


## Test cases  

Next write some test cases or clone from gitlab etc. Use same path that you gave to nginx container or if you had apache or nginx installed, use default folder.  
Quick start guide can be found at [QUICKSTART](https://github.com/robotframework/QuickStartGuide/blob/master/QuickStart.rst)  
You can use either Chrome or Firefox. Look chrome example below.  
IF you r using firefox, remove Keywords segment and rename chrome to firefox.  

```
 *** Settings ***
Documentation    Testataan haku
Library    Selenium2Library
Library    OperatingSystem
*** Keywords ***
Set Environment Variable    webdriver.chrome.driver      /usr/bin/chromedriver.exe

*** Test Cases ***
Hausta Suoraan Sivulle
    Open Browser            https://en.wikipedia.org/wiki/            chrome
    Input Text            searchInput            finland
    Click Element            searchButton
    Wait Until Page Contains    Finland                timeout=10
    Title Should Be            Finland - Wikipedia
    [Teardown]            Close All Browsers
```  


## Robot framework container

Pull latest Robot Framework image from [Gitlab.com/jamkit](https://gitlab.com/JAMKIT/Robot-framework-standalone).  

```  
sudo docker pull registry.gitlab.com/jamkit/robot-framework-standalone:latest
```    

Lets have look what parameteres/ENV variables you can give to container.  
```
RUN_TYPE = (robot, pybot or sh)
ROBOT_TESTS = Define path to your test files
FILE = Name of your test file
OUTPUTDIR = define path for output files
-v: Volumes from! Define path what container mounts.
```  
Use should use paths where NGINX or Apache can find files...  

You can run tests modifying following example command:  
```
sudo docker run -it --rm --privileged \
-e RUN_TYPE=robot \
-e ROBOT_TESTS=/opt/rfw-tests/Opiskelija/test \
-e FILE=test.txt \
-e OUTPUTDIR=/opt/rfw-tests/Opiskelija/test/reports \
-v /opt/rfw-tests/Opiskelija/test:/opt/rfw-tests/Opiskelija/test \
jamkit/robot-framework-standalone 
```  

After you have lauched container, you can see tests steps in your terminal. Tests will fail or pass and after tests are done container exits and moves reports to your reports folder what u defined in launch options.  

Open your browser and navigate to your NGINX or Apache page.  
When you r trying to view you reports, you get error message. You need to have JavaScript enabled.  

In Firefox:  
Navigate to address: about:config  
Ctrl+f javascript.enabled and change value to TRUE.  
Refresh your browser.  

In Chrome:  
Navigate to Settings and Show advanced settings.  
Under the the Privacy click on the Content settings.  
Ctrl+f JavaScript and select Allow all sites to run JavaScript (recommended).
Click on the OK button to close it.
Exit from settings and refresh page.  
